<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <style>

    .contact-container {
    max-width: 1200px;
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    margin: 0px auto;
    }

    .left-panel {
      flex: 1;
      padding: 20px;
      border-radius: 8px;
      margin-right: 20px;
    }

    .right-panel {
      flex: 1;
      padding: 20px;
      border-radius: 8px;
      margin-left: 20px;
    }

    .contact-info {
      font-size: 16px;
    }

    .highlight {
      color: #545754;
    font-size: 1.5rem;
    }

    .contact-form {
      width: 100%;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      font-size: 14px;
      margin-bottom: 5px;
    }

    input,
    textarea {
      width: 100%;
      padding: 10px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 14px;
    }
    .form-button {
        background-color: #fff;
      color: #000;
      padding: 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s, color 0.3s;
      border:1px solid #000;
    }

    .form-button:hover {

      background-color: #000;
      color: #fff;
    }

    .contact-title{
        color:#b39f98;
    }

    @media (max-width: 768px) {
      .contact-container {
        flex-direction: column;
      }

      .left-panel,
      .right-panel {
        margin: 0;
      }
    }
  </style>
</head>
<body>

  <div class="contact-container">
    <div class="left-panel">
      <div class="contact-info">
        <p class="contact-title">Questions? Call us!</p>
        <p class="highlight">0086-757-82275101</p>
        <p>Monday to Friday from 9am to 9pm.</p>
        <p>UK local time. International call.</p>
<br>
        <p class="contact-title">Customer support</p>
        <p class="highlight">empolobath@china-empolo.com</p>
        <p>Do you have any questions? Send us an e-mail, and we will reply to you as soon as possible.</p>
<br>
        <p class="contact-title">Main office address</p>
        <p class="highlight">ADD: BUILDING 12, NO. 4, SMART ROAD, CHANCHENG AREA, FOSHAN, GUANGDONG, CHINA</p>
        <p>Correspondence address. Please call us prior to your visit.</p>
      </div>
    </div>

    <div class="right-panel">
      <div class="contact-form">
        <h2 class="form-title">ASK US. WE'LL HELP YOU.</h2>
        <div style="color:green;">
<?php if (isset($_SESSION['success_message'])): ?>
<p><?= $_SESSION['success_message'] ?></p>
<?php unset($_SESSION['success_message']); ?>
<?php endif; ?>
</div>
        <form class="ask-form" id="askForm" action="<?=ROOT?>/contact" method="post">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="clientName" name="clientName" class="form-input" required>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="clientEmail" name="clientEmail" class="form-input" required>
          </div>

          <div class="form-group">
            <label for="whatsapp">WhatsApp</label>
            <input type="text" id="whatsapp" name="whatsapp" class="form-input" required>
          </div>

          <div class="form-group">
            <label for="message">Message</label>
            <textarea id="clientMessage" name="clientMessage" rows="4" class="form-input" required></textarea>
          </div>

          <input type="submit"  class="form-button" value="Submit">
        </form>
      </div>
    </div>
  </div>

  <script>
    function submitForm() {
      // You can add your form submission logic here
      // For demonstration purposes, let's just log the form data to the console
      const formData = {
        name: document.getElementById('name').value,
        email: document.getElementById('email').value,
        whatsapp: document.getElementById('whatsapp').value,
        message: document.getElementById('message').value
      };

      console.log(formData);
    }
  </script>

</body>
</html>
