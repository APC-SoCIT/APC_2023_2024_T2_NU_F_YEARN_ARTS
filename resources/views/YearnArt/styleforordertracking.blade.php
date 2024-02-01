<style>


    /* assets/css/style.css */

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;

    }

    .cart-link {
        text-decoration: none;
        color: #000; /* Set your desired text color */
    }

    /* order items */

    .custom-section {
        background-color: #E4D8CC;
        /* Add any other styles for your custom section */
        display: flex;
        justify-content: center; /* Center the content horizontally */
        align-items: center; /* Center the content vertically */
    }

    .order-container {
        display: flex;
        flex-direction: column; /* Display items in a column */
        flex-wrap: wrap;
        gap: 20px;
        justify-content: space-around; /* Adjust as needed */
        width: 100%; /* Make the container take full width */
        max-width: 1200px; /* Adjust max-width as needed */
    }

    .order-item {
        background-color: #D0A59F; /* Set background color for each order item */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
    }

    img {
        max-width: 100%;
        height: auto;
        flex: 0 0 30%; /* Adjust to your desired image width */
        margin-right: 20px; /* Add some space between image and details */
    }

    .order-details {
        flex: 1; /* Take remaining space */
    }

    .product-name {
        font-weight: bold;
        margin-bottom: 10px;
    }

    .order-info {
        margin-bottom: 5px;
    }

    .track-order {
        /* Add any styles for your track order section */
    }

    /* STATUS */

    .status-links {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .status-link {
        text-decoration: none;
        color: #000;
        margin: 0 10px;
        font-weight: bold;
        position: relative; /* Add relative positioning */
        padding: 10px; /* Add padding to the links */
    }

    .status-link::after {
        content: "";
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        height: 2px;
        background-color: #000; /* Color of the line */
        width: 80%; /* Adjust the width of the line as needed */
        margin: 0 auto; /* Center the line */
        display: block;
    }

    .status-link:hover {
        color: #D0A59F;
        background-color: #000; /* Change background color on hover */
        color: #FFF; /* Change text color on hover */
    }
    .status-links a.selected {
    font-weight: bold; /* Highlight selected link with bold font */
    color: #D0A59F; /* Set your desired highlight color */
}

    .cart-link {
    display: flex;
    align-items: center;
    text-decoration: none;
    color: #000; /* Set your desired text color */
}

    .cart-icon {
    margin-left: 5px; /* Adjust the margin as needed */
    width: 20px; /* Set your desired width */
    height: 20px; /* Set your desired height */
}
    </style>
