<!DOCTYPE html>
<html lang="en">
<head>

	@include('home.css')

<style>
    body {
        background: #2f3b49ff;
        color: #dfe6e9;
        font-family: 'Segoe UI', Arial, sans-serif;
    }
    table {
        background-color: #2d3436;
        border-radius: 16px;
        box-shadow: 0 2px 16px rgba(0,0,0,0.18);
        margin: 40px auto 0 120px;
        width: 800px;
        border-collapse: separate;
        border-spacing: 0;
        overflow: hidden;
    }
    th {
        background: #5d676bff;
        color: #fff;
        border: none;
        padding: 14px 10px;
        font-weight: 600;
        font-size: 1.1rem;
    }
    td {
        color: #dfe6e9;
        background: #222f3e;
        padding: 12px 10px;
        border-bottom: 1px solid #5d676bff;
        font-size: 1rem;
    }
    tr:last-child td {
        border-bottom: none;
    }
    h1 {
        color: #00b894;
        margin-left: 120px;
        margin-top: 40px;
        font-weight: 700;
        letter-spacing: 1px;
    }
    img {
        border-radius: 8px;
        border: 2px solid #636e72;
        background: #222f3e;
    }
</style>


</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    
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
                    <a class="nav-link" href="{{url('/#about')}}">About</a>
                </li>
                
                
            </ul>
            
    
    
            <ul class="navbar-nav">
                



                @if (Route::has('login'))
                @auth


                <li class="nav-item">
                    <a class="nav-link" href="{{ url('my_cart') }}">Cart<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('add_review') }}">Reviews</a>
                </li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <input type="submit" value="Logout" class="btn btn-primary ml-xl-4">
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

<div class="d-flex justify-content-center mt-5">
    <div style="background-color: #2d3436; padding: 30px; border-radius: 16px; width: 600px; box-shadow: 0 2px 16px rgba(0,0,0,0.18);">
        <h2 style="color: #b80034ff; text-align: center; margin-bottom: 20px;">Share Your Review</h2>
        <form action="{{ route('add_review.submit') }}" method="POST">
            @csrf
            <!-- Review Text -->
            <div class="form-group mb-3">
                <label for="review" style="color: #dfe6e9; font-weight: 600;">What do you want to share?</label>
                <textarea name="review" id="review" class="form-control" rows="4" style="border-radius: 8px; background-color: #222f3e; color: #dfe6e9; border: 1px solid #636e72;" required></textarea>
            </div>

            <!-- Rating -->
            <div class="form-group mb-3">
                <label for="rating" style="color: #dfe6e9; font-weight: 600;">Rating</label>
                <select name="rating" id="rating" class="form-control" style="border-radius: 8px; background-color: #222f3e; color: #dfe6e9; border: 1px solid #636e72;" required>
                    <option value="">Select Rating</option>
                    <option value="1">1 ⭐</option>
                    <option value="2">2 ⭐⭐</option>
                    <option value="3">3 ⭐⭐⭐</option>
                    <option value="4">4 ⭐⭐⭐⭐</option>
                    <option value="5">5 ⭐⭐⭐⭐⭐</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <input type="submit" value="Submit Review" class="btn btn-primary" style="width: 100%; border-radius: 8px;">
            </div>
        </form>
    </div>
</div>

</body>
</html>
