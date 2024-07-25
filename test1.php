
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ohara Library</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>

    .hero-section {
        background: url('{{ asset('images/ohara_background.jpg') }}') no-repeat center center;
        background-size: cover;
        height: 45vh; /* 45% of the screen height */
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .hero-content {
        background-color: rgba(0, 0, 0, 0.5); /* Adding a dark layer for better text visibility */
        padding: 20px;
        border-radius: 10px;
    }

    .carousel-item {
        padding: 20px 0; /* Add some spacing around the items */
    }

    .carousel-inner {
        display: flex;
        align-items: center;
    }

    .carousel-item img {
        height: 200px;
        object-fit: cover;
    }

    .carousel-item h3 {
        margin-top: 0;
    }

    .carousel-item p {
        margin-bottom: 0;
    }

    #how-it-works {
        background-color: #f8f9fa;
    }

    #how-it-works .card-body {
        padding: 30px;
    }

    #how-it-works h2 {
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 1.5rem;
    }

    #how-it-works .card-title {
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }

    #how-it-works .card-text {
        font-size: 1rem;
    }

    #how-it-works .list-unstyled li {
        font-size: 1rem;
        margin-bottom: 0.5rem;
    }

    .card {
        display: flex;
        flex-direction: column;
    }

    .card-body {
        flex: 1;
    }

    .card .card-text ul {
        padding-left: 0;
    }

    </style>
</head>
<body>
   
    @if(Auth::check())
        @include('components.connectedNavbar')
    @else
        @include('components.navbar')
    @endif 

    @include('components.connectedNavbar')
    <section class="hero-section">
        <div class="hero-content text-center text-white">
            <h1 class="display-3">Ohara Library</h1>
            <p class="lead">Your gateway to a world of knowledge</p>
        </div>
    </section>
    <div class="container mt-4">
        @yield('content')
    </div>

    <div class="container mt-4">
        <h2 class="mb-4">Latest Books</h2>
        <div id="latestBooksCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($latestBooks as $key => $book)
                    <div class="carousel-item @if($key === 0) active @endif">
                        <div class="row">
                            <div class="col-md-3">
                                @if ($book->imagePic)
                                    <img src="{{ asset('storage/'. $book->imagePic->path) }}" class="d-block w-100" alt="{{ $book->title }}">
                                @else
                                    <img src="{{ asset('storage/images/default-image.jpg') }}" class="d-block w-100" alt="Default Image">
                                @endif
                            </div>
                            <div class="col-md-9">
                                <h3>{{ $book->title }}</h3>
                                <p>Status: {{ $book->status }}</p>
                                <p>Quantity: {{ $book->quantity }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#latestBooksCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#latestBooksCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    @yield('content')

    <section id="how-it-works" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">How Our Site Works</h2>

            <div class="row mb-5">
                <div class="col-md-4 d-flex align-items-stretch text-center">
                    <div class="card border-0 shadow-sm w-100">
                        <div class="card-body d-flex flex-column">
                            <i class="bi bi-info-circle h1 text-primary mb-3"></i>
                            <h4 class="card-title">About Us</h4>
                            <p class="card-text flex-grow-1">Our site is your one-stop destination for amazing book rentals. Discover a wide range of genres, authors, and titles. Happy reading!</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 d-flex align-items-stretch text-center">
                    <div class="card border-0 shadow-sm w-100">
                        <div class="card-body d-flex flex-column">
                            <i class="bi bi-book h1 text-success mb-3"></i>
                            <h4 class="card-title">How Book Rentals Work</h4>
                            <p class="card-text flex-grow-1">Browse our collection, choose your favorite books, and rent them out with just a few clicks. Enjoy reading and return the books when you are done!</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 d-flex align-items-stretch text-center">
                    <div class="card border-0 shadow-sm w-100">
                        <div class="card-body d-flex flex-column">
                            <i class="bi bi-layers h1 text-warning mb-3"></i>
                            <h4 class="card-title">Features</h4>
                            <p class="card-text flex-grow-1">
                                <ul class="list-unstyled text-start">
                                    <li><i class="bi bi-check-circle-fill text-primary"></i> Extensive Book Collection</li>
                                    <li><i class="bi bi-check-circle-fill text-primary"></i> Easy Rental Process</li>
                                    <li><i class="bi bi-check-circle-fill text-primary"></i> Wishlist & Backpack</li>
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
</html>
