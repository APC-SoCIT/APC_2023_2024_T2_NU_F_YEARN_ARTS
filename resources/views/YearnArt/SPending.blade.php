<!DOCTYPE html>
<html lang="en">
<head>
@include('YearnArt.css')
<link rel="stylesheet" href="assets/">
<link rel="stylesheet" href="assets/css/order_tracking.css">

<style>
        .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .cart-link {
        text-decoration: none;
        color: #000; /* Set your desired text color */
    }

    .orders{
        font-size: 36px;
        font-weight: bolder;
        color: #7D5452;
        margin: 20px 30px;
    }

    /* order items */

    .custom-section {
        background-color: #E4D8CC;
        /* Add any other styles for your custom section */
        display: flex;
        flex-direction: column;
        justify-content: center; /* Center the content horizontally */
        align-items: center; /* Center the content vertically */

    }

    .order-container {
        display: flex;
        flex-direction: column; /* Display items in a column */
        gap: 20px;
        margin-bottom: 50px;
    }

    .order-item {
        background-color: #D0A59F; /* Set background color for each order item */
        padding: 20px;
        display: flex;
        flex-direction: column;
        width: 80vw;
        max-width: 80vw;
    }

    .upper-part{
        width: 100%;
        display: flex;
        flex-direction: row;
    }

    .img-fluid img {
        height: 130px;
        width: 130px;
        object-fit: cover;
        margin-right: 20px; /* Add some space between image and details */
    }

    .order-details {
        flex: 1; /* Take remaining space */
    }

    .product-names {
        color: #7D5452;
        margin-bottom: 10px;
        font-size: 30px;
    }

    .order-info {
        margin-bottom: 5px;
        opacity: .7;
        color: #7D5452;
        opacity: .7;
    }

    .order-stats{
        text-transform: uppercase;
        color: #E4D8CC;
    }

    .lower-part{
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
    }

    .pos-price{
        display: flex;
        align-items: flex-end;
        justify-content: flex-end;
        gap: 10px;
        bottom: 20px;
        right: 20px;
    }

    .total {
        color: #E4D8CC;
        margin-bottom: 8px; /* Adjust margin as needed */
    }

    .price-num {
        font-size: 36px;
        color: #7D5452;
    }

    .buttons{
        display: flex;
        align-items: flex-end;
        justify-content: flex-end;
        margin-top: 20px;
    }

    .custom-button {
        background-color: transparent;
        border: 1.5px solid #7D5452;
        color: #7D5452;
        padding: 10px 30px;
        cursor: pointer;
        outline: none;
        transition: background-color 0.3s, opacity 0.3s;
        margin-left: 10px;
    }

    .custom-button:hover {
        background-color: #7D5452;
        color: #E4D8CC;
    }

    .custom-button:active {
        opacity: 0.5;
    }

    .track-order {
        /* Add any styles for your track order section */
    }

    .line {
        border-top: 1px solid #7D5452; /* Change color, width, and style as needed */
        margin: 40px 10px 40px 10px;
        opacity: .5;
    }

    /* STATUS */

    .status-links {
        display: flex;
        flex-direction: row;
        margin-bottom: 30px;
        width: 80vw;
        max-width: 80vw;
        border-bottom: 1px solid #7D5452;
        gap: 30px;
    }

    .status-link {
        text-decoration: none;
        color: #7D5452;


        position: relative; /* Add relative positioning */
        padding: 10px 20px; /* Add padding to the links */
    }

    .clickable-link:active {
        text-decoration: underline; /* Apply underline when the link is clicked */
    }

    .status-link:hover {
        color: #E4D8CC;
        background-color: #7D5452; /* Change background color on hover */
        opacity: .5;
    }
    .status-links a.selected {
    font-weight: bold; /* Highlight selected link with bold font */
    color: #D0A59F; /* Set your desired highlight color */
}

    .cart-link {
    display: flex;
    align-items: center;
    text-decoration: none;
    color: #7D5452; /* Set your desired text color */
}

    .cart-icon {
    margin: 0px 30px 0 5px; /* Adjust the margin as needed */
    width: 30px; /* Set your desired width */
}




.button-underlined {
    text-decoration: underline;
}

</style>
</head>

<title>Yearn Art | All Orders</title>
<body>
@include('home.header')

<section class="custom-section">
<img src="assets\image\Order-Placed-SOrder.png" alt="">
            <div class="order-container">
                <!-- Loop through your order data here -->

                    <div class="order-item">
                        <div class="upper-part">
                            <div class="img-fluid">
                                <img src="product/{{ $order->image }}" alt="{{ $order->product_name }}">
                            </div>

                            <div class="order-details">
                                <p class="product-names">{{ $order->product_name }}</p>
                                <p class="order-info">Variation: x{{ $order->quantity }}</p>
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

