<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $book->title ?? 'Book Details' }}</title>
<link rel="stylesheet" href="path/to/your/css/file.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<style>
body {
    font-family: Arial, sans-serif;
}
.main-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 20px;
}
.first-container, .second-container {
    display: flex;
    width: 80%;
    margin-bottom: 20px;
}
.book-cover-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 40%;
}
.book-cover {
    width: 80%;
    margin-bottom: 10px;
}
.loan-button, .wishlist-button {
    display: block;
    width: 80%;
    margin: 5px 0;
}
.book-info-container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    width: 60%;
    padding-left: 20px;
    border-left: 1px solid #ccc;
}
.author-info, .book-description {
    width: 50%;
    padding: 20px;
    box-sizing: border-box;
}
</style>
</head>
<body>
@include('components.connectedNavbar')
<div class="main-container">
    <!-- First Horizontal Container -->
    <div class="first-container">
        <div class="book-cover-container">
            <img src="{{ $book->image }}" alt="Book Cover" class="book-cover">
            <button class="loan-button">Loan</button>
            <button class="wishlist-button">Wishlist</button>
        </div>
        <div class="book-info-container">
            <h2>{{ $book->title }}</h2>
            <p>Author: {{ $book->author->name ?? 'Unknown' }}</p>
            <p>Category: {{ $book->category->name ?? 'Unknown' }}</p>
            <p>Year of Publish: {{ date('Y', strtotime($book->created_at)) }}</p>
        </div>
    </div>
    <!-- Second Horizontal Container -->
    <div class="second-container">
        <div class="author-info">
            <h3>Author Info</h3>
            <p>Name: {{ $book->author->name ?? 'Unknown' }}</p>
            <p>Birth Date: {{ optional($book->author)->birth_date ?? 'Unknown' }}</p>
        </div>
        <div class="book-description">
            <h3>Description</h3>
            <p>{{ $book->description ?? 'No description available.' }}</p>
        </div>
    </div>
</div>
</body>
</html>
