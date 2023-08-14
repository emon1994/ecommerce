<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      @include('home.homecss')
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
        
        @if(session()->has('message'))
                 <div class="alert alert-success">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                   {{ session()->get('message')}}
                 </div>
            @endif 
        <div>
            <h1 class="text-center text-primary mb-4"> <b>CART LIST</b></h1>
            <table class="table w-75 border border-secondary mx-auto">
                    <tr class="bg-warning">
                        <th>Product Name</th>
                        <th>Product Quantity</th>
                        <th>Product Price</th>
                        <th>Product Image</th>
                        <th>Action</th>
                        
                    </tr>
                    <?php $totalAmount=0  ?>
                    @foreach($cart as $cart)
                    <tr>
                        <td>{{$cart->product_title }}</td>
                        <td>{{$cart->quantity}}</td>
                        <td>{{$cart->price}}</td>
                        <td><img style="height: 150px; width: 180px;" src="/product_image/{{ $cart->image }}" alt=""></td>
                        <td><a href="{{ url('remove_cart',$cart->id) }}" class="btn btn-danger">Remove</a></td>

                    </tr>
                    <?php $totalAmount+= $cart->price; ?>
                    @endforeach
            </table>

            <h1 class="text-center m-5"><b class="bg-warning p-3 ">Total Amount : {{$totalAmount}}</b> </h1>
            <h2 class="text-center" style=" font-size:20px; font-weight:bold;">Proceed to Order</h2>
            <div class="text-center mb-5">
                <a href="{{ url('cash_order') }}" class="btn btn-danger">Cash On Delivery</a>
                <a href="{{ url('stripe',$totalAmount) }}" class="btn btn-danger">Pay Using Card</a>
            </div>
        </div>
       
      <!-- footer end -->
      @include('home.script')
   </body>
</html>