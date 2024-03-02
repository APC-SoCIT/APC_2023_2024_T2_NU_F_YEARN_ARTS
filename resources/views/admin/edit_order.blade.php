<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    @include('admin.css')
    <link rel="stylesheet" href="admin\assets\css\admin_edit_order.css">
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
                <div>
                    <p class="Head-title">Edit Order by: {{ $order->name }}</p>
                </div>
                <form action="{{url('/edit_order_confirm')}}" method="POST">

                    <!-- Add your form action URL in the action attribute -->
                    <div class="order-container">
                        <div class="order-item">
                            <div>

                                <a href="{{ asset('product/' . $order->image) }}" target="_blank">
                                    <!-- Wrap the image in an anchor tag and set the href attribute to the image URL -->
                                    <img src="{{ asset('product/' . $order->image) }}" class="img-fluid" alt="{{ $order->product_name }}">
                                </a>
                            </div>
                        </div>
                        <div class="order-item">
                            <label for="note">Order Note:</label>
                            <textarea style=": auto;" id="note" name="note" rows="10" readonly>{{ $order->note }}</textarea>
                        </div>
                        <div class="order-item-1">



                                <div class="product-details">

                                    <p class="product-name">Product Name: {{$order->product_name}}</p>
                                    @if ($order->order_status == 'Order Placed')
                                        <p class="product-name">Order Status: Pending</p>
                                    @else
                                        <p class="product-name">Order Status: {{$order->order_status}}</p>
                                    @endif
                                    <p class="product-name">Order ID: {{$order->order_id}}</p>
                                    <label for="quantity">Quantity: {{ $order->quantity }}</label>

                                </div>

                                <div class="product-name">
                                    <label for="order-total">Order Price:</label>
                                    <input type="number" id="order-total" name="price" placeholder="Please put how much is this." required>
                                </div>
                                <div class="product-name">
                                    <label for="order-total">Primary Color:</label>
                                    <input type="text" id="order-total" name="primaryclr" value="{{ $order->primaryclr }}"  placeholder="Ex:  #7D5452" required>
                                </div>
                                <div class="product-name">
                                    <label for="order-total">Secondary Color:</label>
                                    <input type="text" id="order-total" name="secondaryclr" value="{{$order->secondryclr}}"  placeholder="Ex:  #7D5452" required>
                                </div>
                                <div class="product-name">
                                    <label for="process">Processing Time:</label>
                                    <input type="number" id="process" name="processing_time" placeholder="Please put how many weeks." required>
                                </div>
                            <div class="column-4">
                                <button type="submit" class="button-item" onclick="return confirm('Are you sure this order can be made?')">Confirm</button>

                                <a href="{{url('cancel_order',$order->id)}}" onclick="return confirm('Are you sure you want to cancel this order?')" class="button-item">Cancel Order</a>
                                <a href="{{url('pending')}}"  class="button-item">Back</a>


                            </div>
                            <div>

                            </div>
                            <div>

                            </div>
                        </div>


                    </div>
                    <div >

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
