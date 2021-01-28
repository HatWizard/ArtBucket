<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
    <link href="{{ asset('css/bucket.css?v='.time()) }}" rel="stylesheet">
    <link href="{{ asset('css/image_styles.css?v='.time()) }}" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
      <a class="navbar-brand font-weight-bold" style="color: rgb(14, 177, 150)" href="/">Rule25</a>
      <button class="navbar-toggler" type="button" onclick="hide_nav()">
        <span class="navbar-toggler-icon"></span>
      </button>
        <div class="collapse navbar-collapse d-flex" >
          <div class="d-flex divided-nav" id="navbarmain">
            <div>
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="#">Posts</a>
                </li>

                <li class="nav-item active">
                  <a class="nav-link" href="{{route('image.create')}}">Publish art</a>
                </li>
              </ul>
            </div>
  
            <div>
              <ul class="navbar-nav mr-auto">
                <li>
                  <form action="{{route("mainhome")}}" class="form-inline my-2 my-lg-0" method="GET">
                    @csrf
                    <input name="tags" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                  </form>
                </li>
                  @guest
                <li class="nav-item active">
                  <a class="nav-link" href="{{route('register')}}">Register</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="{{route('login')}}">Login</a>
                </li>
                @endguest
  
                @auth
                  <li class="nav-item active">
                    <form method="POST" action="{{route('logout')}}" id="logout_form" enctype="multipart/form-data">
                      @csrf
                      <button type="submit" class="btn btn-link nav-link">Logout</button>
                    </form>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="#">{{auth()->user()->username}}</a>
                  </li>
                @endauth
              </ul>
            </div>
          </div>
         
        </div>
      </nav>
    <div>
    @yield('content')
    </div>

    <script>
      function hide_nav(){
        var nav = document.getElementById("navbarmain");
        nav.classList.toggle("divided-nav-responsive");
      }
    </script>

</body>
</html>