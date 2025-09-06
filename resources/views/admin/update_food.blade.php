<!DOCTYPE html>
<html>
  <head>
    <base href="/public">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Anan</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    
    @include('admin.css')
  </head>

  <style>
    body {
    background: #22292bff;
    
  }
  </style>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      @include('admin.sidebar')

      


  <div style=" background:#2d3436;  width:800px;">
    <h1 style="color:white;">Update Foods</h1>
    
    <form action="{{ url('edit_food', $food->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Food Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $food->title }}" required>
      </div>
      <div class="mb-3">
        <label for="details" class="form-label">Food Details</label>
        <textarea class="form-control" id="details" name="details" rows="3" required>{{ $food->details }}</textarea>
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" id="price" name="price" value="{{ $food->price }}" step="0.01" required>
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">image</label>
        <input type="file" class="form-control" id="image" name="image" accept="image/*">
        <img src="{{ asset('food_img/' . $food->image) }}" alt="Current Image" width="100" style="margin-top:10px; border-radius:8px;">
      </div>
      <button type="submit" class="btn btn-warning">Update Food</button>
    </form>
  </div>
</div>

    </div>
    @include('admin.js')
  </body>
</html>