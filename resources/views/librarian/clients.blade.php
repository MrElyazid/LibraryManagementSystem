<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Clients Dashboard</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .dashboard-container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            padding: 40px;
            margin-top: 30px;
        }
        .table-responsive {
            overflow-x: auto;
        }
        .table {
            white-space: nowrap;
        }
        .table thead th {
            background-color: #007bff;
            color: #ffffff;
            font-weight: 600;
            text-align: center;
        }
        .table-hover tbody tr:hover {
            background-color: #f1f3f5;
        }
        .btn-inspect {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
        }
        h1 {
            color: #007bff;
            font-size: 2rem;
            text-align: center;
            margin-bottom: 30px;
        }
        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            padding: 20px;
            color: #6c757d;
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

    <div class="container dashboard-container">
        <h1 class="mb-4">Clients Dashboard</h1>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th>Books Loaned</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                    <tr>
                        <td>{{ $client->id_client }}</td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->lastname }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->loans_count }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Library Management System. All Rights Reserved.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
