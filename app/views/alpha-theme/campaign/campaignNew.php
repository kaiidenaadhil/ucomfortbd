  <div class="data-table">
    <div class="data-info">
      <h3>Add a campaign</h3> <a href="<?= ROOT ?>/admin/campaign" class="gradient-btn">Back</a>
    </div>
    <div class="table-container">
      <form method="post" enctype="multipart/form-data">
        <div>
          <label for="campainTitle">Campain Title</label>
          <input type="text" name="campainTitle">
        </div>
        <div>
          <label for="campaignSubtitle">Campaign Subtitle</label>
          <input type="text" name="campaignSubtitle">
        </div>
        <div>
          <label for="campaignMedia">Campaign Media</label>
          <input type="file" name="campaignMedia">
        </div>
        <div>
          <aside class="row">
            <input type="submit" value="Save" class="save-btn" style="width:100%;margin:1rem;">
            <a href="<?= ROOT ?>/admin/campaign/" class="cancel-btn">Cancel</a>
          </aside>
        </div>
      </form>
    </div>
  </div>
