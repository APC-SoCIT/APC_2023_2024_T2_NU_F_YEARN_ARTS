<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <link rel="stylesheet" href="{{ asset('admin/assets/css/onprocess.css') }}">
    <link rel="stylesheet" href="admin/assets/css/ordertracking.css">
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
            <h1 class="title-deg">Order Processing</h1>



            <section class="custom-section">
                <div class="container py-5">
                    <div class="order-container">
                        <!-- Loop through your order data here -->
                        @foreach ($order as $order)
                            @if ($order->order_status === 'On Process' || $order->order_status === 'To Pay')
                                <div class="order-item">
                                    <div>
                                        <p class="product-name">{{ $order->name }}</p>
                                    </div>
                                    <img src="{{ asset('product/' . $order->image) }}" class="img-fluid" alt="{{ $order->product_name }}">
                                    <div class="order-details">
                                        <p class="product-name">{{ $order->product_name }}</p>
                                        <p class="order-info">Quantity: {{ $order->quantity }}</p>
                                        <p class="order-info">Price: ${{ $order->price }}</p>
                                        <p class="order-info">Order Status:  @if($order->order_status=='Order Placed')
                                                Pending
                                            @else
                                                {{ $order->order_status }}
                                            @endif
                                        </p>

                                        <!-- Add buttons inside each order -->
                                        <div class="buttons-container">
                                            @if ($order->order_status === 'On Process')
                                                <a href="{{url('to_fpay', $order->id)}}" class="btn btn-success" onclick="return confirm('Are you sure this order can be made?')">Done</a>
                                                <a href="{{ url('to_ship', $order->id) }}" class="btn btn-action btn-low-opacity btn-confirm-payment disabled" onclick="confirmOrderPayment({{ $order->id }})">Confirm Payment</a>
                                            @endif

                                            @if ($order->order_status === 'To Pay')
                                            <a href="{{url('to_fpay', $order->id)}}" class="btn btn-action btn-low-opacity disabled" onclick="return confirm('Are you sure this order can be made?')">Done</a>
                                            <a href="{{url('to_ship', $order->id)}}" class="btn btn-success" onclick="return confirm('Are you sure this order can be made?')">Confirm Payment</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                        <!-- Your existing receipt footer -->
                        <!-- ... -->
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')

    <!-- End custom js for this page -->

    <script>
        function markOrderAsDone(orderId) {
            // Add logic to mark the specific order as done
            alert('Order ' + orderId + ' marked as done!');
        }

        function confirmOrderPayment(orderId) {
            // Add logic to confirm payment for the specific order
            alert('Payment confirmed for Order ' + orderId + '!');
        }
    </script>
</body>
</html>
