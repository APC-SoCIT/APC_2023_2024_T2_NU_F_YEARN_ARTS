<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <link rel="stylesheet" href="admin/assets/css/admin_home.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #E4D8CC;
        }


    </style>
    <title>Yearn Art | Home</title>
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
            <h2>Quantity Sold</h2>
            <div style="display: flex; justify-content: space-between;">
                <canvas id="verticalChart"></canvas>



            </div>
            <h2>Best Selling Category</h2>
            <div style="display: flex; justify-content: space-between;">
                <canvas id="horizontalChart"></canvas>

            </div>


            <h2>Sales Order Transaction Confirmation</h2>
            <table class="main-table">
                <tr>
                    <th class="th-deg">Name</th>
                    <th class="th-deg">Product Name</th>
                    <th class="th-deg">Price</th>
                    <th class="th-deg">Quantity</th>
                    <th class="th-deg">Order ID</th>
                    <th class="th-deg">Action</th>
                </tr>
                @foreach ($order as $order)

                @if($order->order_status=='Order Received')
                <tr>
                    <td class="th-deg">{{$order->name}}</td>
                    <td class="th-deg">{{$order->product_name}}</td>
                    <td class="th-deg">₱{{ number_format($order->price * $order->quantity, 2) }}</td>
                    <td class="th-deg">{{$order->quantity}}</td>
                    <td class="th-deg">{{$order->order_id}}</td>

                    <td class="th-deg">
                        @if($order->order_status=='On Process')
                        <p>Done</p>
                        @else
                        <a href="{{url('to_order_completed', $order->id)}}" class="btn-confirm" onclick="return confirm('Are you sure this order is already paid??')">Done</a>

                        @endif
                    </td>
                </tr>
                @endif
                @endforeach
            </table>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    // Vertical Bar Chart
                    fetch('/get-data')
                        .then(response => response.json())
                        .then(data => {
                            var ctx = document.getElementById('verticalChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels:  ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug','Sept' ,'Oct', 'Nov' ,'Dec'],
                                    datasets: [{
                                        label: 'Quantity Sold',
                                        data: data.data,
                                        backgroundColor: '#7D5452',
                                        borderColor: 'rgba(75, 192, 192, 1)',
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        });

                    // Horizontal Bar Chart
                    fetch('/get-data')  // Adjust the route for horizontal data
                        .then(response => response.json())
                        .then(data => {
                            var ctx = document.getElementById('horizontalChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'horizontalBar',
                                data: {
                                    labels: ['Category A', 'Category B', 'Category C', 'Category D', 'Category E'],
                                    datasets: [{
                                        label: 'Best Selling Category',
                                        data: data.data,
                                        backgroundColor: '#7D5452',
                                        borderColor: 'rgba(75, 192, 192, 1)',
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        x: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        });
                });
            </script>
        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')

    <!-- End custom js for this page -->
</body>
</html>
