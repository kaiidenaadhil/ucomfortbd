  <div class="data-table">
    <div class="data-info">
      <h3>Add a clients</h3> <a href="<?= ROOT ?>/admin/clients" class="gradient-btn">Back</a>
    </div>
    <div class="table-container">
      <form method="post">
        <div>
          <label for="clientName">Client Name</label>
          <input type="text" name="clientName">
        </div>
        <div>
          <label for="clientEmail">Client Email</label>
          <input type="text" name="clientEmail">
        </div>
        <div>
          <label for="whatsapp">Whatsapp</label>
          <input type="text" name="whatsapp">
        </div>
        <div>
          <label for="clientMessage">Client Message</label>
          <input type="text" name="clientMessage">
        </div>
        <div>
          <aside class="row">
            <input type="submit" value="Save" class="save-btn" style="width:100%;margin:1rem;">
            <a href="<?= ROOT ?>/admin/clients/" class="cancel-btn">Cancel</a>
          </aside>
        </div>
      </form>
    </div>
  </div>
