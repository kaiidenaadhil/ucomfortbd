  <div class="data-table">
  <div class="table-container">
  <h2> Edit  network </h2>
<?php foreach ($params["network"] as $key => $network) : ?>
  <form method="post" action="<?= ROOT ?>/admin/network/<?= $network['networkIdentify'] ?>/modify" enctype="multipart/form-data">
  <div>
    <label for="networkTitle">Network Title</label>
    <input type="text" name="networkTitle" value="<?= $network["networkTitle"] ?>">
  </div>
  <div>
    <label for="networkCountry">Nework Country</label>
    <input type="text" name="networkCountry" value="<?= $network["networkCountry"] ?>">
  </div>
  <div>
    <label for="networkCity">Network City</label>
    <input type="text" name="networkCity" value="<?= $network["networkCity"] ?>">
  </div>
  <div>
    <label for="networkStore">Network Store</label>
    <input type="text" name="networkStore" value="<?= $network["networkStore"] ?>">
  </div>
  <div>
    <label for="networkPhone">Network Phone</label>
    <input type="text" name="networkPhone" value="<?= $network["networkPhone"] ?>">
  </div>
  <div>
    <label for="networkAddress">Network Address</label>
    <input type="text" name="networkAddress" value="<?= $network["networkAddress"] ?>">
  </div>
  <div>
    <label for="networkImage">Network Image</label>
    <input type="file" name="networkImage"> <?= $network["networkImage"] ?>
  </div>
  <div><aside class="row">
    <input type="submit" value="Update" class="save-btn">
 <a href="<?= ROOT ?>/admin/network" class="cancel-btn">back</a>
   </aside></div>
  </form>
<?php endforeach; ?>
  </div>
  </div>
