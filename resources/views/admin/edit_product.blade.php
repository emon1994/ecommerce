<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
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
          <div class="col-md-8 mx-auto">
                <h2 class="text-center lead mb-3">Edit Product</h2>
                <form action="{{ url('update_product',$data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf 
                    <div class="">
                        <label for="title">Product Title</label>
                        <input type="text" value="{{ $data->title }}" name="title" class="form-control bg-primary" required="">
                    </div>

                    <div class="">
                        <label for="title">Product Description</label>
                        <input type="text" value="{{ $data->description }}" name="description" class="form-control  bg-primary text-black" required="">
                    </div>
                    <div class="">
                        <label for="price">Product Price</label>
                        <input type="number" value="{{ $data->price }}" name="price" class="form-control  bg-warning text-black" required="" >
                    </div>
                    <div class="">
                        <label for="dis_price">Discount Price</label>
                        <input type="number" value="{{ $data->dis_price }}" name="dis_price" class="form-control  bg-primary text-black" required="">
                    </div>
                    <div class="">
                        <label for="quantity">Product Quantity</label>
                        <input type="number" value="{{ $data->quantity }}" name="quantity" class="form-control  bg-primary text-black" required="">
                    </div>
                    <div class="mt-3">
                        <label for="category">Product Category</label>
                        <select class="form-select bg-primary text-black" value="{{ $data->category }}" name="category" aria-label="Default select example">
                            <option selected>{{ $data->category}}</option>
                            @foreach($category as $data)
                            <option value="{{ $data->category_name}}">{{ $data->category_name}}</option>
                            @endforeach
                           
                        </select>
                    </div>
                    <div class="">
                        <label for="">old image</label>
                        <img style="height:100px; width:100px;" src="{{asset('/product_image/'. $data->image) }}" alt="">
                    </div>
                    <div class="">
                        <label for="image">New Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div>
                        <input type="submit" value="add product" class="btn btn-primary form-control bg-success text-black">
                    </div>



                </form>
            </div>
          </div>
        </div>
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>