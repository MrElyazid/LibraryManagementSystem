<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Backpack</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .backpack-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            padding: 30px;
            margin-top: 50px;
        }

        .backpack-title {
            color: #007bff;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .book-card {
            transition: transform 0.3s ease;
            margin-bottom: 20px;
            width: 200px;
        }


        .book-image {
            height: 300px; 
            object-fit: contain;
            width: 100%;
        }

        .empty-backpack {
            text-align: center;
            padding: 50px;
            background-color: #e9ecef;
            border-radius: 15px;
        }

        .card-body {
    padding: 0.5rem;
}

.card-title {
    font-size: 1rem;
    margin-bottom: 0.25rem;
}

.card-text {
    font-size: 0.8rem;
    margin-bottom: 0.25rem;
}

.text-muted {
    font-size: 0.75rem;
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

    <div class="container backpack-container">
        <h1 class="text-center backpack-title">Your Literary Backpack</h1>
        
        @if($loans->isEmpty())
            <div class="empty-backpack">
                <h3>Your backpack is as light as a feather!</h3>
                <p>Why not add some literary weight? Visit our library and borrow some books.</p>
                <a href="{{ route('books.index') }}" class="btn btn-primary mt-3">Explore Books</a>
            </div>
        @else
            <div class="row">
                @foreach($loans as $loan)
                    <div class="col-md-4 col-lg-3 mb-4 d-flex justify-content-center">
                        <div class="card book-card h-100">
                            <img src="{{ asset($loan->book->image_path) }}" class="card-img-top book-image" alt="{{ $loan->book->title }}">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $loan->book->title }}</h5>
                                <p class="card-text mb-0">By {{ $loan->book->author_name }} {{ $loan->book->author_lastname }}</p>
                                <p class="card-text mb-0"><small class="text-muted">{{ $loan->book->category_name }}</small></p>
                                <p class="card-text mt-auto mb-0"><small class="text-muted">Borrowed: {{ $loan->date_borrowed->format('M d, Y') }}</small></p>
                                <p class="card-text"><small class="text-muted">Due: {{ $loan->due_date->format('M d, Y') }}</small></p>
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