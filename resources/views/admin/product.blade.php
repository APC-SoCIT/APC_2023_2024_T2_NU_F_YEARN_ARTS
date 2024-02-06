<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')

   <link rel="stylesheet" href="admin/assets/css/admin_products.css">
   <title>Yearn Art | Products</title>


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
                @if(session()->has('message'))

                    <div class='alert alert-success'>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{session()->get('message')}}
                    </div>

                @endif

                <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                <div class="div-main">

                    <div class="child1">
                        <div class="product-photo" >
                                <input type="file" name="image" id="fileInput" required="" style="display: none;">
                                <label for="fileInput" class="file-label" style="cursor: pointer;">
                                <div class="plus-icon">+</div>
                                Add Photo
                                </label>
                        </div>
                        <div class="imagePreview">
                            <div id="imagePreview" class="image-preview"></div>

                                <button id="removeButton" class="rm-btn">×</button>

                        </div>



                    </div>

                    <div class="child2">
                            <div class="product-name">
                                <input type="text" name="product_name" placeholder="Product Name" id="" required="" autocomplete="off">
                            </div>

                        @csrf

                            <div class="product-type">
                                <select name="category" id="" required="" >
                                <option value="" selected="">Product Type</option>
                                @foreach($category as $category)
                                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                @endforeach

                            </select>
                            </div>

                            <div class="product-description">
                                <input type="text" name="product_description" placeholder="Product Description"id="" required="" autocomplete="off">
                            </div>

                            {{-- <div class="size-inputs">
                                <label for="size">Sizes:</label>
                                <?php
                                $sizeNames = ['Extra Small', 'Small', 'Medium', 'Large', 'Extra Large', '2 Extra Large', '3 Extra Large', '4 Extra Large', '5 Extra Large'];
                                for ($i = 0; $i < 9; $i++):
                                ?>
                                <button type="button" id="addSize" <?php if($i >= 9) echo 'disabled'; ?>>Add Size</button>
                                    <div class="size-input">
                                        <input type="text" name="sizes[]" placeholder="Size" value="<?php echo $sizeNames[$i]; ?>" required="" readonly>
                                        <input type="number" name="prices[]" placeholder="Price" required="" autocomplete="off">
                                        <button type="button" class="remove-size">Remove</button>
                                    </div>
                                <?php endfor; ?>
                            </div> --}}
                            <div class="size-inputs">
                                <label for="size">Sizes:</label>
                                <div class="size-input">
                                    <input type="text" name="sizes[]" placeholder="Size" required="" autocomplete="off">
                                    <input type="number" name="prices[]" placeholder="Price" required="" autocomplete="off">
                                    <button type="button" class="remove-size">Remove</button>
                                </div>
                                <button type="button" id="addSize">Add Size</button>
                            </div>

                            <div class="process-time">
                                <input class="text_color" type="text" name="processing_time" placeholder="Processing Time"id="" required="" autocomplete="off">
                            </div>
                    </div>
                </div>

                <div class="btn-submit">
                    <button type="submit">+</button>
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
    fileInput.value = ''; // Clear the file input value
    this.style.display = 'none'; // Hide the remove button

    localStorage.removeItem('imageData');
});
        document.addEventListener('DOMContentLoaded', function () {
                const addSizeButton = document.getElementById('addSize');
                const sizeInputsContainer = document.querySelector('.size-inputs');


                addSizeButton.addEventListener('click', function () {
                    const sizeInput = document.createElement('div');
                    sizeInput.classList.add('size-input');
                    sizeInput.innerHTML = `
                    <input type="text" name="sizes[]" placeholder="Size" value="<?php echo $sizeNames[0]; ?>" required="" readonly>
                    <input type="number" name="prices[]" placeholder="Price" required="" autocomplete="off">
                    <button type="button" class="remove-size">Remove</button>
                    `;
                    sizeInputsContainer.appendChild(sizeInput);

                    if (sizeInputsContainer.children.length >= 9) {
                        addSizeButton.disabled = true;
                    }
                });

                sizeInputsContainer.addEventListener('click', function (event) {
                    if (event.target.classList.contains('remove-size')) {
                        event.target.parentElement.remove();
                        addSizeButton.disabled = false;
                    }
                });
            });


</script>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
    <!-- End custom js for this page -->


  </body>
</html>
