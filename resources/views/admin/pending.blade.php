<!DOCTYPE html>
<html lang="en">
    <title>Yearn Art | Payment</title>
  <head>
   @include('admin.css')
   <style>
    .title-deg {
        text-align: center;
        font-size: 25px;
        font-weight: bold;
    }
    .table-deg {
        border: 2px solid white;
        width: 100%; /* Set the width of the table */
        margin: auto;
        text-align: center;
        table-layout: fixed; /* Ensure fixed layout */
    }
    .table-deg th, .table-deg td {
        width: auto; /* You can set fixed widths for each column as needed */
        padding: 10px; /* Add padding for better appearance */
        word-wrap: break-word; /* Allow word wrapping for long content */
    }
    .img-size{
        width: 100px;
        height: 100px;
    }
    .th-deg{
        background: #FAC6BF;
    }
   </style>

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
                <h1 class="title-deg">Pending Orders</h1>
                <table class="table-deg">
                    <tr>
                        <th class="th-deg">Name</th>
                        <th class="th-deg">Product Name</th>
                        <th class="th-deg">Price</th>
                        <th class="th-deg">Quantity</th>
                        <th class="th-deg">Order ID</th>
                        <th class="th-deg">Action</th>






                    </tr>
                    @foreach ($order as $order)

                    @if($order->order_status=='Order Placed')
                    <tr>
                        <td>{{$order->name}}</td>
                        <td>{{$order->product_name}}</td>
                        <td>{{$order->price}}.00</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->order_id}}</td>

                        <td>
                            @if($order->order_status=='On Process')
                            <p>Confirmed</p>
                            @else
                            <a href="{{url('to_dpay', $order->id)}}" class="btn btn-success" onclick="return confirm('Are you sure this order can be made?')">Confirm</a>

                            @endif
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </table>
            </div>z
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')

    <!-- End custom js for this page -->
  </body>
</html>
