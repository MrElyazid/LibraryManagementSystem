<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->name }}'s Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .profile-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #dee2e6;
        }
        .profile-header img {
            border-radius: 50%;
            margin-right: 1rem;
        }
        .profile-header h1 {
            margin: 0;
            font-size: 2rem;
            color: #343a40;
        }
        .user-info p {
            margin: 0.5rem 0;
            font-size: 1.1rem;
            color: #495057;
        }
        .user-info p strong {
            color: #212529;
        }
        .logout-button {
            margin-top: 2rem;
            padding: 0.5rem 2rem;
            font-size: 1rem;
        }
    </style>
</head>
<body>
    @include('components.connectedNavbar')  <!-- Include the common navbar -->

    <div class="profile-container">
        <div class="profile-header">
            <h1>{{ $user->name }}'s Profile</h1>
        </div>
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
