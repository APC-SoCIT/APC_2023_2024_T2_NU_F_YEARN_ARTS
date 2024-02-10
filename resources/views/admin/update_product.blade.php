<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    <title>Yearn Art | Edit Product</title>
   @include('admin.css')
  </head>
  <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40px;
        }
        .font_size{
            font-size: 40px;
            padding-bottom: 30px;

        }
        .text_color{
            color: black;
            padding-bottom: 20px;
        }
        label{
            display: inline-block;
            width: 200px;
        }
        .div_design{
            padding-bottom: 15px;
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
                <div class="div_center">

                    <h1 class="font_size">Update Product</h1>

                    <form action="{{url('/update_product_confirm', $product->id)}}" method="POST" enctype="multipart/form-data">
                        <div class="div_design">
                            <label>Product Name</label>
                            <input class="text_color"type="text" name="product_name" placeholder="Enter Product Name"id="" required="" value="{{$product->product_name}}">
                        </div>

                        @csrf

                        <div class="div_design">
                            <label>Product Category</label>
                           <select class="text_color"name="category" id="" required="">
                            <option value="{{$product->category}}" selected="">{{$product->category}}</option>
                            @foreach($category as $category)
                            <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                            @endforeach

                           </select>
                        </div>
                        <div class="div_design">
                            <label>Product Description</label>
                            <input class="text_color"type="text" name="product_description" placeholder="Enter Product Description" id="" required="" value="{{$product->product_description}}" >
                        </div>
                        <div class="div_design">
                            <label>Extra Small</label>
                            <input class="text_color"type="number" name="price" placeholder="Enter Price"id="" required="" value="{{$product->extra_small_price}}">
                        </div>
                        <div class="div_design">
                            <label>Small</label>
                            <input class="text_color"type="number" name="small_price" placeholder="Enter Price"id="" required="" value="{{$product->small_price}}">
                        </div>
                        <div class="div_design">
                            <label>Medium</label>
                            <input class="text_color"type="number" name="medium_price" placeholder="Enter Price"id="" required="" value="{{$product->medium_price}}">
                        </div>
                        <div class="div_design">
                            <label>Large</label>
                            <input class="text_color"type="number" name="large_price" placeholder="Enter Price"id="" required="" value="{{$product->large_price}}">
                        </div>
                        <div class="div_design">
                            <label>Extra Large</label>
                            <input class="text_color"type="number" name="i_extra_large_price" placeholder="Enter Price"id="" required="" value="{{$product->i_extra_large_price}}">
                        </div>
                        <div class="div_design">
                            <label>2 Extra Large</label>
                            <input class="text_color"type="number" name="ii_extra_large_price" placeholder="Enter Price"id="" required="" value="{{$product->ii_extra_large_price}}">
                        </div>
                        <div class="div_design">
                            <label>3 Extra Large</label>
                            <input class="text_color"type="number" name="iii_extra_large_price" placeholder="Enter Price"id="" required="" value="{{$product->iii_extra_large_price}}">
                        </div>
                        <div class="div_design">
                            <label>4 Extra Large</label>
                            <input class="text_color"type="number" name="iiii_extra_large_price" placeholder="Enter Price"id="" required="" value="{{$product->iiii_extra_large_price}}">
                        </div>
                        <div class="div_design">
                            <label>5 Extra Large</label>
                            <input class="text_color"type="number" name="iiiii_extra_large_price" placeholder="Enter Price"id="" required="" value="{{$product->iiiii_extra_large_price}}">
                        </div>

                        <div class="div_design">
                            <label>Processing Time</label>
                            <input class="text_color"type="text" name="processing_time" placeholder="Enter Processing Time"id="" required="" value="{{$product->processing_time}}">
                        </div>
                        <div class="div_design">
                            <label>Change Product Image</label>
                            <input type="file" name="image" >
                        </div>
                        <div class="div_design">
                            <label>Current Product Image</label>
                            <img style="margin:auto;" height="100" width="100"src="/product/{{$product->image}}" alt="">
                        </div>
                        <div class="div_design">

                            <input type="submit" value="Update Product" class="btn btn-primary">
                        </div>

                    </form>


                </div>

            </div>
        </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
