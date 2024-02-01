<!DOCTYPE html>
<html lang="en">
<head>
@include('YearnArt.css')
<link rel="stylesheet" href="assets/">

@include('YearnArt.styleforordertracking')
</head>

<title>Yearn Art | All Orders</title>
<body>
@include('home.header')
<div class="header">
    <h6>My Orders</h6>
    <a href="{{url('/show_cart')}}" class="cart-link">CART
        <img src="assets/image/cart1.png" alt="Cart Icon" class="cart-icon"></a>
</div>

@include('YearnArt.status_links', ['selectedStatus' => 'All'])

<section class="custom-section">
    <div class="container py-5">
        <div class="order-container">
            <!-- Loop through your order data here -->
            @foreach ($order as $order)
                <div class="order-item">
                    <img src="product/{{ $order->image }}" class="img-fluid" alt="{{ $order->product_name }}">
                    <div class="order-details">
                        <p class="product-name">{{ $order->product_name }}</p>
                        <p class="order-info">Quantity: {{ $order->quantity }}</p>
                        <p class="order-info">Price: ${{ $order->price }}</p>
                        <p class="order-info">Order Status:  @if($order->order_status=='Order Placed')
                            Pending
                            @else
                            {{$order->order_status}}
                            @endif
                        </p>
                    </div>

                </div>
            @endforeach

            <!-- Your existing receipt footer -->
            <!-- ... -->
        </div>
    </div>
</section>


{{-- <table class="table-deg">
    <tr>



        <th class="th-deg">Product Name</th>
        <th class="th-deg">Price</th>
        <th class="th-deg">Quantity</th>
        <th class="th-deg">Processing Time</th>
        <th class="th-deg">Primary Color</th>
        <th class="th-deg">Secondary Color</th>
        <th class="th-deg">Size</th>


        <th class="th-deg">Payment Status</th>
        <th class="th-deg">Order Status</th>



    </tr>
    @foreach ($order as $order)


    <tr>
        @if ($order->order_status === 'Order Placed')

        <td>{{$order->product_name}}</td>
        <td>{{$order->price}}</td>
        <td>{{$order->quantity}}</td>
        <td>{{$order->processing_time}}</td>
        <td style="background-color: {{$order->primaryclr}}"></td>
        <td style="background-color: {{$order->secondaryclr}}"></td>
        <td>{{$order->size}}</td>


        <td>{{$order->payment_status}}</td>
        <td>{{$order->order_status}}</td>


        @endif
    </tr>
    @endforeach
</table> --}}


<script src="assets/javascript/home.js"></script>
@include ('YearnArt.chatbot')
@include ('YearnArt.script')
</body>
</html>

