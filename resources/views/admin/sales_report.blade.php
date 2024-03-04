<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets\css\sales_report.css">
    <title>Trend Report</title>
</head>
<body>

    <?php

    $totalSubtotalpriceAmount = 0;
    $totalSubtotalpriceVat = 0;
    $currentMonth = date("F");
    $categoryData = [];

    ?>
    <header>
        <h2>Yearn Art</h2>
        <h5>48 Lot 8, Marang St, Amparo Subd., Brgy 179, Caloocan City, MM</h5>
    </header>

    <table>
        <caption>Quantity Sold for the Month of {{ $currentMonth }}</caption>
        <tr>
            <th>Order ID</th>
            <th>Product Name</th>
            <th>PRICE</th>
            <th>QTY</th>
            <th>AMOUNT</th>
            <th>TAX RATE</th>
            <th>TAX</th>
            <th>TOTAL</th>
        </tr>
        @foreach($orders as $order)
        @if($order->order_status === 'Order Completed')
        @php
        $vatPercentage = 12;
        $unitprice = ($order->price);
        $unitpriceVatAmount =($order->price  * $vatPercentage) / 100;
        $unitPriceVat = ($unitprice - $unitpriceVatAmount);

        $subtotalpriceVat = ($unitpriceVatAmount * $order->quantity);
        $totalUnitAmount = ($unitprice *  $order->quantity);
        $subtotalpriceAmount = ($totalUnitAmount - $subtotalpriceVat);


        $totalSubtotalpriceAmount += $subtotalpriceAmount;
        $totalSubtotalpriceVat += $subtotalpriceVat;

        $dateString = ($order->completed_at);
        $formattedDate = date("F jS, Y", strtotime($dateString));
        $dateNow = date("F jS, Y H:i:s");
        $completedAt =date("F jS, Y");


        @endphp


            <tr>
                <td>{{ $order->order_id }}</td>
                <td>{{ $order->product_name }}</td>
                <td>₱{{ number_format($unitprice, 2)}}</td>
                <td>{{ $order->quantity }}</td>
                <td>₱{{ number_format ($subtotalpriceAmount, 2)  }}</td>
                <td>{{ $vatPercentage }}%</td>
                <td>₱{{  $subtotalpriceVat }}</td>
                <td>₱{{ number_format ($totalUnitAmount,2) }}</td>
            </tr>
        @endif
    @endforeach
    </table>
    <div class="additional-info">
        <p><span class="label">SALES AMOUNT:</span><span class="value">₱{{ number_format($totalSubtotalpriceAmount, 2) }}</span></p>
        <p ><span class="label">SALES TAX:</span><span class="value">₱{{ number_format($totalSubtotalpriceVat, 2) }}</span></p>
        <p><span class="label">SALES TOTAL:</span><span class="value">₱{{ number_format($totalSubtotalpriceAmount + $totalSubtotalpriceVat, 2) }}</span></p>
    </div>
    <table>
        <caption>Best Selling Category for the Month of {{ $currentMonth }}</caption>
        <tr>
            <th>Category Name</th>
            <th>Total Order per Category</th>

        </tr>
        @foreach($categoryCounts as $category)
            <tr>
                <td>{{ $category->category }}</td>
                <td>{{ $category->total }}</td>
            </tr>
        @endforeach
    </table>

        <div class="printed-by">
            <p>Printed By:</p>
            <div class="signature-line"></div>
            <p>{{ $user->name }}</p> <!-- Display the name of the logged-in user -->
           
        </div>
        <footer>
            <p>Issued at: {{  $dateNow }}</p>
        </footer>



</body>
</html>
