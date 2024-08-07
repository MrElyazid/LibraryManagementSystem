<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Statistics</title>
</head>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin-top: 20px;
            margin-left: 30px;
            margin-right: 30px;
        }
    
        h1, h5 {
            color: #343a40;
        }
    
        h1 {
            margin-bottom: 20px;
        }
    
        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            box-sizing: border-box;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        }
    
        .card-title {
            margin-bottom: 10px;
        }
    
        .card-text {
            color: #6f6f6f;
        }
    
        .mb-4 {
            margin-bottom: 20px;
        }
    
        .mb-3 {
            margin-bottom: 15px;
        }
    
        canvas {
            max-width: 100%;
            height: auto;
        }

        #topAuthorDiv {
            width: 45%;
        }
    </style>
    
<body>

    @php
    if (Auth::check() && !Auth::user()->isLibrarian() && Request::is('librarian/*')) {
        header("Location: /home");
        exit();
    }
    @endphp


    @if(Auth::check())
    @if(Auth::user()->isLibrarian())
        @include('components.libnav')
    @else
        @include('components.connectedNavbar')
    @endif
    @else
    @include('components.navbar')
    @endif


    <div class="container">
        <h1 class="mb-4">Librarian Dashboard</h1>
        
        
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Loans</h5>
                        <p class="card-text display-4" id="total-loans">-</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Books</h5>
                        <p class="card-text display-4" id="total-books">-</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Clients</h5>
                        <p class="card-text display-4" id="total-clients">-</p>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Visual Graphs -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Loans Over Past Month</h5>
                        <canvas id="loans-chart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Top 10 Loaned Books</h5>
                        <canvas id="top-books-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Top 5 Authors with Most Books</h5>
                        <canvas id="top-authors-chart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Top 5 Users with Most Books Loaned</h5>
                        <canvas id="top-users-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Fetch simple stats
        fetch('{{ route('librarian.stats.simple') }}')
            .then(response => response.json())
            .then(data => {
                document.getElementById('total-loans').textContent = data.total_loans;
                document.getElementById('total-books').textContent = data.total_books;
                document.getElementById('total-clients').textContent = data.total_clients;
            });
    
        // Loans Over Past Month
        fetch('{{ route('librarian.stats.loansByDay') }}')
            .then(response => response.json())
            .then(data => {
                new Chart(document.getElementById('loans-chart'), {
                    type: 'line',
                    data: {
                        labels: data.labels,
                        datasets: [{
                            label: 'Number of Loans',
                            data: data.values,
                            borderColor: 'rgb(75, 192, 192)',
                            tension: 0.1 }] }
                            , options: 
                            { responsive: true,
                                 scales: {
                                     y: {
                                         beginAtZero: true 
                                        } 
                                    } 
                                } 
                            }); 
                        });
    
// Top 10 Loaned Books
fetch('{{ route('librarian.stats.topLoanedBooks') }}')
    .then(response => response.json())
    .then(data => {
        new Chart(document.getElementById('top-books-chart'), {
            type: 'bar',
            data: {
                labels: data.labels,
                datasets: [{
                    label: 'Number of Loans',
                    data: data.values,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });

// Top 5 Authors with Most Books
fetch('{{ route('librarian.stats.topAuthors') }}')
    .then(response => response.json())
    .then(data => {
        new Chart(document.getElementById('top-authors-chart'), {
            type: 'pie',
            data: {
                labels: data.labels,
                datasets: [{
                    data: data.values,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)'
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Top 5 Authors'
                    }
                }
            }
        });
    });

// Top 5 Users with Most Books Loaned
fetch('{{ route('librarian.stats.topUsers') }}')
    .then(response => response.json())
    .then(data => {
        new Chart(document.getElementById('top-users-chart'), {
            type: 'bar',
            data: {
                labels: data.labels,
                datasets: [{
                    label: 'Number of Books Loaned',
                    data: data.values,
                    backgroundColor: 'rgba(153, 102, 255, 0.5)'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
    </script>

</body>
</html>
