
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
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      @include('admin.sidebar')
      <div>
        <h1>All Events</h1>
        <table>
            <tr>
                
                <th>Image</th>
                <th>Delete</th>
                

            </tr>
           

@foreach($data as $data)
<tr>
    
    <td>
      <img src="{{ asset('event_img/' . $data->image) }}" alt="" width="100" height="100">
    </td>
    <td>
      <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ url('delete_event',$data->id) }}">Delete</a>
    </tr>
@endforeach

        </table>
      </div>
    </div>
    @include('admin.js')
  </body>
</html>