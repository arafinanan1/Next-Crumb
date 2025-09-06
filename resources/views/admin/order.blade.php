<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Anan</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    @include('admin.css')
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
<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        @include('admin.sidebar')
        
        <div >
    <h2>Orders List</h2>
    <table >
        <thead>
            <tr >
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Title</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Image</th>
                <th>Status</th>
                <th>Change Status</th>
                
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
                <tr>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->title }}</td>
                    <td>{{ $order->price }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->price * $order->quantity }}</td>
                    <td>
                        @if($order->image)
                            <img width="100" src="{{ asset('food_img/'.$order->image) }}" alt="Food Image">
                        @else
                            No image
                        @endif
                    </td>
                    <td>{{ $order->status ?? 'in progress' }}</td>
                    <td>
                        <a href="{{ url('on_the_way/'.$order->id) }}" class="btn btn-info">On the way</a>
                        <a href="{{ url('delivered/'.$order->id) }}" class="btn btn-info">Delivered</a>
                        <a href="{{ url('cancel_order/'.$order->id) }}" class="btn btn-danger">Cancel</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="11" style="text-align: center;">No orders found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@include('admin.js')
