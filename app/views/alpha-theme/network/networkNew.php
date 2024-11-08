  <div class="data-table">
    <div class="data-info">
      <h3>Add a network</h3> <a href="<?= ROOT ?>/admin/network" class="gradient-btn">Back</a>
    </div>
    <div class="table-container">
      <form method="post" enctype="multipart/form-data">
        <div>
          <label for="networkTitle">Network Title</label>
          <input type="text" name="networkTitle">
        </div>
        <div>
          <label for="neworkCountry">Nework Country</label>
          <input type="text" name="networkCountry">
        </div>
        <div>
          <label for="networkCity">Network City</label>
          <input type="text" name="networkCity">
        </div>
        <div>
          <label for="networkStore">Network Store</label>
          <input type="text" name="networkStore">
        </div>
        <div>
          <label for="networkPhone">Network Phone</label>
          <input type="text" name="networkPhone">
        </div>
        <div>
          <label for="networkAddress">Network Address</label>
          <input type="text" name="networkAddress">
        </div>
        <div>
          <label for="networkImage">Network Image</label>
          <input type="file" name="networkImage">
        </div>
        <div>
          <aside class="row">
            <input type="submit" value="Save" class="save-btn" style="width:100%;margin:1rem;">
            <a href="<?= ROOT ?>/admin/network/" class="cancel-btn">Cancel</a>
          </aside>
        </div>
      </form>
    </div>
  </div>
