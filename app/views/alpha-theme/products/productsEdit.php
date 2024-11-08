     <!-- Include Quill.js CSS -->
     <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
        .editor-container {
            height: 200px; /* Adjust the height as needed */
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
  <div class="data-table">
  <div class="table-container">
  <h2> Edit  products </h2>
<?php foreach ($params["products"] as $key => $products) : ?>
  <form method="post" action="<?= ROOT ?>/admin/products/<?= $products['productIdentify'] ?>/modify" enctype="multipart/form-data">
  <div>
    <label for="productName">Product Name</label>
    <input type="text" name="productName" value="<?= $products["productName"] ?>">
  </div>

  
  <div>
          <label for="productShortDesc">Product Short Desc</label>
          <input type="text" name="productShortDesc" value="<?= $products["productShortDesc"] ?>">
        </div>

        <div>
        <label for="productDesc">Product Desc</label>
        <!-- Create a container for Quill.js -->
        <div id="editor" class="editor-container">
        <?= html_entity_decode($products['productDesc']) ?>
        </div>
        <!-- Hidden textarea for form submission -->
        <textarea name="productDesc" id="productDesc" style="display: none;">

        </textarea>
    </div>

  <div>
    <label for="productPrice">Product Price</label>
    <input type="text" name="productPrice" value="<?= $products["productPrice"] ?>">
  </div>
  <div>
    <label for="productImage">Product Image</label>
    <input type="file" name="productImage"> <?= $products["productImage"] ?>
  </div>
  <div>
    <label for="productTags">Product Tags</label>
    <input type="text" name="productTags" value="<?= $products["productTags"] ?>">
  </div>
  <div><aside class="row">
    <input type="submit" value="Update" class="save-btn">
 <a href="<?= ROOT ?>/admin/products" class="cancel-btn">back</a>
   </aside></div>
  </form>
<?php endforeach; ?>
  </div>
  </div>


  <!-- Include Quill.js library -->
 <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script>
        // Initialize Quill editor
        const quill = new Quill('#editor', {
            theme: 'snow', // Specify theme
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline'], // toggled buttons
                    ['link', 'image'], // link and image
                    [{ list: 'ordered'}, { list: 'bullet' }], // lists
                    [{ 'color': [] }, { 'background': [] }], // dropdown with defaults
                    ['clean'] // remove formatting button
                ]
            }
        });

        // Function to update the hidden textarea with Quill content on form submission
        function updateTextarea() {
            const productDesc = document.querySelector('#productDesc');
            productDesc.value = quill.root.innerHTML; // Get the editor's HTML content
        }

        // Optional: Add an event listener to update textarea before form submission
        document.querySelector('form').addEventListener('submit', updateTextarea);
    </script>