<!-- resources/views/components/navbar.blade.php -->



<!-- Custom CSS for navbar styling -->
<style>
    .navbar-brand img {
        transition: transform 0.2s ease-in-out;
    }

    .navbar-brand img:hover {
        transform: scale(1.1);
    }

    .nav-item .nav-link {
        color: #555 !important;
        display: flex;
        align-items: center;
        font-size: 1.25rem; /* Adjusted font size */
        padding: 10px 20px; /* Adjusted padding */
    }

    .nav-item .nav-link i {
        margin-right: 10px; /* Adjusted margin */
        font-size: 1.5rem; /* Adjusted icon size */
    }

    .nav-item .nav-link:hover {
        color: #007bff !important;
    }

    .btn-outline-primary {
        font-size: 1.25rem; /* Adjusted font size */
        padding: 10px 20px; /* Adjusted padding */
    }


    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=UTF8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23000' viewBox='0 0 30 30'%3E%3Cpath stroke='%23000' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
    }

    @media (max-width: 992px) {
        .nav-item .nav-link {
            text-align: center;
            font-size: 1.1rem; /* Adjust font size for smaller screens */
            padding: 8px 0; /* Adjust padding for smaller screens */
        }

        .btn-outline-primary {
            font-size: 1.1rem; /* Adjust font size for smaller screens */
            padding: 8px 16px; /* Adjust padding for smaller screens */
        }
    }
</style>



<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/brand.png') }}" alt="Brand" style="height: 50px;"> <!-- Adjusted height -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-book-half"></i> How to
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('books.index')}}">
                        <i class="bi bi-book"></i> Books
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories.index')}}">
                        <i class="bi bi-list-ul"></i> Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('authors.index')}}">
                        <i class="bi bi-person"></i> Authors
                    </a>
                </li>
            </ul>
            <a class="btn btn-outline-primary" href="{{ route('login') }}">
                <i class="bi bi-box-arrow-in-right"></i> Log In
            </a>
        </div>
    </div>
</nav>

