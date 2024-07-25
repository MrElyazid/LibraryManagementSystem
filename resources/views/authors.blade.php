<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authors</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        .author-card {
            width: 180px; 
        }
    </style>
</head>
<body>
    @include('components.connectedNavbar')

    <div class="container mt-4">
        <h2>Authors</h2>
        
        <!-- Search Form -->
        <form action="{{ route('authors.index') }}" method="GET" class="mb-4">
            <div class="row g-2">
                <div class="col-md-5">
                    <input type="text" name="name" class="form-control" placeholder="First Name" value="{{ request('name') }}">
                </div>
                <div class="col-md-5">
                    <input type="text" name="lastname" class="form-control" placeholder="Last Name" value="{{ request('lastname') }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Search</button>
                </div>
            </div>
        </form>

        <div class="row">
            @forelse($authors as $author)
                <div class="col-lg-4 col-md-6 mb-4 d-flex justify-content-center">
                    <div class="card author-card">
                        <img src="{{ asset($author->image_path) }}" class="card-img-top" style="width: 180px; height: 225px; object-fit: cover;" alt="{{ $author->name }} {{ $author->lastname }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $author->name }} {{ $author->lastname }}</h5>
                            <p class="card-text">{{ Str::limit($author->description, 100) }}</p>
                            <p class="card-text">
                                <small class="text-muted">Born on: {{ \Carbon\Carbon::parse($author->birth_date)->format('d-m-Y') }}</small>
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">No authors found!</p>
                </div>
            @endforelse
        </div>
    </div>

</body>
</html>
