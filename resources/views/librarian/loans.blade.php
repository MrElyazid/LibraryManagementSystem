<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loaned Books</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        <h1 class="text-center mb-4">Loaned Books</h1>

        <!-- Add this button above your table -->
<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exportModal">
    Export as...
</button>

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
                        <td>{{ $loan->date_borrowed->format('Y-m-d') }}</td>
                        <td>{{ $loan->due_date->format('Y-m-d') }}</td>
                        <td>{{ $loan->return_date ?? 'Not returned' }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <button class="btn btn-sm btn-outline-primary" onclick="changeDueDate({{ $loan->id_loan }})">
                                    <i class="bi bi-calendar"></i> Change Due Date
                                </button>
                                <button class="btn btn-sm btn-outline-danger" 
                                            onclick="deleteLoan({{ $loan->id_loan }})" 
                                            {{ $loan->return_date && now()->gt($loan->return_date) ? '' : 'disabled' }}>
                                                    <i class="bi bi-trash"></i> Delete
                                </button>

                                <button class="btn btn-sm btn-outline-info" onclick="messageClient({{ $loan->client->id_client }})">
                                    <i class="bi bi-envelope"></i> Message Client
                                </button>

                                @if(!$loan->return_date)
                <button class="btn btn-sm btn-success" onclick="showReturnModal({{ $loan->id_loan }})">
                    Mark as Returned
                </button>
            @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    

    <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="messageModalLabel">Send Message to Client</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <textarea id="messageContent" class="form-control" rows="4"></textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="sendMessageBtn">Send Message</button>
            </div>
          </div>
        </div>
      </div>


      <div class="modal fade" id="changeDueDateModal" tabindex="-1" aria-labelledby="changeDueDateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="changeDueDateModalLabel">Change Due Date</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <input type="date" id="newDueDate" class="form-control">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="changeDueDateBtn">Change Due Date</button>
            </div>
          </div>
        </div>
      </div>



      <div class="modal fade" id="returnBookModal" tabindex="-1" aria-labelledby="returnBookModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="returnBookModalLabel">Confirm Return</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Are you sure you want to set the return date for this book?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary" id="confirmReturnBtn">Confirm</button>
            </div>
          </div>
        </div>
      </div>


<!-- Add this modal at the end of your body tag -->
<div class="modal fade" id="deleteLoanModal" tabindex="-1" aria-labelledby="deleteLoanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteLoanModalLabel">Confirm Deletion</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this loan from the database?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
        </div>
      </div>
    </div>
  </div>
  


  <div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exportModalLabel">Export Loans</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Choose export format:</p>
          <div class="d-grid gap-2">
            <a href="{{ route('librarian.exportLoans', 'csv') }}" class="btn btn-primary">CSV</a>
            <a href="{{ route('librarian.exportLoans', 'pdf') }}" class="btn btn-danger">PDF</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css"> 

    <script>
let currentClientId;

function messageClient(clientId) {
    currentClientId = clientId;
    let modal = new bootstrap.Modal(document.getElementById('messageModal'));
    modal.show();
}

document.getElementById('sendMessageBtn').addEventListener('click', function() {
    let message = document.getElementById('messageContent').value;
    if (message) {
        fetch(`/librarian/message-client/${currentClientId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ message: message })
        })
        .then(response => response.json())
        .then(data => {
            let modal = bootstrap.Modal.getInstance(document.getElementById('messageModal'));
            modal.hide();
            alert(data.message);
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while sending the message.');
        });
    }
});

   
function changeDueDate(loanId) {
    currentLoanId = loanId;
    let modal = new bootstrap.Modal(document.getElementById('changeDueDateModal'));
    modal.show();
}

document.getElementById('changeDueDateBtn').addEventListener('click', function() {
    let newDueDate = document.getElementById('newDueDate').value;
    if (newDueDate) {
        fetch(`/librarian/change-due-date/${currentLoanId}`, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ new_due_date: newDueDate })
        })
        .then(response => response.json())
        .then(data => {
            let modal = bootstrap.Modal.getInstance(document.getElementById('changeDueDateModal'));
            modal.hide();
            alert(data.message);
            location.reload();
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while changing the due date.');
        });
    }
});



function deleteLoan(loanId) {
    currentDeleteLoanId = loanId;
    let modal = new bootstrap.Modal(document.getElementById('deleteLoanModal'));
    modal.show();
}

document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
    fetch(`/librarian/delete-loan/${currentDeleteLoanId}`, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        let modal = bootstrap.Modal.getInstance(document.getElementById('deleteLoanModal'));
        modal.hide();
        alert(data.message);
        if (data.success) {
            location.reload();
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while deleting the loan.');
    });
});



function showReturnModal(loanId) {
        currentLoanId = loanId;
        let modal = new bootstrap.Modal(document.getElementById('returnBookModal'));
        modal.show();
    }

    document.getElementById('confirmReturnBtn').addEventListener('click', function() {
        fetch(`/librarian/return-book/${currentLoanId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            let modal = bootstrap.Modal.getInstance(document.getElementById('returnBookModal'));
            modal.hide();
            alert(data.message);
            location.reload();
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while returning the book.');
        });
    });
</script>

</body>
</html>