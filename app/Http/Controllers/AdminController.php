<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Order;
use App\Models\Event;
class AdminController extends Controller
{
    public function add_food()
    {
        return view('admin.add_food');
    }

    public function upload_food(Request $request)
    {
        $data = new Food;
        $data->title = $request->title;
        $data->details = $request->details;
        $data->price = $request->price;

        $image = $request->image;
        $filename = time().'.'.$image->getClientOriginalExtension();
        $image->move('food_img', $filename);
        $data->image = $filename;

        $data->save();
        return redirect()->back();
    }


    
        public function view_food()
        {
            $data = Food::all();
            return view('admin.view_food', compact('data'));
        }
    public function delete_food($id)
    {
        $data = Food::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function update_food($id)
    {
        $food = Food::find($id);
        return view('admin.update_food', compact('food'));
    }
    public function edit_food(Request $request, $id)
{
    $data = Food::find($id);
    $data->title = $request->title;
    $data->details = $request->details;
    $data->price = $request->price; 

    if($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time().'.'.$image->getClientOriginalExtension();
        $image->move('food_img', $filename);
        $data->image = $filename;
    }

    $data->save();
    return redirect('view_food');
}
    public function orders()
    {
        $orders = Order::all();
        return view('admin.order', compact('orders'));
    }


public function add_event()
    {
        return view('admin.add_event');
    }
public function upload_event(Request $request)
    {
        $data = new Event;
        $image= $request->image;
        $filename = time().'.'.$image->getClientOriginalExtension();
        $image->move('event_img', $filename);
        $data->image = $filename;
        $data->save();
        return redirect()->back();
    }  

 public function view_event()
        {
            $data = Event::all();
            return view('admin.view_event', compact('data'));
        }

        public function delete_event($id)
    {
        $data = Event::find($id);
        $data->delete();
        return redirect()->back();
    }

public function on_the_way($id){

        $order= Order::find($id); 
        $order->status ='On the way';
        $order->save();
        return redirect()->back();

}

public function delivered($id)
{
        $order = Order::find($id);
        $order->status = 'Delivered';
        $order->save();
        return redirect()->back();
}

public function cancel_order($id)
{
        $order = Order::find($id);
        $order->status = 'Cancelled';
        $order->save();
        return redirect()->back();
}

}
