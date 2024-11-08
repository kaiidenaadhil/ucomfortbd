  <div class="data-table">
  <div class="table-container">
  <h2> Edit  projects </h2>
<?php foreach ($params["projects"] as $key => $projects) : ?>
  <form method="post" action="<?= ROOT ?>/admin/projects/<?= $projects['projectIdentify'] ?>/modify" enctype="multipart/form-data">
  <div>
    <label for="projectFlagCode">Project Flag Code</label>
    <input type="text" name="projectFlagCode" value="<?= $projects["projectFlagCode"] ?>">
  </div>
  <div>
    <label for="projectImage">Project Image</label>
    <input type="file" name="projectImage"> <?= $projects["projectImage"] ?>
  </div>
  <div>
    <label for="projectCountryName">Project Country Name</label>
    <input type="text" name="projectCountryName" value="<?= $projects["projectCountryName"] ?>">
  </div>
  <div><aside class="row">
    <input type="submit" value="Update" class="save-btn">
 <a href="<?= ROOT ?>/admin/projects" class="cancel-btn">back</a>
   </aside></div>
  </form>
<?php endforeach; ?>
  </div>
  </div>
