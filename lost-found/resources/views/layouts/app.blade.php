<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>University of Hamstershire - Lost & Found</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">University of Hamstershire - Lost & Found</a>

        <div>
            @auth
                <a href="{{ route('items.create') }}" class="btn btn-sm btn-warning me-2">Add Item</a>

                <form action="{{ url('/logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-light">
                        Logout
                    </button>
                </form>

            @else
                <a href="{{ url('/login') }}" class="btn btn-sm btn-outline-light me-2">Login</a>
                <a href="{{ url('/register') }}" class="btn btn-sm btn-outline-light">Register</a>
            @endauth
        </div>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

</body>
</html>
