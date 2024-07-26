<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        .card-columns {
            column-count: 3;
        }
        .card {
            display: inline-block;
            margin-bottom: 1rem;
        }
        .modal-body img {
            max-width: 100%;
        }
    </style>
</head>
<body>
    @include('components.connectedNavbar') <!-- Include common navbar -->

    <div class="container mt-4">
        <h1 class="mb-4">Categories</h1>
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        @if($category->image)
                            <img src="{{ asset('storage/images/categories/' . $category->image) }}" class="card-img-top" alt="{{ $category->name }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $category->name }}</h5>
                            <p class="card-text">Click to read description</p>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoryModal-{{ $category->id_category }}">
                                Read Description
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="categoryModal-{{ $category->id_category }}" tabindex="-1" aria-labelledby="categoryModalLabel-{{ $category->id_category }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="categoryModalLabel-{{ $category->id_category }}">{{ $category->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>{{ $category->description }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
