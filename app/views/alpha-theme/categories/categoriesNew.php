  <div class="data-table">
    <div class="data-info">
      <h3>Add a categories</h3> <a href="<?= ROOT ?>/admin/categories" class="gradient-btn">Back</a>
    </div>
    <div class="table-container">
      <form method="post" enctype="multipart/form-data">
        <div>
          <label for="categoryName">Category Name</label>
          <input type="text" name="categoryName">
        </div>
        <div>
          <label for="categoryDesc">Category Desc</label>
          <input type="text" name="categoryDesc">
        </div>
        <div>
          <label for="categoryUri">Category Uri</label>
          <input type="text" name="categoryUri">
        </div>
        <div>
          <label for="categoryFeatureImage">Category Feature Image</label>
          <input type="file" name="categoryFeatureImage">
        </div>
        <div>
          <aside class="row">
            <input type="submit" value="Save" class="save-btn" style="width:100%;margin:1rem;">
            <a href="<?= ROOT ?>/admin/categories/" class="cancel-btn">Cancel</a>
          </aside>
        </div>
      </form>
    </div>
  </div>
