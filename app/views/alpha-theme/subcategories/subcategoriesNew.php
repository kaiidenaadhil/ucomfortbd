  <div class="data-table">
    <div class="data-info">
      <h3>Add a subcategories</h3> <a href="<?= ROOT ?>/admin/subcategories" class="gradient-btn">Back</a>
    </div>
    <div class="table-container">
      <form method="post" enctype="multipart/form-data">
        <div>
          <label for="subcategoryName">Subcategory Name</label>
          <input type="text" name="subcategoryName">
        </div>
        <div>
          <label for="subcategoryDesc">Subcategory Desc</label>
          <input type="text" name="subcategoryDesc">
        </div>
        <div>
          <label for="subcategoryUri">Subcategory Uri</label>
          <input type="text" name="subcategoryUri">
        </div>

        <div>
        <label for="productTags">Select Category:</label>
          <select id="category" name="categoryId"> 
             <option value="">-- Select Category --</option>
          <?php foreach ($params['categories'] as $category) {
            echo '<option value="' . $category['categoryId'] . '">' . $category['categoryName'] . '</option>';
           }?>
          </select>
        </div>

        <div>
          <label for="subcategoryFeatureImage">Subcategory Feature Image</label>
          <input type="file" name="subcategoryFeatureImage">
        </div>
        <div>
          <aside class="row">
            <input type="submit" value="Save" class="save-btn" style="width:100%;margin:1rem;">
            <a href="<?= ROOT ?>/admin/subcategories/" class="cancel-btn">Cancel</a>
          </aside>
        </div>
      </form>
    </div>
  </div>
