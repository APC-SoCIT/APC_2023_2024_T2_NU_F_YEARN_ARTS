<!DOCTYPE html>
<html lang="en">
    <title>Yearn Art | {{$products->product_name}}</title>
<head>
    <base href="/public">
    <!-- Add these in your HTML -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    @include('YearnArt.css')

    <style>
        /* Add this to your CSS or style tag */
        .color-option {
            display: none; /* Hide default radio button */
        }

        /* Add hover effect if desired */
        .color-option-label:hover {
            transform: scale(1.3);
        }

        .color-option-label.selected {
            transform: scale(1.3);
        }

        .selected {
            transform: scale(1.13);
        }

        .disabled {
            pointer-events: none; /* Disable pointer events for the label */
            opacity: 0.5; /* Add a visual cue that the option is disabled */
        }
    </style>
</head>

<body>
    @include('home.header')
    <div class="main-panel">
        <div class="content-wrapper">

            @if(session()->has('message'))

            <div class='alert alert-success'>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
            </div>

            @endif

            <form action="{{url('add_cart', $products->id)}}" method="Post">

                <div class="product-details">
                    <div class="product-img">
                        <img src="product/{{$products->image}}" alt="">
                    </div>
                    <div class="detail-box detail-box1">
                        <h1 class="product-name">
                            {{$products->product_name}}
                        </h1>
                        <p class="names">
                            Description: {{$products->product_description}}
                        </p>
                        <p class="price" id="price">
                            ₱{{ number_format($products->small_price, 2) }}
                        </p>
                        <p class="names">
                            Processing Time: {{$products->processing_time}}
                        </p>
                        <p class="names">
                            Color:
                        </p>

                        @csrf
                        <div class="color-choices">
                            <div class="primary-div">
                                <p class="names">Primary:
                                    <div class="color-box color-primary1">
                                        <input type="radio" name="colorOption" id="colorOption1" value="#67598E"
                                            class="color-option" style="display: none;">
                                        <label for="colorOption1" class="color-option-label color-primary"
                                            style="background-color: #67598E"></label>

                                        <input type="radio" name="colorOption" id="colorOption2" value="#D66B78"
                                            class="color-option" style="display: none;">
                                        <label for="colorOption2" class="color-option-label color-primary"
                                            style="background-color: #D66B78"></label>

                                        <input type="radio" name="colorOption" id="colorOption3" value="#D4D66B"
                                            class="color-option" style="display: none;">
                                        <label for="colorOption3" class="color-option-label color-primary"
                                            style="background-color: #D4D66B;"></label>

                                        <input type="radio" name="colorOption" id="colorOption4" value="#6BD689"
                                            class="color-option" style="display: none;">
                                        <label for="colorOption4" class="color-option-label color-primary"
                                            style="background-color: #6BD689;"></label>

                                        <input type="radio" name="colorOption" id="colorOption5" value="#D6986B"
                                            class="color-option" style="display: none;">
                                        <label for="colorOption5" class="color-option-label color-primary"
                                            style="background-color: #D6986B;"></label>

                                        <input type="radio" name="colorOption" id="colorOption6" value="#D46BD6"
                                            class="color-option" style="display: none;">
                                        <label for="colorOption6" class="color-option-label color-primary"
                                            style="background-color: #D46BD6;"></label>
                                    </div>
                                </p>
                            </div>

                            <div class="secondary-div">
                                <p class="names">Secondary:
                                    <div class="color-box color-secondary1">
                                        <input type="radio" name="secondaryColor" id="secondaryColorOption1"
                                            value="#A3D0EF" class="color-option" style="display: none;">
                                        <label for="secondaryColorOption1"
                                            class="color-option-label color-secondary"
                                            style="background-color: #A3D0EF"></label>

                                        <input type="radio" name="secondaryColor" id="secondaryColorOption2"
                                            value="#D66B78" class="color-option" style="display: none;">
                                        <label for="secondaryColorOption2"
                                            class="color-option-label color-secondary"
                                            style="background-color: #D66B78"></label>

                                        <input type="radio" name="secondaryColor" id="secondaryColorOption3"
                                            value="#D4D66B" class="color-option" style="display: none;">
                                        <label for="secondaryColorOption3"
                                            class="color-option-label color-secondary"
                                            style="background-color: #D4D66B"></label>

                                        <input type="radio" name="secondaryColor" id="secondaryColorOption4"
                                            value="#6BD689" class="color-option" style="display: none;">
                                        <label for="secondaryColorOption4"
                                            class="color-option-label color-secondary"
                                            style="background-color: #6BD689"></label>

                                        <input type="radio" name="secondaryColor" id="secondaryColorOption5"
                                            value="#D6986B" class="color-option" style="display: none;">
                                        <label for="secondaryColorOption5"
                                            class="color-option-label color-secondary"
                                            style="background-color: #D6986B"></label>

                                        <input type="radio" name="secondaryColor" id="secondaryColorOption6"
                                            value="#D46BD6" class="color-option" style="display: none;">
                                        <label for="secondaryColorOption6"
                                            class="color-option-label color-secondary"
                                            style="background-color: #D46BD6"></label>

                                        <input type="radio" name="secondaryColor" id="secondaryColorOption7"
                                            value="rgba(255, 255, 255, 0.00);" class="color-option" style="display: none;">
                                        <label for="secondaryColorOption7"
                                            class="color-option-label color-none"></label>
                                    </div>
                                </p>
                            </div>
                        </div>

                        <div class="size-div">
                            <p class="names">Size:
                                <div class="size-box size">
                                    <select name="sizeOption" id="sizeOption" class="size-option" required="" onchange="updatePrice(this.value)">
                                        @if ($products->extra_small_price !== null)
                                        <option value="extra_small">Extra Small</option>
                                        @endif
                                        <option value="small" selected>Small</option>
                                        <option value="medium">Medium</option>
                                        <option value="large">Large</option>
                                        <!-- Add more size options as needed -->
                                        @if ($products->i_extra_large_price !== null)
                                        <option value="i_extra_large">Extra Large</option>
                                        @endif
                                        @if ($products->ii_extra_large_price !== null)
                                        <option value="ii_extra_large">2 Extra Large</option>
                                        @endif
                                        @if ($products->iii_extra_large_price !== null)
                                        <option value="iii_extra_large">3 Extra Large</option>
                                        @endif
                                        @if ($products->iiii_extra_large_price !== null)
                                        <option value="iiii_extra_large">4 Extra Large</option>
                                        @endif
                                        @if ($products->iiiii_extra_large_price !== null)
                                        <option value="iiiii_extra_large">5 Extra Large</option>
                                        @endif



                                    </select>
                                </div>
                            </p>
                        </div>

                        <p class="names">Quantity:
                            <input type="number" name="quantity" value="1" min="1" required=""
                                style="border:1.5px solid #b0968f;border-radius: 5px; width: 100px; height: 30px; background: transparent; margin-left: 10px;">
                        </p>

                        <button type="submit" class="button-cart">Add to Cart</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="assets/javascript/home.js"></script>
    @include ('YearnArt.chatbot')
    @include ('YearnArt.script')

    <script>
         document.addEventListener('DOMContentLoaded', function () {
        // Set the first color and size options as default
        const defaultColorOption = document.getElementById('colorOption1');
        const defaultSizeOption = document.getElementById('sizeOptionSmall');
        const defaultSecondaryColorOption = document.getElementById('secondaryColorOption1');
        defaultColorOption.checked = true;

        defaultSecondaryColorOption.checked = true;

        // Trigger change event to update selected style
        const colorChangeEvent = new Event('change');
        const sizeChangeEvent = new Event('change');
        const secondaryColorChangeEvent = new Event('change');
        defaultColorOption.dispatchEvent(colorChangeEvent);
        defaultSizeOption.dispatchEvent(sizeChangeEvent);
        defaultSecondaryColorOption.dispatchEvent(secondaryColorChangeEvent);

        // Trigger updatePrice function for the initial size
        updatePrice(defaultSizeOption.value);
    });

        // Add event listeners to update selected style for color options
        const colorOptions = document.querySelectorAll('.color-option');
        colorOptions.forEach(option => {
            option.addEventListener('change', updateSelectedStyle);
        });

        // Add event listeners to update selected style for size options
        const sizeOptions = document.querySelectorAll('.size-option');
        sizeOptions.forEach(option => {
            option.addEventListener('change', updateSelectedStyle);
        });

        // Add event listeners to update selected style for secondary color options
        const secondaryColorOptions = document.querySelectorAll('.secondary-color-option');
        secondaryColorOptions.forEach(option => {
            option.addEventListener('change', updateSelectedStyle);
        });

        function updateSelectedStyle(event) {
            const selectedLabel = document.querySelector(`[for="${event.target.id}"]`);
            if (event.target.checked) {
                // Remove 'selected' class from all labels of the same type
                const optionsOfType = document.querySelectorAll(`[name="${event.target.name}"]`);
                optionsOfType.forEach(option => option.nextElementSibling.classList.remove('selected'));

                selectedLabel.classList.add('selected');
            }
        }

    function updatePrice(size) {
    const priceElement = document.getElementById('price');
    switch (size) {
        case 'extra_small':
            priceElement.textContent = '₱{{ number_format($products->extra_small_price, 2) }}';
            break;
        case 'small':
            priceElement.textContent = '₱{{ number_format($products->small_price, 2) }}';
            break;
        case 'medium':
            priceElement.textContent = '₱{{ number_format($products->medium_price, 2) }}';
            break;
        case 'large':
            priceElement.textContent = '₱{{ number_format($products->large_price, 2) }}';
            break;
        case 'i_extra_large':
            priceElement.textContent = '₱{{ number_format($products->i_extra_large_price, 2) }}';
            break;
        case 'ii_extra_large':
            priceElement.textContent = '₱{{ number_format($products->ii_extra_large_price, 2) }}';
            break;
        case 'iii_extra_large':
            priceElement.textContent = '₱{{ number_format($products->iii_extra_large_price, 2) }}';
            break;
        case 'iiii_extra_large':
            priceElement.textContent = '₱{{ number_format($products->iiii_extra_large_price, 2) }}';
            break;
        case 'iiiii_extra_large':
            priceElement.textContent = '₱{{ number_format($products->iiiii_extra_large_price, 2) }}';
            break;
        default:
            // Handle other cases if needed
            break;
    }
}
    </script>
</body>

</html>
