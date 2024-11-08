  <div class="data-table">
    <div class="data-info">
      <h3>Add a faqs</h3> <a href="<?= ROOT ?>/admin/faqs" class="gradient-btn">Back</a>
    </div>
    <div class="table-container">
      <form method="post">
        <div>
          <label for="faqTitle">Faq Title</label>
          <input type="text" name="faqTitle">
        </div>
        <div>
          <label for="faqDesc">Faq Desc</label>
          <input type="text" name="faqDesc">
        </div>
        <div>
          <aside class="row">
            <input type="submit" value="Save" class="save-btn" style="width:100%;margin:1rem;">
            <a href="<?= ROOT ?>/admin/faqs/" class="cancel-btn">Cancel</a>
          </aside>
        </div>
      </form>
    </div>
  </div>
