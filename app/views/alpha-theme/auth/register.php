<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Sign Up for Mornstar - Fostering Goodness and Discouraging Evil">
    <meta name="keywords" content="Mornstar, sign up, user registration, online platform">
    <meta name="author" content="Ahad Ul Amin">
    <meta name="theme-color" content="#127fb1">
    <link rel="canonical" href="<?=ROOT?>"/>
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Sign Up for Mornstar - Fostering Goodness and Discouraging Evil">
    <meta property="og:description" content="Sign up for Mornstar and join an online platform dedicated to fostering goodness, unity, justice, guidance, and positivity.">
    <meta property="og:image" content="<?=ROOT?>/public/img/site-social-share-cover.jpg">
    <meta property="og:url" content="<?=ROOT?>/signup/">
    <meta property="og:type" content="website">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Sign Up for Mornstar - Fostering Goodness and Discouraging Evil">
    <meta name="twitter:description" content="Sign up for Mornstar and join an online platform dedicated to fostering goodness, unity, justice, guidance, and positivity.">
    <meta name="twitter:image" content="<?=ROOT?>/public/img/site-social-share-cover.jpg">
    
    <title>Sign Up for Mornstar - Fostering Goodness and Discouraging Evil</title>
    
    <link rel="stylesheet" href="<?= ASSETS ?>/css/admin-styles.css">
  <link href="https://cdn.jsdelivr.net/npm/@iconscout/unicons@4.0.8/css/line.min.css" rel="stylesheet">

  <style>
    main{
      height: 100vh;
    background: transparent linear-gradient(166deg, #127fb1, #88cdae) 0 0 no-repeat padding-box !important;
    }
    .auth-form-container {
      border-radius: 0.5rem;
      border: 1px solid #e2e2e2;
      background: #fff;
      max-width:450px;
      color: #333;
      display: flex;
      height: auto;
      justify-content: center;
      flex-wrap: nowrap;
      align-items: flex-start;
      align-content: space-around;
      margin: 0px auto;

    }

    .auth-form-padding {
      padding: 1rem;
    }
  </style>
</head>

<body>
  <main>





    <div class="container" style="margin:0px auto">
<br>
      <form class="auth-form-container" method="POST" action="<?= ROOT ?>/register">

        <div class="auth-form-padding">
        <a href="<?=ROOT?>"><i class="uil uil-previous"></i> Back</a>
          <div style="margin:0px auto;">
            <img src="<?=ASSETS?>/img/ucomfort.svg" style="margin: 0.5rem 4rem;">
          </div>
          <div style="text-align:center;text-align: center;">
            <h3>Create an account</h3>

          </div>
  
          <div class="form-group">
            <div class="input-group">
              <input type="email" id="email" name="userEmail" placeholder="Email" required>
              <span class="input-icon"><i class="uil uil-envelope"></i></span>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <input type="password" id="password" name="userPassword" placeholder="Password" required>
              <span class="password-toggle"><i class="uil uil-eye-slash"></i></span>
            </div>
            <div style="float: right;margin: 0.5rem 0rem -1rem;"><a href="<?= ROOT ?>/forget-password">forget password?</a></div>
          </div>
          <button type="submit" class="gradient-btn" style="width:100%;margin-top:1rem;">Register</button>
          <div style="text-align:center;text-align: center;padding:1rem;">
            <p> Already have an account?  <a href="<?= ROOT ?>/login" class="normal-link">Login</a> </p>
          </div>
        </div>
      </form>



    </div>

    <script>
      const passwordInput = document.getElementById('password');
      const togglePasswordBtn = document.querySelector('.password-toggle i');
      togglePasswordBtn.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        togglePasswordBtn.classList.toggle('uil-eye-slash');
        togglePasswordBtn.classList.toggle('uil-eye');
      });
    </script>
  </main>
  <script>
    $(document).ready(function() {
      $('.action-menu .dots').click(function(e) {
        e.stopPropagation(); // Prevent document click event from closing menu

        // Close all other menus
        $('.action-menu.active').not($(this).parent()).removeClass('active');

        // Toggle the current menu
        $(this).parent().toggleClass('active');
      });

      $(document).click(function(e) {
        // Close all menus
        if (!$('.action-menu').is(e.target) && $('.action-menu').has(e.target).length === 0) {
          $('.action-menu.active').removeClass('active');
        }
      });
    });
  </script>
</body>

</html>