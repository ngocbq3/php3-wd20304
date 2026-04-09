<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container w-90 mt-3">
        <nav>
            <!--Account-->
            {{ Auth::user()->name }}
            <form class="d-inline" action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-link">Logout</button>
            </form>
            Menu
        </nav>
        <aside>Side bar</aside>

        @yield('content')

        <footer>Footer</footer>
    </div>
</body>

</html>
