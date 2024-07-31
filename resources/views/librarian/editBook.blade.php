<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<style>
    body {
            background: linear-gradient(135deg, #f8f8f8, #c8d6e5);
            font-family: 'Arial', sans-serif;
        }
        .container {
            max-width: 800px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 30px;
        }
        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
        }
        .form-group label {
            font-weight: bold;
            color: #34495e;
        }
        .form-control, .form-control-file {
            border-radius: 5px;
            border: 1px solid #e3e3e3;
            transition: all 0.3s;
        }
        .form-control:focus, .form-control-file:focus {
            border-color: #3498db;
            box-shadow: 0 0 8px rgba(52, 152, 219, 0.3);
        }
        .alert {
            margin-top: 20px;
        }
        button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #2980b9;
            border-color: #2980b9;
        }
        .btn-primary:hover {
            background-color: #3498db;
            border-color: #3498db;
        }
        img {
            display: block;
            margin: 10px auto;
            max-width: 100px;
            border-radius: 5px;
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

    <div class="container mt-5">

        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

        <h1>Edit Book: {{ $book->title }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('librarian.updateBook', ['id' => $book->id_book]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" class="form-control" id="isbn" name="isbn" value="{{ old('isbn', $book->isbn) }}" required>
            


            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $book->title) }}" required>
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id_category }}" {{ old('category', $book->category) == $category->id_category ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="author">Author</label>
                <select class="form-control" id="author" name="author" required>
                    @foreach($authors as $author)
                        <option value="{{ $author->id_author }}" {{ old('author', $book->author) == $author->id_author ? 'selected' : '' }}>
                            {{ $author->name }} {{ $author->lastname }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Available" {{ old('status', $book->status) == 'Available' ? 'selected' : '' }}>Available</option>
                    <option value="Coming Soon" {{ old('status', $book->status) == 'Coming Soon' ? 'selected' : '' }}>Coming Soon</option>
                    <option value="Not Available" {{ old('status', $book->status) == 'Not Available' ? 'selected' : '' }}>Not Available</option>
                </select>
            </div>
            

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $book->quantity) }}" required min="1">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $book->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Cover Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
                @if($book->image_path)
                    <img src="{{ asset('storage/images/covers/' . $book->image) }}" alt="Current Cover" class="mt-2" style="max-width: 200px;">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update Book</button>
        </form>
    </div>

    
</body>
</html>
