<!DOCTYPE html>
<html lang="en">
<head>
@include('YearnArt.css')
<link rel="stylesheet" href="assets/">
<link rel="stylesheet" href="assets/css/order_tracking.css">

</head>

<title>Yearn Art | All Orders</title>
<body>
@include('home.header')
<div class="header">
    <h6 class="orders">My Order Information</h6>
    <a href="{{url('/show_orders')}}" class="cart-link">Back to My Orders
        <img src="assets/image/Cart.png" alt="Cart Icon" class="cart-icon"></a>
</div>
<section class="custom-section">
    <div class="order-tracking-status">
        <img src="assets\image\OrderTrackingSpecific\Order-Placed-SOrder.png" alt="">
    </div>
            <div class="order-container">
                <!-- Loop through your order data here -->

                    <div class="order-item">
                        <div class="upper-part">
                            <div class="img-fluid">
                                <img src="product/{{ $order->image }}" alt="{{ $order->product_name }}">
                            </div>

                            <div class="order-details">
                                <p class="product-names">{{ $order->product_name }}</p>
                                <p class="order-info">Variation: x{{ $order->quantity }} | {{$order->size}}</p></p>
                            </div>

                            <div class="order-stats">
                                <p>
                                    {{$order->order_status}}/Pending
                                </p>
                            </div>
                        </div>

                        <div class="line"></div>

                        <div class="lower-part">
                            <div>
                                <p class="processing-paragraph">
                                    We kindly ask for your patience as your order is being processed by Yearn Art.
                                    This may take a while, but we assure you of our commitment to providing the best service possible.
                                </p>
                            </div>

                            <div class="pos-price">
                                    <p class="total">TOTAL:</p>
                                    <p class="price-num">₱{{ number_format($order->price, 2) }}</p>
                            </div>

                            <div class="buttons">

                                <a href="{{ url('/track_Sorder', $order->id) }}" class="custom-button track-order-button">Cancel Order</a>


                                <button class="custom-button">Contact Yearn Art</button>

                            </div>
                        </div>
                    </div>





            </div>

    </section>


<script src="assets/javascript/home.js"></script>
@include ('YearnArt.chatbot')
@include ('YearnArt.script')
</body>
</html>

