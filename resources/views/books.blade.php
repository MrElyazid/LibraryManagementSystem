<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Books</title>

    <style>
        body {
    background-color: #f8f9fa; /* Light background color */
}

h2, h3 {
    color: #343a40; /* Dark color for headings */
}

.card-horizontal {
    display: flex;
    flex-direction: row;
    max-width: 100%; /* Make the card take full width within the column */
    margin-bottom: 15px; /* Space between cards */
}

.card-horizontal img {
    width: 150px; /* Fixed width for the book cover */
    object-fit: cover; /* Maintain aspect ratio */
}

.card-body {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.card-body-content {
    flex-grow: 1;
}

.btn-view-details {
    background-color: #17a2b8; /* Custom color for View Details button */
    border-color: #17a2b8;
    color: white;
}

.btn-view-details:hover {
    background-color: #138496; /* Darken on hover */
    border-color: #117a8b;
}

    </style>
</head>
<body>
    @include('components.connectedNavbar')
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Search for Books</h2>
        <form action="{{ route('books.search') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" class="form-control" name="query" placeholder="Search by title or author name" required>
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </div>
        </form>
        
        @if(isset($books))
            <h3 class="text-center">Search Results:</h3>
            @if($books->isEmpty())
                <p class="text-center">No results found.</p>
            @else
                <div class="row">
                    @foreach($books as $book)
                        <div class="col-md-4">
                            <div class="card card-horizontal">
                                <img src="{{ asset($book->image_path) }}" class="card-img-top" alt="{{ $book->title }}">
                                <div class="card-body">
                                    <div class="card-body-content">
                                        <h5 class="card-title">{{ $book->title }}</h5>
                                        <p class="card-text">by {{ $book->author }}</p>
                                        <p class="card-text">Category: {{ $book->category->name }}</p>
                                        <p class="card-text">ISBN: {{ $book->isbn }}</p>
                                    </div>
                                    <a href="{{ route('books.show', $book->id_book) }}" class="btn btn-view-details">View Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        @endif

        @if(isset($latestBooks))
            <h3 class="text-center">Latest Books:</h3>
            <div class="row">
                @foreach($latestBooks as $book)
                    <div class="col-md-4">
                        <div class="card card-horizontal">
                            <img src="{{ asset($book->image_path) }}" class="card-img-top" alt="{{ $book->title }}">
                            <div class="card-body">
                                <div class="card-body-content">
                                    <h5 class="card-title">{{ $book->title }}</h5>
                                    <p class="card-text">by {{ optional($book->author)->name }}</p>
                                    <p class="card-text">Category: {{ optional($book->category)->name }}</p>
                                    <p class="card-text">ISBN: {{ $book->isbn }}</p>
                                </div>
                                <a href="{{ route('books.show', $book->id_book) }}" class="btn btn-view-details">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
