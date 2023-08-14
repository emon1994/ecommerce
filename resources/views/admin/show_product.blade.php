<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.admincss')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->admin/
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <div class="main-panel">
          <div class="content-wrapper">
            @if(session()->has('message'))
                 <div class="alert alert-success">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                   {{ session()->get('message')}}
                 </div>
            @endif
            <h2 class="text-center h1">All Product</h2>
            <div>
                <table class="table border border-white">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>price</th>
                        <th>Discount</th>
                        <th>Quantity</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach($product as $data)
                        <tr>
                            <td>{{ $data->title }}</td>
                            <td>{{ $data->description }}</td>
                            <td>{{ $data->price }}</td>
                            <td>{{ $data->dis_price }}</td>
                            <td>{{ $data->quantity }}</td>
                            <td>{{ $data->category }}</td>
                            <td><img src="/product_image/{{ $data->image}}" style=" height: 80px; width:80px;"></td>
                            <td><a href="{{ url('edit_product', $data->id) }}" class="btn btn-primary">Edit</a></td>
                            <td><a href="{{ url('delete_product', $data->id)}}" class="btn btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
          </div>
        </div>
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>