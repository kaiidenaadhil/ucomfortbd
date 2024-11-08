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
    <div class="data-info">
      <h3>Add a products</h3> <a href="<?= ROOT ?>/admin/products" class="gradient-btn">Back</a>
    </div>
    <div class="table-container">
      <form method="post" enctype="multipart/form-data">
        <div>
          <label for="productName">Product Name</label>
          <input type="text" name="productName">
        </div>

        <div>
          <label for="productShortDesc">Product Short Desc</label>
          <input type="text" name="productShortDesc">
        </div>
        
        <div>
        <label for="productDesc">Product Desc</label>
        <!-- Create a container for Quill.js -->
        <div id="editor" class="editor-container"></div>
        <!-- Hidden textarea for form submission -->
        <textarea name="productDesc" id="productDesc" style="display: none;"></textarea>
    </div>
        <div>
          <label for="productPrice">Product Price</label>
          <input type="text" name="productPrice">
        </div>
        <div>
          <label for="productImage">Product Image</label>
          <input type="file" name="productImage">
        </div>
        <div>
          <label for="productTags">Product Tags</label>
          <input type="text" name="productTags">
        </div>

        <div>



        <label for="productTags">Select Category:</label>
        <select id="category" name="categoryId">
        <option value="">-- Select Category --</option>
<?php 

foreach ($params['categories'] as $category) {
            echo '<option value="' . $category['categoryId'] . '">' . $category['categoryName'] . '</option>';
        }?>
      </select>
        </div>

        <div>
          <label for="subcategory">Select Subcategory:</label>
    <select id="subcategory" name="subcategoryId">
        <option value="">-- Select Subcategory --</option>
    </select>
        </div>

        

        <div>
          <aside class="row">
            <input type="submit" value="Save" class="save-btn" style="width:100%;margin:1rem;">
            <a href="<?= ROOT ?>/admin/products/" class="cancel-btn">Cancel</a>
          </aside>
        </div>
      </form>
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
  <script>
    // When category changes, trigger the AJAX request to load subcategories
    $('#category').on('change', function() {
        var categoryId = $(this).val();  // Get the selected category ID

        // Clear the subcategory dropdown
        $('#subcategory').html('<option value="">-- Select Subcategory --</option>');

        if (categoryId) {
            $.ajax({
                url: '<?=ROOT?>/admin/get-subcategories/' + categoryId,  // Dynamic category ID in the URL
                type: 'GET',  // Use GET method
                success: function(data) {
                    // Populate subcategories dropdown with the received data
                    $('#subcategory').append(data);
                }
            });
        }
    });
</script>
