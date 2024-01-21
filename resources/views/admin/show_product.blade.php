<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
   <title>Yearn Art | Show Product</title>
  </head>
  <style type="text/css">
       .center{
        margin:auto;
        border: 2px solid white;
        text-align:center;
        margin-top:40px;
       }
       .font_size{
        text-align:center;
        font-size: 40px;
        padding-top: 20px;
       }
       .img_size{
        width: 150px;
        height: 150px;
       }
       .th_color{
        background: #FAC6BF;
       }
       .th_deg {
        padding: 30px;
       }



   </style>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
        <!-- partial:partials/_navbar.html -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @if(session()->has('message'))

                <div class='alert alert-success'>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>

                @endif
                <h2 class="font_size">All Products</h2>
                <table class="center">
                    <tr class="th_color">
                        <th class="th_deg">Product Name</th>
                        <th class="th_deg">Category</th>
                        <th class="th_deg">Product Description</th>
                        <th class="th_deg">Price</th>
                        <th class="th_deg">Processing Time</th>
                        <th class="th_deg">Product Image</th>
                        <th class="th_deg">Delete</th>
                        <th class="th_deg">Edit</th>
                    </tr>
                    @foreach($product as $product)
                    <tr>
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->category}}</td>
                        <td>{{$product->product_description}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->processing_time}}</td>
                        <td>
                            <img class="img_size"src="/product/{{$product->image}}" >
                        </td>
                        <td>
                            <a onclick="return confirm('Are you sure to delete this?')" class="btn btn-danger" href="{{url('delete_product',$product->id)}}">Delete</a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{url('update_product',$product->id)}}">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
