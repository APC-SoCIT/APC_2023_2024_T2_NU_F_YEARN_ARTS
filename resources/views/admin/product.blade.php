<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
   
   <link rel="stylesheet" href="admin/assets/css/admin_products.css">
   <title>Yearn Art | Products</title>

  
  </head>
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
                <div class="div-main">
                    <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                    <div class="child1">
                        <div class="div_design">
                                
                                <input type="file" name="image" required="">
                        </div>
                        <div class="div_design">

                                <input type="submit" value="Add Product" class="btn btn-primary">
                        </div>
                    </div>
                    <div class="child2">
                            <div class="product-name">
                            
                                <input class="text_color" type="text" name="product_name" placeholder="Product Name" id="" required="" autocomplete="off">
                            </div>

                        @csrf

                            <div class="div_design">
                            
                            <select class="text_color"name="category" id="" required="" >
                                <option value="" selected="">Product Type</option>
                                @foreach($category as $category)
                                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                @endforeach

                            </select>
                            </div>
                            <div class="div_design">
                                
                                <input class="text_color"type="text" name="product_description" placeholder="Product Description"id="" required="" >
                            </div>
                            <div class="div_design">
                                
                                <input class="text_color"type="number" name="price" placeholder="Price"id="" required="">
                            </div>
                            <div class="div_design">
                                
                                <input class="text_color" type="text" name="processing_time" placeholder="Processing Time"id="" required="">
                            </div>

                            
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
