<!DOCTYPE html>
<html>
   <head>
      <base href="/public">
      @include('home.homecss')
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
        <div class="col-sm-6 col-md-4 col-lg-4 mt-5 mx-auto">    
            <div class="img-box">
            <img src="/product_Image/{{$product->image }}" style="height: 300px; width: 350px;" alt="">
            </div>
            <div class="detail-box">
            <h5>
                {{ $product->title }}
            </h5>
            @if($product->dis_price!= null)
                <h6 class="text-danger">
                    Discount price 
                    <br>
                    ${{ $product->dis_price }}
                </h6>
                <h6 style="text-decoration:line-through; color:blue;">
                    ${{ $product->price}}
                </h6>

                @else
                <h6 style=" color:blue;">
                    ${{ $product->price}}
                </h6>
            @endif

            <h6>Product Category: {{ $product->category }}</h6>
            <h6>Product Description: {{ $product->description }}</h6>
            <h6>Product Quantity: {{ $product->quantity }}</h6>
            <form action="{{ url('add_cart', $product->id) }}" method="post" class="mt-4">
                @csrf 
                <div class="row">
                    <div class="col-md-4">
                    <input type="number" name="quantity" value="1" min="1" style=" width: 100px">
                    </div>

                    <div class="col-md-4">
                    <input type="submit" value="Add To Cart">
                    </div>
                </div>
            </form>
            
            </div>
        </div>

      
      </div>
     
      @include('home.footer')
      <!-- footer end -->
      @include('home.script')
   </body>
</html>