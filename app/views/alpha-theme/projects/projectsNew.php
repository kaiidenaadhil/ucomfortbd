  <div class="data-table">
    <div class="data-info">
      <h3>Add a projects</h3> <a href="<?= ROOT ?>/admin/projects" class="gradient-btn">Back</a>
    </div>
    <div class="table-container">
      <form method="post" enctype="multipart/form-data">
        <div>
          <label for="projectFlagCode">Project Flag Code</label>
          <input type="text" name="projectFlagCode">
        </div>
        <div>
          <label for="projectImage">Project Image</label>
          <input type="file" name="projectImage">
        </div>
        <div>
          <label for="projectCountryName">Project Country Name</label>
          <input type="text" name="projectCountryName">
        </div>
        <div>
          <aside class="row">
            <input type="submit" value="Save" class="save-btn" style="width:100%;margin:1rem;">
            <a href="<?= ROOT ?>/admin/projects/" class="cancel-btn">Cancel</a>
          </aside>
        </div>
      </form>
    </div>
  </div>
