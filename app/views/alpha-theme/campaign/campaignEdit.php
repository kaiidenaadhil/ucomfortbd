  <div class="data-table">
  <div class="table-container">
  <h2> Edit  campaign </h2>
<?php foreach ($params["campaign"] as $key => $campaign) : ?>
  <form method="post" action="<?= ROOT ?>/admin/campaign/<?= $campaign['campaignIdentify'] ?>/modify" enctype="multipart/form-data">
  <div>
    <label for="campainTitle">Campain Title</label>
    <input type="text" name="campainTitle" value="<?= $campaign["campainTitle"] ?>">
  </div>
  <div>
    <label for="campaignSubtitle">Campaign Subtitle</label>
    <input type="text" name="campaignSubtitle" value="<?= $campaign["campaignSubtitle"] ?>">
  </div>
  <div>
    <label for="campaignMedia">Campaign Media</label>
    
    <input type="file" name="campaignMedia"> <?= $campaign["campaignMedia"] ?>
  </div>
  <div><aside class="row">
    <input type="submit" value="Update" class="save-btn">
 <a href="<?= ROOT ?>/admin/campaign" class="cancel-btn">back</a>
   </aside></div>
  </form>
<?php endforeach; ?>
  </div>
  </div>
