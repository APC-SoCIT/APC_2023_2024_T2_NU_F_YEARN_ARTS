        <!DOCTYPE html>
        <html lang="en">
        <head>
        @include('admin.css')
        <link rel="stylesheet" href="admin/assets/css/admin_cutomerlist.css">
        <title>Yearn Art | Show Product</title>
        </head>
        <style type="text/css">




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
                    <div class="main-content content-wrapper">
                        @if(session()->has('message'))

                        <div class='alert alert-success'>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{session()->get('message')}}
                        </div>

                        @endif
                        <h2 class="Head-title">Customer Lists</h2>
                        <div class="main-table">
                            <table>
                                <tr>
                                    <th class="th_deg"></th>
                                    <th class="th_deg">Name</th>
                                    <th class="th_deg">Email</th>
                                    <th class="th_deg">Phone Number</th>
                                    <th class="th_deg">No. Of Purchases</th>

                                </tr>

                                @php
                                $index = 0; 
                                @endphp
                                @foreach($order->groupBy('user_id') as $customerId => $customerOrders)
                                @php
                                    $index++;
                                @endphp

                                @php
                                    $recentOrders = $customerOrders->filter(function ($order) {
                                        // Assuming 'created_at' is the order date field
                                        return $order->order_status === 'Order Completed' &&
                                        now()->diffInDays($order->created_at) <= 30;
                                    });
                                @endphp

                                @if ($recentOrders->isNotEmpty())
                                    <tr>
                                        <!-- need to add size -->
                                        <td class="th_deg">{{ $index }}</td>
                                        <td class="th_deg">{{ $recentOrders->first()->name }}</td>
                                        <td class="th_deg">{{ $recentOrders->first()->email }}</td>
                                        <td class="th_deg">{{ $recentOrders->first()->phone }}</td>
                                        <td class="th_deg">{{ $recentOrders->count() }}</td>
                                    </tr>
                                @endif
                            @endforeach
                           
                            </table>
                        </div>

                    </div>
                </div>
            <!-- container-scroller -->
            <!-- plugins:js -->
        @include('admin.script')
            <!-- End custom js for this page -->
        </body>
        </html>
