<?php

class LanguageController {
  public function switchLanguage($language) {
    if (isset($_POST['language']) && in_array($_POST['language'], ['en', 'bn'])) {
      $_SESSION['language'] = $_POST['language'];
    }
    header('Location: '.ROOT);
  }
}

