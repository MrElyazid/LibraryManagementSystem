<!DOCTYPE html>
<html>
<head>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid black; padding: 5px; text-align: left; }
    </style>
</head>
<body>
    <h1>Loans Export</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Book</th>
                <th>Client</th>
                <th>Date Borrowed</th>
                <th>Due Date</th>
                <th>Return Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($loans as $loan)
                <tr>
                    <td>{{ $loan->id_loan }}</td>
                    <td>{{ $loan->book->title }}</td>
                    <td>{{ $loan->client->name }}</td>
                    <td>{{ $loan->date_borrowed }}</td>
                    <td>{{ $loan->due_date }}</td>
                    <td>{{ $loan->return_date ?? 'Not returned' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
