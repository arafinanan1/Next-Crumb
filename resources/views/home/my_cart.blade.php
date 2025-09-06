<!DOCTYPE html>
<html lang="en">
<head>
	@include('home.css')
    <style>
        .table {
            width: 80%;
           
            margin: auto;
            padding: 20px;
            
            
            
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

   
    <table class="table table-bordered table-striped" style="margin-top:150px;">
    <thead>
        <tr>
            <th>Title</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Image</th>
            <th>Remove</th>
        </tr>
    </thead>
    <tbody>
        <?php $total_price = 0; ?>
        @foreach ($data as $cart) 
        <tr>
            <td>{{ $cart->title }}</td>
            <td>{{ $cart->price }}</td>
            <td>{{ $cart->quantity }}</td>
            <td><img width="150" src="food_img/{{ $cart->image }}" alt=""></td>
            <td>
                <a onclick="return confirm('Are you sure?')" 
                   class="btn btn-danger" 
                   href="{{ url('/remove_cart', $cart->id) }}">
                   Remove
                </a>
            </td>
        </tr> 
        <?php $total_price += $cart->price ?>
        @endforeach
    </tbody>
</table>

<!-- ✅ Total price displayed below table -->
<h3 style="padding: 20px; text-align:center;">Total Price: {{ $total_price }}</h3>

<div  class="table table-bordered table-striped" style="margin-top:50px;width:50%;>
    <div style="width: 50%; max-width: 500px; background:#f8f9fa; padding:30px; border-radius:10px; box-shadow:0px 4px 8px rgba(0,0,0,0.1);>
        
        <h1 style="font-size: 25px; text-align:center; margin-bottom:20px;">Proceed to Order</h1>
        <p style="text-align:center; margin-bottom:20px;">Cash on Delivery only</p>
        
        <form action="{{ url('confirm_order') }}" method="POST">
            @csrf

            <div style="margin-bottom:15px;">
                <label for="name" style="display:block; font-weight:bold; margin-bottom:5px;">Name</label>
                <input type="text" name="name" value="{{Auth()->user()->name}}"
                        placeholder="Enter your name" required 
                       style="width:100%; padding:10px; border:1px solid #ccc; border-radius:5px;">
            </div>

            <div style="margin-bottom:15px;">
                <label for="email" style="display:block; font-weight:bold; margin-bottom:5px;">Email</label>
                <input type="email" name="email" value="{{ Auth()->user()->email }}" placeholder="Enter your email" required 
                       style="width:100%; padding:10px; border:1px solid #ccc; border-radius:5px;">
            </div>

            <div style="margin-bottom:15px;">
                <label for="address" style="display:block; font-weight:bold; margin-bottom:5px;">Address</label>
                <input type="text" name="address" value="{{ Auth()->user()->address }}" placeholder="Enter your address" required 
                       style="width:100%; padding:10px; border:1px solid #ccc; border-radius:5px;">
            </div>

            <div style="margin-bottom:20px;">
                <label for="phone" style="display:block; font-weight:bold; margin-bottom:5px;">Phone</label>
                <input type="text" name="phone" value="{{ Auth()->user()->phone }}" placeholder="Enter your phone number" required 
                       style="width:100%; padding:10px; border:1px solid #ccc; border-radius:5px;">
            </div> 

            <div style="text-align:center;">
                <input type="submit" value="Confirm Order" 
                       class="btn btn-primary" 
                       style="padding:10px 30px; font-size:16px; border-radius:5px;">
            </div>
        </form>
    </div>
</div>

</body>
</html>
