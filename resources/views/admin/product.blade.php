<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
  </head>
  <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40px;
        }
        .font_size{
            font-size: 40px;
            padding-bottom: 40px;
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
                
                    <h1 class="font_size">Add Product</h1>

                    <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                        <div class="div_design">
                            <label>Product Name</label>
                            <input class="text_color"type="text" name="product_name" placeholder="Enter Product Name"id="" required="">
                        </div>

                        @csrf
                        
                        <div class="div_design">
                            <label>Product Category</label>
                           <select class="text_color"name="category" id="" required="">
                            <option value="" selected="">Product Type</option>
                            @foreach($category as $category)
                            <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                            @endforeach

                           </select>
                        </div>
                        <div class="div_design">
                            <label>Product Description</label>
                            <input class="text_color"type="text" name="product_description" placeholder="Enter Product Description"id="" required="" >
                        </div>
                        <div class="div_design">
                            <label>Price</label>
                            <input class="text_color"type="number" name="price" placeholder="Enter Price"id="" required="">
                        </div>
                        <div class="div_design">
                            <label>Processing Time</label>
                            <input class="text_color"type="text" name="processing_time" placeholder="Enter Processing Time"id="" required="">
                        </div>
                        <div class="div_design">
                            <label>Add Photo</label>
                            <input type="file" name="image" required="">
                        </div>
                        <div class="div_design">
                           
                            <input type="submit" value="Add Product" class="btn btn-primary">
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