  <div class="data-table">
    <div class="data-info">
      <h3>Add a metaseo</h3> <a href="<?= ROOT ?>/admin/metaseo" class="gradient-btn">Back</a>
    </div>
    <div class="table-container">
      <form method="post">
        <div>
          <label for="pageSlug">Page Slug</label>
          <input type="text" name="pageSlug">
        </div>
        <div>
          <label for="metaTitle">Meta Title</label>
          <input type="text" name="metaTitle">
        </div>
        <div>
          <label for="metaDescription">Meta Description</label>
          <input type="text" name="metaDescription">
        </div>
        <div>
          <label for="metaKeywords">Meta Keywords</label>
          <input type="text" name="metaKeywords">
        </div>
        <div>
          <label for="imageFeature">Image Feature</label>
          <input type="text" name="imageFeature">
        </div>
        <div>
          <label for="imageAlt">Image Alt</label>
          <input type="text" name="imageAlt">
        </div>
        <div>
          <label for="imageCaption">Image Caption</label>
          <input type="text" name="imageCaption">
        </div>
        <div>
          <label for="canonicalURL">Canonical U R L</label>
          <input type="text" name="canonicalURL">
        </div>
        <div>
          <label for="metaAuthor">Meta Author</label>
          <input type="text" name="metaAuthor">
        </div>
        <div>
          <aside class="row">
            <input type="submit" value="Save" class="save-btn" style="width:100%;margin:1rem;">
            <a href="<?= ROOT ?>/admin/metaseo/" class="cancel-btn">Cancel</a>
          </aside>
        </div>
      </form>
    </div>
  </div>
