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
            max-width: 450px;
            border: none;
            background-color: #f8f9fa;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
            transition: transform 0.2s;
        }
        .author-card:hover {
            transform: scale(1.05);
        }
        .author-card img {
            border-radius: 5px;
            margin-right: 20px;
        }
        .card-body {
            padding: 20px;
        }
        .card-title {
            color: #495057;
            font-weight: bold;
        }
        .card-text small {
            color: #6c757d;
        }
        .modal-title {
            color: #0d6efd;
        }
        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
        .btn-primary:hover {
            background-color: #0b5ed7;
            border-color: #0a58ca;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5c636a;
            border-color: #565e64;
        }
    </style>
</head>
<body>
    @include('components.connectedNavbar')

    <div class="container mt-4">
        <h2 class="mb-4 text-primary">Authors</h2>

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
                    <button type="submit" class="btn btn-success w-100">Search</button>
                </div>
            </div>
        </form>

        <div class="row">
            @foreach ($authors as $author)
                <div class="col-lg-4 col-md-6 d-flex justify-content-center">
                    <div class="card author-card d-flex flex-row align-items-center">
                        <img src="{{ asset($author->image_path) }}" class="card-img-top" style="width: 150px; height: 225px; object-fit: cover;" alt="{{ $author->name }} {{ $author->lastname }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $author->name }} {{ $author->lastname }}</h5>
                            <p class="card-text">
                                <small class="text-muted">Born on: {{ \Carbon\Carbon::parse($author->birth_date)->format('d-m-Y') }}</small>
                            </p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#descriptionModal-{{ $author->id }}">
                                Read description
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="descriptionModal-{{ $author->id }}" tabindex="-1" aria-labelledby="descriptionModalLabel-{{ $author->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="descriptionModalLabel-{{ $author->id }}">{{ $author->name }} {{ $author->lastname }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                {{ $author->description }}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            @if ($authors->isEmpty())
                <div class="col-12">
                    <p class="text-center text-danger">No authors found!</p>
                </div>
            @endif
        </div>
    </div>
</body>
</html>

