  <div class="data-table">
  <div class="table-container">
  <h2> Edit  clients </h2>
<?php foreach ($params["clients"] as $key => $clients) : ?>
  <form method="post" action="<?= ROOT ?>/admin/clients/<?= $clients['clientIdentify'] ?>/modify">
  <div>
    <label for="clientName">Client Name</label>
    <input type="text" name="clientName" value="<?= $clients["clientName"] ?>">
  </div>
  <div>
    <label for="clientEmail">Client Email</label>
    <input type="text" name="clientEmail" value="<?= $clients["clientEmail"] ?>">
  </div>
  <div>
    <label for="whatsapp">Whatsapp</label>
    <input type="text" name="whatsapp" value="<?= $clients["whatsapp"] ?>">
  </div>
  <div>
    <label for="clientMessage">Client Message</label>
    <input type="text" name="clientMessage" value="<?= $clients["clientMessage"] ?>">
  </div>
  <div><aside class="row">
    <input type="submit" value="Update" class="save-btn">
 <a href="<?= ROOT ?>/admin/clients" class="cancel-btn">back</a>
   </aside></div>
  </form>
<?php endforeach; ?>
  </div>
  </div>
