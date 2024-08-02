<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        .loan-container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
        }
        .loan-title {
            font-size: 2.5rem;
            color: #3a3a3a;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }
        .loan-text {
            font-size: 1.8rem;
            color: #4a4a4a;
            border-left: 5px solid #007bff;
            padding-left: 15px;
        }
        .book-info {
            background-color: #f8f9fa;
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        .book-image {
            max-height: 300px;
            object-fit: cover;
        }
        .book-details {
            padding: 20px;
        }
        .duration-selector {
            background-color: #e9ecef;
            border-radius: 10px;
            padding: 20px;
            margin-top: 30px;
        }
        .submit-button {
            background: linear-gradient(45deg, #007bff, #00bcd4);
            border: none;
            border-radius: 25px;
            padding: 12px 30px;
            font-size: 1.2rem;
            color: white;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.4);
        }
        .submit-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 123, 255, 0.6);
        }
    </style>
    <title>Loan a Book</title>
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
    <div class="container loan-container">
        <h1 class="text-center mb-5 loan-title">Exciting Book Loan Adventure!</h1>
        <div class="row align-items-center">
            <div class="col-md-5 book-info">
                <img src="{{ asset('storage/images/covers/' . $book->image) }}" alt="Book Image" class="img-fluid book-image">
                <div class="book-details">
                    <h5>{{ $book->title }}</h5>
                    <p class="card-text">by {{ $book->author_name }} {{ $book->author_lastname }}</p>
                    <p class="card-text">Category: {{ $book->category_name }}</p>
                    <p class="card-text">ISBN: {{ $book->isbn }}</p>
                </div>
            </div>
            <div class="col-md-7">
                <p class="loan-text mb-4">
                    You are about to embark on a literary journey with: {{ $book->title }}
                </p>
                <div class="row justify-content-center">
                    <div class="col-md-8 duration-selector">
                        @if($alreadyLoaned)
                            <div class="alert alert-info" role="alert">
                                You've already loaned this book. Check your backpack!
                            </div>
                        @else
                            <form method="POST" action="{{ route('loans.store') }}" class="text-center">
                                @csrf
                                <input type="hidden" id="book" name="book" value="{{ $book->id_book }}">
                                <label for="duration" class="form-label">How long would you like to keep this treasure?</label>
                                <select class="form-select mb-4" id="duration" name="duration" required>
                                    <option value="1">1 week of wonder</option>
                                    <option value="2">2 weeks of wisdom</option>
                                    <option value="3">3 weeks of enlightenment</option>
                                </select>
                                <button type="submit" class="btn submit-button">Begin Your Adventure!</button>
                            </form>
                        @endif
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>