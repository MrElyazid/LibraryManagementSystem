<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom CSS -->
    <style>

        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-signin {
            width: 100%;
            max-width: 380px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .form-control {
            height: auto;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 10px;
        }

        .form-signin .btn {
            font-size: 16px;
            border-radius: 10px;
        }

        .form-signin h1 {
            margin-bottom: 30px;
            font-size: 24px;
            font-weight: 500;
        }

        .container {
            background: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 40px;
            border-radius: 10px;
            max-width: 400px;
        }
        .container img {
            display: block;
            margin: 0 auto 20px;
            width: 100px;
        }

    </style>
</head>
<body>
<div class="container">

    <img src="{{asset('images/brand.png')}}" alt="Logo">
<form class="form-signin" method="POST" action="{{ route('register') }}">
    @csrf
    <h1 class="h3 mb-3 font-weight-normal text-center">Please Register</h1>
    <label for="name" class="sr-only">First Name</label>
    <input type="text" name="name" id="name" class="form-control" required autofocus>

    <label for="lastname" class="sr-only">Last Name</label>
    <input type="text" name="lastname" id="lastname" class="form-control" required>

    <label for="email" class="sr-only">Email Address</label>
    <input type="email" name="email" id="email" class="form-control" required>

    <label for="password" class="sr-only">Password</label>
    <input type="password" name="password" id="password" class="form-control" required>

    <label for="password_confirmation" class="sr-only">Confirm Password</label>
    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password" required>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
</form>
</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+Pk8ewPfaC6HgHDUw0XcOJy5iP0dX" crossorigin="anonymous"></script>
</body>
</html>
