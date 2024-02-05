<!DOCTYPE html>
<html lang="en">
<head>
@include('YearnArt.css')
<link rel="stylesheet" href="assets/">
<link rel="stylesheet" href="assets/css/order_tracking.css">

</head>

<title>Yearn Art | {{ $order->product_name }}</title>
<body>
@include('home.header')
<div class="header">
    <h6 class="orders">My Order Information</h6>
    <a href="{{url('/show_orders')}}" class="cart-link">Back to My Orders
        <img src="assets/image/Cart.png" alt="Cart Icon" class="cart-icon"></a>
</div>
<section class="custom-section">
    <div class="order-tracking-status">
        <img src="assets\image\OrderTrackingSpecific\Order-Completed-SOrder.png" alt="">
    </div>
            <div class="order-container">


                    <div class="order-item">
                        <div class="upper-part">
                            <div class="img-fluid">
                                <img src="product/{{ $order->image }}" alt="{{ $order->product_name }}">
                            </div>

                            <div class="order-details">
                                <p class="product-names">{{ $order->product_name }}</p>
                                <p class="order-info">Variation: x{{ $order->quantity }} | {{$order->size}}</p>
                            </div>

                            <div class="order-stats">
                                <p>
                                    {{$order->order_status}}
                                </p>
                            </div>
                            <div >
                                <p>Fullpayment: </p>
                                <p>Paid</p>
                            </div>
                        </div>

                        <div class="line"></div>

                        <div class="lower-part">
                            <div>
                                <p class="paragraph">
                                    Thank you for choosing our products! We take pride in the quality and craftsmanship of our crochet masterpieces, and we want to ensure your complete satisfaction with your purchase.

We understand that sometimes adjustments or repairs may be necessary to meet your specific requirements. Therefore, we offer a return policy for adjustments and repairs within 10 days from the date of delivery. Please note that while we can accommodate adjustments and repairs, refunds are not available for our products.If you find that your product requires any modifications or repairs, please reach out to our customer service team within the specified timeframe. We will guide you through the return process and provide instructions on how to send the item back to us.
                                </p>
                            </div>

                            <div class="pos-price">
                                    <p class="total">TOTAL:</p>
                                    <p class="price-num">₱{{ number_format($order->price/2, 2) }}</p>
                            </div>
                            @php
                            $receivedTimestamp = strtotime($order->order_received_at);
                            $tenDaysAgo = strtotime('+10 days');
                            $formattedTenDaysAgo = date('Y-m-d', $tenDaysAgo);
                            @endphp
                            <div class="specified-timeframe">
                                <p>Specific timeframe of returning for return/resizing:</p>
                                <p>{{ 'Y-m-d'($order->order_received_at) }} - {{ $formattedTenDaysAgo  }}</p>
                            </div>


                            <!-- Assuming $order->order_received_at contains varchar timestamp -->

                            <div class="buttons">
                            @if ($receivedTimestamp >= $tenDaysAgo)
                            <a href="{{ url('receive_order', $order->id) }}" class="custom-button track-order-button">{{ $formattedTenDaysAgo  }}</a>
                            <button class="custom-button">Contact Yearn Art</button>
                            @else
                            <a href="#" class="custom-button track-order-button" disabled>Return for Resizing/Repair</a>
                            <button class="custom-button">Contact Yearn Art</button>
                            @endif
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

