    <!DOCTYPE html>
    <html lang="en">
    <head>
        <link rel="stylesheet" href="assets/css/navbar.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="assets/css/Cart.css">

        <title>Yearn Art | My Cart</title>
        <link rel="icon" href="assets/image/Yearn.jpg" type="image/png">
        @include('YearnArt.css')
    </head>
    <body>
        @include('home.header')

        <form action="{{ url('/cash_order')}}" method="post">
            @csrf
            <div class="center">
                <div class="header">
                    <h6 class="mycart">My Cart</h6>
                    <div id="processingTime" class="processing-time">Processing Time: 0 Weeks</div>
                </div>

                @if(session()->has('message'))
                    <div class='alert alert-success'>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{session()->get('message')}}
                    </div>
                @endif
                <div class="container-cart">
                    <div class="action-bar">
                        <div class="checkbox">
                            <label for="selectAllCheckbox">
                                <input type="checkbox" id="selectAllCheckbox" onclick="toggleAllCheckboxes()">
                            </label>
                        </div>

                        <div class="prod">Product</div>
                        <div class="downpayment">Processing Time</div>
                        <div class="unit-price">Unit Price</div>
                        <div class="quantity">Quantity</div>
                        <div class="total-price">Total Price</div>
                        <div class="actions">Actions</div>
                    </div>
                    @foreach ($cart as $index => $cart)
                        <?php
                            $totalprice = 0;
                            $totalitem = 0;
                            $totalprice += ($cart->price * $cart->quantity);
                            $downpayment = $totalprice / 2;
                            $process_time = ($cart->processing_time * $cart->quantity);

                            $uniqueId = 'item_' . $index;
                            $quantityInputId = 'quantityInput_' . $uniqueId;
                            $unitPriceId = 'unitPrice_' . $uniqueId;
                            $totalPriceId = 'totalPrice_' . $uniqueId;
                            $process_timeId = 'process_time_' . $uniqueId;
                        ?>
                        <div class="product-bar">
                            <div class="checkbox">
                                <input type="checkbox" name="selectedItems[{{ $cart->id }}]" class="productCheckbox" id="productCheckbox{{$cart->id}}">
                            </div>
                            <div class="product-detail">
                                <div class="img-edit">
                                    <img src="product/{{$cart->image}}" alt="">
                                </div>
                                <div class="products">
                                    <p class="name-product">{{$cart->product_name}}</p>
                                    <p>{{$cart->size}}</p>
                                </div>
                            </div>
                            <div id="{{ $process_timeId  }}" class="downpayment">{{ ($process_time) }} week</div>
                            <div id="{{ $unitPriceId }}" class="unit-price">₱{{ number_format($cart->price, 2) }}</div>
                            <div class="quantity">
                                <input type="number" id="{{ $quantityInputId }}" name="quantity[{{ $cart->id }}]" value="{{ $cart->quantity }}" min="1" required="" style="border:1.5px solid #b0968f;border-radius: 5px; width: 100px; height: 30px; background: transparent; margin-left: 10px;">
                            </div>
                            <div name="price" id="{{ $totalPriceId }}" class="total-price">₱ {{ number_format($totalprice, 2) }}</div>
                            <div class="actions remove-btn">
                                <a href="{{url('/remove_cart', $cart->id)}}" onclick="return confirm('Are you sure to delete it in your CART?')">
                                    <img src="assets\image\trash.png" alt="" class="trash">
                                </a>
                            </div>
                        </div>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                var quantityInput = document.getElementById('{{ $quantityInputId }}');
                                var unitPriceElement = document.getElementById('{{ $unitPriceId }}');
                                var totalPriceElement = document.getElementById('{{ $totalPriceId }}');
                                var processTimeElement = document.getElementById('{{ $process_timeId  }}');

                                quantityInput.addEventListener('input', function() {
                                    var quantityValue = parseInt(this.value) || 0;
                                    var unitPrice = parseFloat(unitPriceElement.textContent.replace('₱', '')) || 0;
                                    var totalPrice = unitPrice * quantityValue;
                                    var processingTimePerItem = {{ $cart->processing_time }}; // Replace this with the actual processing time per item
                                    var processTime = quantityValue * processingTimePerItem; // Calculate processing time

                                    totalPriceElement.textContent = '₱' + totalPrice.toFixed(2);
                                    processTimeElement.textContent = processTime + ' week';  // Updated to display processing time
                                });
                            });
                        </script>
                    @endforeach
                </div>
            </div>
            <footer>
                <div class="container-footer">
                    <div class="checkbox">
                        <label for="footerSelectAllCheckbox">
                            <input type="checkbox" id="footerSelectAllCheckbox" onclick="toggleFooterCheckboxes()">
                        </label>
                    </div>

                    <div class="select-all">Select All</div>
                    <div class="delete-function">
                        <button id="deleteBtn"></button>
                    </div>
                    <div class="total-item">
                        Total items: <span id="totalItems">0</span>
                    </div>
                    <div class="total-prices">
                        <span id="totalPrices">₱0</span>
                    </div>
                    <div class="btn-submit">
                        <button type="submit"  onclick="return confirm('Please be advised that the estimated delivery time for your order is anticipated to be between 2 to 3 weeks, although it may vary depending on the number of products you have ordered. Our team is working diligently to fulfill each order in a timely manner, ensuring that each item is carefully packaged and delivered to you in pristine condition.')">Check Out</button>
                    </div>
                </div>
            </footer>
        </form>
        <script src="assets/javascript/home.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
        <script src="assets/javascript/script.js"></script>

        <script>
            function updateTotals() {
                const productCheckboxes = document.querySelectorAll('.productCheckbox');
                const totalItemsElement = document.getElementById('totalItems');
                const totalPricesElement = document.getElementById('totalPrices');
                const processingTimeElement = document.getElementById('processingTime');

                let totalItems = 0;
                let totalPrice = 0;
                let totalProcessingTime = 0;

                productCheckboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        const parentElement = checkbox.closest('.product-bar');
                        const quantityInput = parentElement.querySelector('.quantity input');
                        const totalPriceElement = parentElement.querySelector('.total-price');
                        const processTimeElement = parentElement.querySelector('.downpayment');

                        const quantity = parseInt(quantityInput.value) || 0;
                        const unitPrice = parseFloat(totalPriceElement.textContent.replace('₱', '')) || 0;
                        const processingTime = parseFloat(processTimeElement.textContent) || 0;

                        totalItems += quantity;
                        totalPrice += unitPrice * quantity;
                        totalProcessingTime += processingTime;
                    }
                });

                totalItemsElement.textContent = totalItems;
                totalPricesElement.textContent = '₱' + totalPrice.toFixed(2);
                processingTimeElement.textContent = 'Processing Time: ' + totalProcessingTime + ' Weeks';
            }

            document.addEventListener("DOMContentLoaded", function() {
                const productCheckboxes = document.querySelectorAll('.productCheckbox');

                productCheckboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', updateTotals);
                });
            });
        </script>


         <script>
            function toggleAllCheckboxes() {
                const checkboxes = document.querySelectorAll('.productCheckbox');
                const selectAllCheckbox = document.getElementById('selectAllCheckbox');

                checkboxes.forEach(checkbox => {
                    checkbox.checked = selectAllCheckbox.checked;
                });

                updateTotals(); // Call the function to update totals after toggling checkboxes
            }
        </script>
        <script>
            function toggleFooterCheckboxes() {
                const checkboxes = document.querySelectorAll('.productCheckbox');
                const footerSelectAllCheckbox = document.getElementById('footerSelectAllCheckbox');

                checkboxes.forEach(checkbox => {
                    checkbox.checked = footerSelectAllCheckbox.checked;
                });

                updateTotals(); // Call the function to update totals after toggling checkboxes
            }
        </script>

    </body>
    </html>
