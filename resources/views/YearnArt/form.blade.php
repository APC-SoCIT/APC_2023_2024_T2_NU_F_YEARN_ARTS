<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets\css\form.css">
</head>
<body>
    <div class="form-container">
      <p class="title">Customization Form</p>
      <form class="form">
        <div class="type-product">
          <label class="input_label" for="input_field">Product Name</label>
          <input type="text" class="input" placeholder="" id="input_field">
        </div>
        
        <div class="type-product">
          <label class="input_label" for="input_field">Details</label>
          <textarea rows="4" class="input" name="textarea"></textarea>
        </div>
      </form>

      
        <label class="custum-file-upload" id="productPhoto">
                <input type="file" name="image" id="fileInput" accept="image/*" required="" style="display: none;">
                <div for="fileInput" class="" style="cursor: pointer;">
                <div class="plus-icon">Add photo</div>
                </div>
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
</body>
</html>