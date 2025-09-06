<!-- Navbar -->
    <nav class="custom-navbar navbar navbar-expand-lg navbar-dark fixed-top" data-spy="affix" data-offset-top="10">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#blog">Items</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="#event">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact Us</a>
                </li>
               
            </ul>
            <a class="navbar-brand m-auto" href="#">
    <img src="{{ asset('assets/imgs/Next Crumb.jpg') }}" class="brand-img" alt="Next Crumb">
    <span class="brand-txt">Next Crumb</span>
          </a>
            <ul class="navbar-nav">
                
                <li class="nav-item ml-2">
                    <button id="theme-toggle" type="button" class="btn btn-outline-light">Light</button>
                </li>
                
               


                @if (Route::has('login'))
                @Auth

                
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('my_cart') }}">Cart<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('add_review') }}">Reviews</a>
                </li>
                
                <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-primary ml-xl-4">Logout</button>
                </form>
        
                @else

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
                @endauth
                @endif
                
            </ul>
        </div>
    </nav>
    <!-- header -->
    <header id="home" class="header">
        <div class="overlay text-center">
            <h1 class="display-2 font-weight-bold my-3 text-white">Next Crumb</h1>
            <h2 class="display-4 mb-5 text-white">Always fresh &amp; Delightful</h2>
            
        </div>
    </header>
