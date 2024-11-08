  <div class="data-table">
  <div class="table-container">
  <h2> Edit  categories </h2>
<?php foreach ($params["categories"] as $key => $categories) : ?>
  <form method="post" action="<?= ROOT ?>/admin/categories/<?= $categories['categoryIdentify'] ?>/modify" enctype="multipart/form-data">
  <div>
    <label for="categoryName">Category Name</label>
    <input type="text" name="categoryName" value="<?= $categories["categoryName"] ?>">
  </div>
  <div>
    <label for="categoryDesc">Category Desc</label>
    <input type="text" name="categoryDesc" value="<?= $categories["categoryDesc"] ?>">
  </div>
  <div>
    <label for="categoryUri">Category Uri</label>
    <input type="text" name="categoryUri" value="<?= $categories["categoryUri"] ?>">
  </div>
  <div>
    <label for="categoryFeatureImage">Category Feature Image</label>
    <input type="file" name="categoryFeatureImage">
     <?= $categories["categoryFeatureImage"]?>
  </div>
  <div><aside class="row">
    <input type="submit" value="Update" class="save-btn">
 <a href="<?= ROOT ?>/admin/categories" class="cancel-btn">back</a>
   </aside></div>
  </form>
<?php endforeach; ?>
  </div>
  </div>
