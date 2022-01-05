<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="header">
        @section('header')
            <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
                <!-- Brand -->
                <a class="navbar-brand" href="#">BookStore</a>

                <!-- Links -->
                <ul class="navbar-nav mx-auto text-white">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index') }}">Home</a>
                    </li>

                    <!-- Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">
                            Categories
                        </a>
                        <div class="dropdown-menu">
                            @foreach ($categories as $item)
                                <a class="dropdown-item" href="{{ route('category', $item->id) }}"> {{ $item->name }}</a>
                            @endforeach
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('about') }}">About</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('contact') }}">Contact</a>
                    </li>

                </ul>
            </nav>



            <div class="head">
                <ul>
                    {{-- redirect admin to admin Page --}}
                    @if (Auth::user() && Auth::user()->type == 'ADMIN')
                        <li><a href="{{ route('books.index') }}">Admin</a></li>
                    @endif

                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                    @endguest

                    @guest
                        <li><a href="{{ route('signup') }}">Sign In</a></li>
                    @endguest

                    @if (empty(session('user')))
                        @auth
                            <li><a href="{{ route('logout') }}">Log Out</a></li>
                        @endauth
                        @auth
                            <li><a href="{{ route('my-orders') }}">My Orders</a></li>
                        @endauth
                    @endif

                    <li><a href="{{ route('cart') }}"><i class="fal fa-shopping-cart font-weight-normal"></i></a></li>
                </ul>
            </div>

        @show
    </div>
    <div class="content">
        @section('content')

        @show
    </div>
    <br><br><br><br><br>
    <div class="footer">
        @section('footer')
            <p class="bg-primary py-3 mb-0">Copyright © 2020, Books Store, All Rights Reserved.</p>
        @show
    </div>

</body>

</html>
