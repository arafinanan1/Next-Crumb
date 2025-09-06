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
    background: #2d3436;
    min-height: 100vh;
    margin: 0;
  }
  .d-flex.align-items-stretch {
    min-height: 100vh;
  }
 .center-container {
  flex: 1;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-left: 180px; 

  }
  .add-food-card {
    background: #2d3436;
    border-radius: 14px;
    box-shadow: 0 4px 24px rgba(0,0,0,0.18);
    padding: 32px 24px;
    max-width: 380px;
    width: 100%;
  }
  .add-food-card h2 {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 24px;
    color: #e0e6e4ff;
    text-align: center;
    letter-spacing: 1px;
  }
  .add-food-card .form-label {
    font-weight: 600;
    color: #dfe6e9;
  }
  .add-food-card .form-control {
    border-radius: 10px;
    border: 1px solid #2d3436;
    margin-bottom: 16px;
    font-size: 1rem;
    background: #434b53ff;
    color: #fff;
  }
  .add-food-card .form-control:focus {
    border-color: #00b894;
    background:#2d3436;
    color: #ffffffff;
  }
  .add-food-card .btn-primary {
    width: 100%;
    border-radius: 10px;
    background: linear-gradient(90deg, #0984e3 0%, #00b894 100%);
    border: none;
    font-weight: 700;
    font-size: 1.05rem;
    padding: 10px 0;
    transition: background 0.2s;
    box-shadow: 0 2px 8px rgba(0,184,148,0.08);
    color:#0984e3;
  }
  .add-food-card .btn-primary:hover {
    background: linear-gradient(90deg, #00b894 0%, #0984e3 100%);
    color: #0984e3;
  }
</style>


<body>
 
  <div class="d-flex align-items-stretch">
    @include('admin.sidebar')

    <div class="center-container">
      <div class="add-food-card">
        <h2>Add New Food</h2>
        <form action="{{url('upload_food') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="title" class="form-label">Food Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
          </div>
          <div class="mb-3">
            <label for="details" class="form-label">Details</label>
            <textarea class="form-control" id="details" name="details" rows="3" required></textarea>
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
          </div>
          <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" required>
          </div>
          <button type="submit" class="btn btn-primary">Add Food</button>
        </form>
      </div>
    </div>
  </div>
  @include('admin.js')
</body>

</html>