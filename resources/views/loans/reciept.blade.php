<!DOCTYPE html>
<html>
<head>
    <title>Loan Receipt</title>
    <style>
        /* Add some basic styling */
        body { font-family: Arial, sans-serif; }
        .header { text-align: center; margin-bottom: 20px; }
        .details { margin-bottom: 20px; }
        .footer { text-align: center; font-size: 0.8em; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Library Loan Receipt</h1>
        <h2>Loan ID: {{ $loan->id_loan }}</h2>

    </div>

    <div class="details">
        <p><strong>Book:</strong> {{ $loan->book->title }}</p>
        <p><strong>Borrower:</strong> {{ $loan->client->name }}</p>
        <p><strong>Date Borrowed:</strong> {{ $loan->date_borrowed }}</p>
        <p><strong>Due Date:</strong> {{ $loan->due_date }}</p>
    </div>

    <div class="footer">
        <p>Thank you for using our library services!</p>
    </div>
</body>
</html>