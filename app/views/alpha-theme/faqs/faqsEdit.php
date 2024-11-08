  <div class="data-table">
  <div class="table-container">
  <h2> Edit  faqs </h2>
<?php foreach ($params["faqs"] as $key => $faqs) : ?>
  <form method="post" action="<?= ROOT ?>/admin/faqs/<?= $faqs['faqIdentify'] ?>/modify">
  <div>
    <label for="faqTitle">Faq Title</label>
    <input type="text" name="faqTitle" value="<?= $faqs["faqTitle"] ?>">
  </div>
  <div>
    <label for="faqDesc">Faq Desc</label>
    <input type="text" name="faqDesc" value="<?= $faqs["faqDesc"] ?>">
  </div>
  <div><aside class="row">
    <input type="submit" value="Update" class="save-btn">
 <a href="<?= ROOT ?>/admin/faqs" class="cancel-btn">back</a>
   </aside></div>
  </form>
<?php endforeach; ?>
  </div>
  </div>
