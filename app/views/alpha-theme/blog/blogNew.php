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
      <h3>Add a blog</h3> <a href="<?= ROOT ?>/admin/blog" class="gradient-btn">Back</a>
    </div>
    <div class="table-container">
      <form method="post" enctype="multipart/form-data">
        <div>
          <label for="blogTitle">Blog Title</label>
          <input type="text" name="blogTitle">
        </div>
        <div>
        <div> 
          <label for="blogSubtitle">Blog Subtitle</label>
          <input type="text" name="blogSubtitle">
        </div>
        <!-- <div>
            <label for="blogContent">Blog Content</label>
            <textarea name="blogContent"></textarea>
        </div> -->
        <div>
        <label for="blogContent">Blog Content</label>
        <!-- Create a container for Quill.js -->
        <div id="editor" class="editor-container"></div>
        <!-- Hidden textarea for form submission -->
        <textarea name="blogContent" id="blogContent" style="display: none;"></textarea>
    </div>
        <div>
          <label for="blogAuthor">Blog Author</label>
          <input type="text" name="blogAuthor">
        </div>
        <div>
          <label for="blogImage">Blog Image</label>
          <input type="file" name="blogImage">
        </div>
        <div>
          <aside class="row">
            <input type="submit" value="Save" class="save-btn" style="width:100%;margin:1rem;">
            <a href="<?= ROOT ?>/admin/blog/" class="cancel-btn">Cancel</a>
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
            const blogContent = document.querySelector('#blogContent');
            blogContent.value = quill.root.innerHTML; // Get the editor's HTML content
        }

        // Optional: Add an event listener to update textarea before form submission
        document.querySelector('form').addEventListener('submit', updateTextarea);
    </script>