<!-- resources/views/books.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Add your custom CSS file if you have one -->
    <title>Books</title>
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
                <ul class="list-group">
                    @foreach($books as $book)
                        <li class="list-group-item">
                            <h5 class="mb-1">{{ $book->title }}</h5>
                            <p class="mb-1">by {{ $book->author_name }}</p>
                            <small>ISBN: {{ $book->isbn }}</small>
                        </li>
                    @endforeach
                </ul>
            @endif
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>