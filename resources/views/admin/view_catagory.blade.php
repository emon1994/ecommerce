<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.admincss')
   <style type="text/css"> 
    .div_center
    {
        text-align: center;
        padding: 30px;
    }
    .h2_info
    {
        font-size: 30px;
        font-weight: bold;
        margin-bottom: 20px;
    }

   </style>
       
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
             <div class="div_center">
               
                <h2 class="h2_info">Add Category</h2>
                <form action="{{ url('add_category') }}" method="POST">
                    @csrf 
                    <input type="text" class="text-black" name="name" placeholder="add category name">
                    <input type="submit" class="btn btn-success" name="submit" value="add category">

                </form>

             </div>

             <div>
                <table class="table w-50 border border-white mx-auto">
                    <tr class="text-white">
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                    @foreach($data as $data)

                    <tr class="text-white">
                        <td>{{$data->category_name}}</td>
                        <td>
                            <a href="{{url('delete_post', $data->id)}}" class="btn btn-danger">delet</a>
                        </td>
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