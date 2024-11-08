  <div class="data-table">
  <div class="table-container">
  <h2> Edit  subcategories </h2>
<?php foreach ($params["subcategories"] as $key => $subcategories) : ?>
  <form method="post" enctype="multipart/form-data" action="<?= ROOT ?>/admin/subcategories/<?= $subcategories['subcategoryIdentify'] ?>/modify">
  <div>
    <label for="subcategoryName">Subcategory Name</label>
    <input type="text" name="subcategoryName" value="<?= $subcategories["subcategoryName"] ?>">
  </div>
  <div>
    <label for="subcategoryDesc">Subcategory Desc</label>
    <input type="text" name="subcategoryDesc" value="<?= $subcategories["subcategoryDesc"] ?>">
  </div>
  <div>
    <label for="subcategoryUri">Subcategory Uri</label>
    <input type="text" name="subcategoryUri" value="<?= $subcategories["subcategoryUri"] ?>">
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
    <?= $subcategories["subcategoryFeatureImage"] ?>
  </div>
  <div><aside class="row">
    <input type="submit" value="Update" class="save-btn">
 <a href="<?= ROOT ?>/admin/subcategories" class="cancel-btn">back</a>
   </aside></div>
  </form>
<?php endforeach; ?>
  </div>
  </div>
