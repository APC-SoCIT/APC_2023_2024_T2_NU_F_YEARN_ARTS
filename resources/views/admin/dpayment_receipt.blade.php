<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="assets/css/receipt.css">
    <title>Sales Invoice</title>
</head>
<body>


      <div class="logo-container">
        <img src="logo\YearnArt.png">
      </div>
      
      <table class="invoice-info-container">
        <tr>
          <td rowspan="2" class="client-name">
            Customer Name <!--Get Data-->
          </td>
          <td>
            Yearn Art
          </td>
        </tr>
        <tr>
          <td>
            48 Lot 8, Marang St, Amparo Subd.
          </td>
        </tr>
        <tr>
          <td>
            Invoice Date: <strong>May 24th, 2024</strong>
          </td>
          <td>
            Brgy 179, Caloocan City, MM
          </td>
        </tr>
        <tr>
          <td>
            Order ID: <strong>12345</strong>
          </td>
          <td>
            yearnart21@gmail.com
          </td>
        </tr>
      </table>
      
      
      
      <table class="line-items-container">
        <thead>
          <tr>
            <th class="heading-quantity">Qty</th>
            <th class="heading-description">Description</th>
            <th class="heading-price">Down payment</th>
            <th class="heading-price">Down payment (Status)</th>
            <th class="heading-price">Full Payment</th>
            <th class="heading-price">Full Payment (Status)</th>
            <th class="heading-price">Vat (12%)</th>
            <th class="heading-price">Price</th>
            <th class="heading-subtotal">Subtotal </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>2</td>
            <td>Tote Bag</td>
            <td class="right">123</td>
            <td class="right">PAID</td>
            <td class="right">123</td>
            <td class="right">PAID</td>
            <td class="right">123</td>
            <td class="right">$15.00</td>
            <td class="bold">$30.00</td>
          </tr>
        </tbody>
      </table>
      
      

      <table class="line-items-container has-bottom-border">
        <thead>
          <tr>
            <th>Payment Info</th>
            <th>Date</th>
            <th>Total Due</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="payment-info">
              <div>
                Customer ID: <strong>123567744</strong>
              </div>
              </td>
            <td class="large">May 30th, 2024</td>
            <td class="large total">$30.00</td>
          </tr>
        </tbody>
      </table>
</body>
</html>
