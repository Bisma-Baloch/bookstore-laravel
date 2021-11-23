<html>

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="{{asset('css/app.css')}}">
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
      <a class="nav-link" href="index">Home</a>
    </li>
    
    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Categories
      </a>
      
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Science And Technology</a>
        <a class="dropdown-item" href="#">History</a>
        <a class="dropdown-item" href="#">Fiction</a>
        <a class="dropdown-item" href="#">Biographies</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about">About</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="contact">Contact</a>
    </li>

  </ul>
</nav>

    <div class="head">
      <ul>
        <li><a href="login">Login</a></li>
        <li><a href="signup">Sign In</a></li>
        <li><a href="cart"><i class="fal fa-shopping-cart font-weight-normal"></i></a></li>
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