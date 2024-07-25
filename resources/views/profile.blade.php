<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->name }}'s Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .profile-container {
            width: 60%;
            margin: 0 auto;
            padding: 20px;
        }
        .user-info {
            margin-bottom: 20px;
        }
        .logout-button {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    @include('components.connectedNavbar')  <!-- Include the common navbar -->

    <div class="profile-container">
        <h1>Profile</h1>
        <div class="user-info">
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Last Name:</strong> {{ $user->lastname }}</p>
            <p><strong>Join Date:</strong> {{ date('F d, Y', strtotime($user->created_at)) }}</p>
            <p><strong>Total Books Loaned:</strong> 0</p>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger logout-button">Disconnect</button>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
