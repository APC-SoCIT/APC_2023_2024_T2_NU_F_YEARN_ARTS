<!DOCTYPE html>
<html lang="en">
<head>
    @include('YearnArt.css')
    <link rel="stylesheet" href="assets/">
    <link rel="stylesheet" href="assets/css/order_tracking.css">
</head>

<title>Yearn Art | Pending Orders</title>
<body>
    @include('home.header')
    <div class="header">
        <h6>My Orders</h6>
        <a href="{{url('/show_cart')}}" class="cart-link">CART
            <img src="assets/image/cart1.png" alt="Cart Icon" class="cart-icon"></a>
    </div>

    @include('YearnArt.status_links', ['selectedStatus' => 'Pending'])

    <section class="custom-section">
        <div class="container py-5">
            <div class="order-container">
                <!-- Loop through your order data here -->
                @foreach ($order as $order)
                    @if ($order->order_status === 'To Pay')
                        <div class="order-item">
                            <img src="product/{{ $order->image }}" class="img-fluid" alt="{{ $order->product_name }}">
                            <div class="order-details">
                                <p class="product-name">{{ $order->product_name }}</p>
                                <p class="order-info">Quantity: {{ $order->quantity }}</p>
                                <p class="order-info">Price: ${{ $order->price }}</p>
                                <p class="order-info">Order Status: {{ $order->order_status }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach

                <!-- Your existing receipt footer -->
                <!-- ... -->
            </div>
        </div>
    </section>

    <script src="assets/javascript/home.js"></script>
    @include ('YearnArt.chatbot')
    @include ('YearnArt.script')
</body>
</html>
