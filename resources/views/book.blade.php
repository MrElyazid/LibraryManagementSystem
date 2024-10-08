<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $book->title ?? 'Book Details' }}</title>
<link rel="stylesheet" href="path/to/your/css/file.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
}
.main-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
}
.first-container, .second-container {
    display: flex;
    width: 80%;
    margin-bottom: 20px;
    background: white;
    box-shadow: 0 4px 8px rgba(0,0,0,.1);
    border-radius: 10px;
    padding: 20px;
}
.book-cover-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 40%;
    padding: 20px;
}
.book-cover {
    width: 100%;
    max-width: 150px;
    margin-bottom: 15px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0,0,0,.1);
}
.loan-button, .wishlist-button, .edit-button, .remove-button {
    width: 100%;
    margin: 5px 0;
    padding: 10px;
    border: none;
    border-radius: 25px;
    font-size: 16px;
}
.loan-button {
    background-color: #007bff;
    color: white;
}
.loan-button:hover {
    background-color: #0056b3;
}
.wishlist-button {
    background-color: #28a745;
    color: white;
}
.wishlist-button:hover {
    background-color: #218838;
}
.edit-button {
    background-color: #ffc107;
    color: white;
}
.edit-button:hover {
    background-color: #e0a800;
}
.remove-button {
    background-color: #dc3545;
    color: white;
}
.remove-button:hover {
    background-color: #c82333;
}
.book-info-container {
    width: 60%;
    padding: 0 20px;
    border-left: 1px solid #eee;
}
.author-info, .book-description {
    flex: 1;
    padding: 20px;
}
.author-info h3, .book-description h3 {
    border-bottom: 2px solid #007bff;
    padding-bottom: 10px;
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
    @php
    header("Location: /login");
    exit();
@endphp
    @endif
    <div class="container main-container">
        <div class="row first-container">
            <div class="col-md-4 book-cover-container">
                <img src="{{ asset('storage/images/covers/' . $book->image) }}" alt="Book Cover" class="book-cover img-fluid">
                
                @if(Auth::check() && Auth::user()->isLibrarian())
                <a class="edit-button btn btn-warning mt-3" href="{{ route('librarian.editBook', ['id' => $book->id_book]) }}">Edit</a>
                <button type="button" class="remove-button btn btn-danger mt-2" onclick="confirmDelete({{ $book->id_book }})">Remove</button>
            @else

            @php
            $isWishlisted = Auth::check() ? Auth::user()->wishlists()->where('book', $book->id_book)->exists() : false;
            $isloanable = $book->quantity === 0 || $book->status !== 'Available';
        @endphp

                @if ($alreadyLoaned)
                <button class="loan-button btn btn-info mt-3" disabled>You already loaned this book</button>
                @elseif ($isloanable)
                <button class="loan-button btn btn-info mt-3" disabled>Not available for loan</button>
                @else
            <a class="loan-button btn btn-primary mt-3 loannn" href="{{ route('loans.create', ['book' => $book->id_book]) }}">Loan</a>
                @endif
                
                @if($isWishlisted)
                    <button class="loan-button btn btn-success mt-3" disabled>Already Wishlisted</button>
                @else
                <a class="wishlist-button btn btn-success mt-3" href="{{ route('wishlist.add', ['book' => $book->id_book]) }}">Wishlist</a>
                @endif

                @endif

            </div>
            <div class="col-md-8 book-info-container">
                <h2>{{ $book->title }}</h2>
                <p><strong>Author:</strong> {{ $book->author_name . " " . $book->author_lastname ?? 'Unknown' }}</p>
                <p><strong>Category:</strong> {{ $book->category_name ?? 'Unknown' }}</p>
                <p><strong>Quantity:</strong> {{ $book->quantity ?? 'Unknown' }}</p>
                <p><strong>Status:</strong> {{ $book->status ?? 'Unknown' }}</p>
                <p><strong>Year of Publish:</strong> {{ date('Y', strtotime($book->created_at)) }}</p>
            </div>
        </div>
        <div class="row second-container">
            <div class="col-md-6 author-info">
                <h3>Author Info</h3>
                <p><strong>Name:</strong> {{ $book->author_name . " " . $book->author_lastname ?? 'Unknown' }}</p>
                <p><strong>Birth Date:</strong> {{ $book->author_birth_date ?? 'Unknown' }}</p>
            </div>
            <div class="col-md-6 book-description">
                <h3>Description</h3>
                <p>{{ $book->description ?? 'No description available.' }}</p>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function confirmDelete(bookId) {
    if (confirm("Are you sure you want to remove this book?")) {
        $.ajax({
            url: '/librarian/book/' + bookId,
            type: 'DELETE',
            data: {
                "_token": "{{ csrf_token() }}",
            },
            success: function(response) {
                alert(response.message);
                window.location.href = "{{ route('librarian.showBook', ['id' => $book->id_book]) }}";
            },
            error: function(xhr) {
                alert("An error occurred while deleting the book.");
            }
        });
    }
}
</script>

</body>
</html>

