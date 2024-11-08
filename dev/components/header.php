<!DOCTYPE html>
<html lang="en">
<?php 

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $tableSchema = json_decode($_POST['JSON'], true);
  $table = $_POST['TABLE'];
}
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Core PHP- PulseMVC</title>
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <link rel="stylesheet" href="assets/styles.css">
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="assets/tokyo-night-dark.min.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
  <script>
    $(document).ready(function() {
      const toggle = document.querySelector('.toggle');
      const menu = document.querySelector('.menu');
      toggle.addEventListener('click', function() {
        toggle.classList.toggle('active');
        if (menu.style.display === 'flex') {
          menu.style.display = 'none';
        } else {
          menu.style.display = 'flex';
        }
      });
    });
  </script>
  <script>
    hljs.initHighlightingOnLoad();
  </script>

  <script>


  </script>

</head>

<body>
  <header>
    <div class="container">
      <nav>
        <div class="logo">
          <a href="index.php"><img src="assets/img/PulseMVClogo.png" alt=""></a>
        </div>
        <div class="toggle">
          <span></span>
          <span></span>
          <span></span>
        </div>
        <ul class="menu">
          <li><a href="docs.php">Docs</a></li>
          <li><a href="about.php">About</a></li>
          <li class="has-submenu"><a href="#">Core PHP MVC</a>
            <ul class="submenu">
              <li><a href="#">Core PHP</a></li>
              <li><a href="#">PHP PDO</a></li>
              <li><a href="#">MVC Structure</a></li>
              <li><a href="#">Custom Framework</a></li>
            </ul>
          </li>
          <li><a href="blog.php">Blog</a></li>
          <li><a href="help.php">Help & Support</a></li>

        </ul>
      </nav>
    </div>

  </header>
  <main>