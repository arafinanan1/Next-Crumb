<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Food;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Review;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{ 
 public function my_home()
{
    $data = \App\Models\Food::all();
    $reviews = \App\Models\Review::latest()->take(6)->get();
    $events = \App\Models\Event::latest()->take(8)->get();

    return view('home.index', compact('data', 'reviews', 'events'));
}

public function index ()
{
    if (\Illuminate\Support\Facades\Auth::id())
    {
        $usertype = auth()->user()->usertype;

        if ($usertype == "user") {
            $data = \App\Models\Food::all();
            $reviews = \App\Models\Review::latest()->take(6)->get();
            $events = \App\Models\Event::latest()->take(8)->get();

            return view('home.index', compact('data', 'reviews', 'events'));
        } elseif ($usertype == "admin") {


            $total_user = User::where('usertype', '=', 'user')->count();
            $total_food = Food::count();
            $total_review = Review::count();
            $total_order = Order::count();
           

            // Build per-food order stats for dashboard cards
            $foods = Food::select('title')->get();
            $orderCounts = Order::select('title', DB::raw('COUNT(*) as cnt'))
                ->groupBy('title')
                ->pluck('cnt', 'title');
            $foodOrderStats = $foods->map(function ($f) use ($orderCounts) {
                return [
                    'title' => $f->title,
                    'orders' => (int)($orderCounts[$f->title] ?? 0),
                ];
            });

            return view('admin.index', compact(
                'total_user',
                'total_food',
                'total_review',
                'total_order',
                'foodOrderStats'
            ));
        }
    }

    // If unauthenticated hits /home, redirect to landing
    return redirect('/');
}

    
public function add_cart(Request $request, $id)
{
    if (Auth::id())
    {
       
        $food = Food::find($id);

        

        // Set food data
        $cart_title = $food->title;
        $cart_details = $food->details;
        $cart_price = $food->price;
        $cart_image = $food->image;
        $data = new Cart;
        $data->title = $cart_title;
        $data->details = $cart_details;
        $data->price = $cart_price *$request->quantity;
        $data->image = $cart_image;
        // Set quantity from input
        $data->quantity = $request->quantity;
        $data->user_id = Auth::user()->id;

        $data->save();
        return redirect()->back()->with('message','Food Added to Cart Successfully');
    }
    else
    {
        return redirect('login');
    }
}


 public function my_cart()
    {
        if (Auth::id())
        {
            $user_id = Auth::user()->id;
            $data = Cart::where('user_id', '=',$user_id)->get();
            return view('home.my_cart', compact('data'));
        }
        return redirect('login');
    }




public function remove_cart($id)
{
    $data = Cart::find($id);
    $data->delete();
    return redirect()->back()->with('message','Food Removed Successfully');
}

public function confirm_order(Request $request)
{
    $user_id = Auth::user()->id;
    $cart= Cart::where('user_id', '=' ,$user_id)->get();
    
    
    foreach ($cart as $cart) 
        {
        $order = new Order;
        $order->name = $request->name;
        $order->email=$request->email;
        $order->address=$request->address;
        $order->phone=$request->phone;
        $order->title = $cart->title;
        $order->price = $cart->price;
        $order->quantity = $cart->quantity;
        $order->image = $cart->image;

        $order->save();

        $data = Cart::find($cart->id);
        // Optionally, you can delete the cart item after creating the order
        $data->delete();
        
    }
    return redirect()->back()->with('message', 'Order Confirmed Successfully');
    

 }




public function showReviewForm() {
    return view('home.add_review');
}

public function add_review(Request $request) {
    
    $request->validate([
        'review' => 'required|string|max:1000',
        'rating' => 'required|integer|min:1|max:5',
    ]);

    $review = new Review();
    $review->user_id = Auth::id();   // ✅ correct
    $review->name = Auth::user()->name;
    $review->review_text = $request->input('review');
    $review->rating = $request->input('rating');
    $review->save();

    return redirect()->back()->with('success', 'Your review has been submitted!');
}


} 

    









