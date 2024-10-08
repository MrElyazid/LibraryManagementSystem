
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


    .card {
    transition: transform 0.2s; /* Smooth scaling effect */
}

    .card:hover {
        transform: scale(1.05); /* Scale up on hover */
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
                @foreach($latestBooks->chunk(4) as $key => $bookChunk) <!-- Adjust to chunk by 4 -->
                    <div class="carousel-item @if($key === 0) active @endif">
                        <div class="d-flex justify-content-around">
                            @foreach($bookChunk as $book)
                                <div class="card border-0 shadow" style="width: 180px;">
                                    <img src="{{ asset($book->image_path) }}" class="card-img-top" style="height: 240px; object-fit: cover;" alt="{{ $book->title }}">
                                    <div class="card-body">
                                        <h5 class="card-title" style="font-size: 1rem;">{{ $book->title }}</h5>
                                        <p class="card-text" style="font-size: 0.85rem;">Status: {{ $book->status }}</p>
                                        <p class="card-text" style="font-size: 0.85rem;">Quantity: {{ $book->quantity }}</p>
                                        <a href="{{ route('books.show', $book->id_book) }}" class="btn btn-primary btn-sm">See Details</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#latestBooksCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" style="background-color: #000;" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#latestBooksCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" style="background-color: #000;" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    

    <div class="container mt-4">
        <h2 class="mb-4">Featured Authors</h2>
        <div id="authorsCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($randomAuthors->chunk(4) as $key => $authorChunk) <!-- Adjust to chunk by 4 -->
                    <div class="carousel-item @if($key === 0) active @endif">
                        <div class="d-flex justify-content-around">
                            @foreach($authorChunk as $author)
                                <div class="card border-0 shadow" style="width: 180px;">
                                    <a href="{{ route('authors.index') }}" title="See more about {{ $author->name }} {{ $author->lastname }}">
                                        <img src="{{ asset($author->getImagePathAttribute()) }}" class="card-img-top" style="height: 240px; object-fit: cover;" alt="{{ $author->name }} {{ $author->lastname }}">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title" style="font-size: 1rem;">{{ $author->name }} {{ $author->lastname }}</h5>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#authorsCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" style="background-color: #000;" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#authorsCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" style="background-color: #000;" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    
    
    

    <section id="how-it-works" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">How Our Site Works</h2>

            <div class="row mb-5">
                <div class="col-md-4 d-flex align-items-stretch text-center">
                    <div class="card border-0 shadow-sm w-100">
                        <div class="card-body d-flex flex-column">
                            <i class="bi bi-info-circle h1 text-primary mb-3"></i>
                            <h4 class="card-title">About Us</h4>
                            <p class="card-text flex-grow-1">Ohara Library is a book loan website where clients can reserve books online before picking them up at the library.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 d-flex align-items-stretch text-center">
                    <div class="card border-0 shadow-sm w-100">
                        <div class="card-body d-flex flex-column">
                            <i class="bi bi-book h1 text-success mb-3"></i>
                            <h4 class="card-title">How Book Rentals Work</h4>
                            <p class="card-text flex-grow-1">Once a book is reserved on the website, a PDF receipt is generated. You can present this receipt to library staff to pick up your book at the library.</p>
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

<footer style="background-color: #f8f8f8; padding: 20px; text-align: center; font-family: Arial, sans-serif; border-top: 1px solid #e0e0e0;">
    <div>
        <h3 style="margin: 0;">Ohara Library</h3>
        <p style="margin: 5px 0;">Your gateway to knowledge and literature</p>
    </div>
    <div style="margin: 15px 0;">
        <a href="#" style="margin: 0 15px; text-decoration: none; color: #007BFF;">About Us</a>
        <a href="#" style="margin: 0 15px; text-decoration: none; color: #007BFF;">Contact Us</a>
        <a href="#" style="margin: 0 15px; text-decoration: none; color: #007BFF;">Terms of Service</a>
        <a href="#" style="margin: 0 15px; text-decoration: none; color: #007BFF;">Privacy Policy</a>
    </div>
    <div>
        <p style="margin: 5px 0;">© 2024 Ohara Library. All Rights Reserved.</p>
        <p style="margin: 5px 0;">Follow us on 
            <a href="#"  style="text-decoration: none; color: #007BFF;">Facebook</a>, 
            <a href="#"  style="text-decoration: none; color: #007BFF;">Twitter</a>, 
            <a href="#"  style="text-decoration: none; color: #007BFF;">Instagram</a>
        </p>
    </div>
</footer>

</html>
