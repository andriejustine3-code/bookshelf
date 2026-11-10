<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookshelf</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
    <header class="container site-header">
        <a href="{{ route('books.index') }}" class="site-title">Bookshelf</a>
        <div>@yield('button')</div>
        @guest
            <a href="{{ route('login') }}">Login</a>
        @endguest

        @auth
            <p>Hello, {{ aurh()->user()->name }}!></p>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button>Log out</button>
            </form>
        @endauth
    </header>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>