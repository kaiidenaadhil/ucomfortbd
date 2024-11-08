<!-- app/views/language-switcher.php -->

<form method="post" action="<?=ROOT?>/language">
  <select name="language" onchange="this.form.submit()">
    <option value="en" <?=($_SESSION['language'] ?? 'en') == 'en' ? 'selected' : ''?>>English</option>
    <option value="bn" <?=($_SESSION['language'] ?? 'en') == 'bn' ? 'selected' : ''?>>Bangla</option>
  </select>
</form>
