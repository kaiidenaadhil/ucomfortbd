  <div class="data-table">
  <div class="table-container">
  <h2> Edit  metaseo </h2>
<?php foreach ($params["metaseo"] as $key => $metaseo) : ?>
  <form method="post" action="<?= ROOT ?>/admin/metaseo/<?= $metaseo['metaseoIdentify'] ?>/modify">
  <div>
    <label for="pageSlug">Page Slug</label>
    <input type="text" name="pageSlug" value="<?= $metaseo["pageSlug"] ?>">
  </div>
  <div>
    <label for="metaTitle">Meta Title</label>
    <input type="text" name="metaTitle" value="<?= $metaseo["metaTitle"] ?>">
  </div>
  <div>
    <label for="metaDescription">Meta Description</label>
    <input type="text" name="metaDescription" value="<?= $metaseo["metaDescription"] ?>">
  </div>
  <div>
    <label for="metaKeywords">Meta Keywords</label>
    <input type="text" name="metaKeywords" value="<?= $metaseo["metaKeywords"] ?>">
  </div>
  <div>
    <label for="imageFeature">Image Feature</label>
    <input type="text" name="imageFeature" value="<?= $metaseo["imageFeature"] ?>">
  </div>
  <div>
    <label for="imageAlt">Image Alt</label>
    <input type="text" name="imageAlt" value="<?= $metaseo["imageAlt"] ?>">
  </div>
  <div>
    <label for="imageCaption">Image Caption</label>
    <input type="text" name="imageCaption" value="<?= $metaseo["imageCaption"] ?>">
  </div>
  <div>
    <label for="canonicalURL">Canonical U R L</label>
    <input type="text" name="canonicalURL" value="<?= $metaseo["canonicalURL"] ?>">
  </div>
  <div>
    <label for="metaAuthor">Meta Author</label>
    <input type="text" name="metaAuthor" value="<?= $metaseo["metaAuthor"] ?>">
  </div>
  <div><aside class="row">
    <input type="submit" value="Update" class="save-btn">
 <a href="<?= ROOT ?>/admin/metaseo" class="cancel-btn">back</a>
   </aside></div>
  </form>
<?php endforeach; ?>
  </div>
  </div>
