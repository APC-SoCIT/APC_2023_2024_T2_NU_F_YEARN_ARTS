<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Order</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets\css\form.css">
 
</head>
<body>

    <div class="main-container">
      <div class="form-container">
        <p class="title">Customization Form</p>
        <form class="form" action="{{ url('/customized_order') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="type-product">
                <label class="input_label" for="product_name">Product Name</label>
                <input name="product_name" type="text" class="input"  id="product_name" required>
            </div>

            <div class="type-product">
                <label class="input_label" for="note">Details</label>
                <input name="note" type="text" class="input" id="note" required>
            </div>

            

            <div class="type-product">
                <label class="input_label" for="note">Quantity</label>
                <input type="number" name="quantity" value="1" min="1" required class="input">
            </div>

            <div class="type-product">
                <label class="input_label" for="note">Size</label>
                <input type="text" name="size" class="input" id="size" required>
            </div>

            <div class="type-product">
              <div class="color-picker">
                <label class="input_label" for="note">Primary Color</label>
                <input class="color-input" type="color" name="color" id="color" value="#000000" oninput="hexColor.value = color.value" required>
                <input class="color-display" type="text" name="primaryclr" id="hexColor" oninput="color.value = hexColor.value" readonly required>
              </div>
              <div class="color-picker">
                <label class="input_label" for="note">Secondary Color</label>
                <input class="color-input" type="color" name="color2" id="color2" value="#000000" oninput="hexColor2.value = color2.value" required>
                <input class="color-display" type="text" name="secondaryclr" id="hexColor2" oninput="color2.value = hexColor2.value" readonly required>
              </div>
            </div>

            
                <!-- <p class="names">Quantity:
                    <input type="number" name="quantity" value="1" min="1" required
                        placeholder="Enter quantity" style="border:1.5px solid #b0968f;border-radius: 5px; width: 100px; height: 30px; background: transparent; margin-left: 10px;">
                </p> -->

                <!-- <p>
                    <label class="names" name="size" for="size">Size</label>
                    <input type="text" name="size" class="input" placeholder="Enter size" id="size" required>
                </p> -->

                <!-- <p>
                    <label class="names" for="color">Primary Color</label>
                    
                    
                </p>

                <p>
                    <label class="names" for="color">Secondary Color</label>
                    <input class="input" type="color" name="color2" id="color2" value="#000000" oninput="hexColor2.value = color2.value" required>
                    
                </p> -->
            
                <input type="file" name="image" id="fileInput" accept="image/*" required style="display: none;">
            <label class="custum-file-upload" for="fileInput" style="cursor: pointer;">
                <div class="plus-icon">Add photo</div>
            </label>

            <div class="imagePreview">
                <div id="imagePreview" class="image-preview"></div>
                <button id="removeButton" class="rm-btn">Delete</button>
            </div>
            

            <div class="btn-submit">
                <button title="Sign In" type="submit" class="sign-in_btn">
                    <span>Submit</span>
                </button>
            </div>
        </form>
      </div>
    </div>
<script>
const fileInput = document.getElementById('fileInput');
                const imagePreview = document.getElementById('imagePreview');
                const removeButton = document.getElementById('removeButton');
                const removeDiv = document.querySelector('.remove-btn');

                // Hide the remove button initially
                removeButton.style.display = 'none';

                const imageData = localStorage.getItem('imageData');
                if (imageData) {
                    imagePreview.innerHTML = imageData; // Display the image data
                    removeButton.style.display = 'block'; // Show the remove button
                }

                fileInput.addEventListener('change', function() {
                    const file = this.files[0]; // Get the selected file
                    if (file) {
                        const reader = new FileReader(); // Initialize FileReader object
                        reader.onload = function(event) {
                            const imageUrl = event.target.result; // Get the data URL
                            imagePreview.innerHTML = `<img src="${imageUrl}" alt="Chosen Photo" style="max-width: 100%;">`; // Display the image
                            removeButton.style.display = 'block'; // Show the remove button

                            localStorage.setItem('imageData', imagePreview.innerHTML);
                        };
                        reader.readAsDataURL(file); // Read the file as a data URL
                    } else {
                        imagePreview.innerHTML = ''; // Clear the image preview if no file is selected
                        removeButton.style.display = 'none'; // Hide the remove button
                        localStorage.removeItem('imageData');
                    }
                });

                // Add event listener to the remove button
                removeButton.addEventListener('click', function() {
                    imagePreview.innerHTML = ''; // Clear the image preview
                    productPhoto.style.backgroundImage = '';
                    fileInput.value = ''; // Clear the file input value
                    this.style.display = 'none'; // Hide the remove button

                    localStorage.removeItem('imageData');
                });

                window.addEventListener('beforeunload', function () {
                    // Clear the stored image data in local storage
                    localStorage.removeItem('imageData');
                });
</script>
@include('YearnArt.chatbot')
</body>
</html>
