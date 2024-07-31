<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loaned Books</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            padding-top: 2rem;
        }
        h1 {
            color: #007bff;
            margin-bottom: 1.5rem;
        }
        .table {
            background-color: white;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .table thead {
            background-color: #007bff;
            color: white;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .btn-group-sm > .btn, .btn-sm {
            padding: .25rem .5rem;
            font-size: .875rem;
            line-height: 1.5;
            border-radius: .2rem;
        }
    </style>
</head>
<body>

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
        <h1 class="text-center mb-4">Loaned Books</h1>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Book Title</th>
                        <th>Client Name</th>
                        <th>Date Borrowed</th>
                        <th>Due Date</th>
                        <th>Return Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($loans as $loan)
                    <tr>
                        <td>{{ $loan->book->title }}</td>
                        <td>{{ $loan->client->name }}</td>
                        <td>{{ $loan->date_borrowed }}</td>
                        <td>{{ $loan->due_date }}</td>
                        <td>{{ $loan->return_date ?? 'Not returned' }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <button class="btn btn-sm btn-outline-primary" onclick="changeDueDate({{ $loan->id_loan }})">
                                    <i class="bi bi-calendar"></i> Change Due Date
                                </button>
                                <button class="btn btn-sm btn-outline-danger" onclick="deleteLoan({{ $loan->id_loan }})">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                                <button class="btn btn-sm btn-outline-info" onclick="messageClient({{ $loan->client->id_client }})">
                                    <i class="bi bi-envelope"></i> Message Client
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css"> 
    


    <script>
        function changeDueDate(loanId) 
        { // Implement change due date functionality 
            console.log('Change due date for loan:', loanId); 
        }


        function deleteLoan(loanId) {
        // Implement delete loan functionality
        console.log('Delete loan:', loanId);
    }

    function messageClient(clientId) {
        // Implement message client functionality
        console.log('Message client:', clientId);
    }
</script>

</body>
</html>