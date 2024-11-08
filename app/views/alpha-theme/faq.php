<style>
  ul.accordion-list {
    position: relative;
    display: block;
    height: auto;
    margin: 0;
    list-style: none;
    margin: 0px auto;
    width: 80%;
    margin-top: 2rem;
  }

  ul.accordion-list li {
    position: relative;
    display: block;
    width: calc(100% - 20px);
    height: auto;
    background-color: #FFF;
    padding: 20px;
    margin: 0 auto 15px auto;
    border: 1px solid #eee;
    border-radius: 5px;
    cursor: pointer;
  }

  ul.accordion-list li.active h3:after {
    transform: rotate(45deg);
  }

  ul.accordion-list li h3 {
    font-weight: 700;
    position: relative;
    display: block;
    width: 100%;
    height: auto;
    padding: 0 0 0 0;
    margin: 0;
    font-size: 15px;
    letter-spacing: 0.01em;
    cursor: pointer;
  }

  ul.accordion-list li h3:after {
    content: "+";
    font-family: "material-design-iconic-font";
    position: absolute;
    right: 0;
    top: 0;
    color: #Fcc110;
    transition: all 0.3s ease-in-out;
    font-size: 18px;
  }

  ul.accordion-list li div.answer {
    position: relative;
    display: block;
    width: 100%;
    height: auto;
    margin: 0;
    padding: 0;
    cursor: pointer;
  }

  ul.accordion-list li div.answer p {
    position: relative;
    display: block;
    font-weight: 300;
    padding: 10px 0 0 0;
    cursor: pointer;
    line-height: 150%;
    margin: 0 0 15px 0;
    font-size: 14px;
  }
</style>
<div class="heading sub-heading">
  <h1>FAQ</h1>
</div>

<ul class="accordion-list">
  <?php if (count($params['faqs']) > 0) : ?>
    <?php foreach ($params['faqs'] as $key => $faqs) : ?>

      <li>
        <h3><?= $faqs['faqTitle'] ?></h3>
        <div class="answer">
          <p>
            <?= $faqs['faqDesc'] ?>
          </p>
        </div>
      </li>



    <?php endforeach; ?>
</ul>

<div class="pagination-container">
  <?= $params["pagination"] ?>
</div>

<?php else : ?>
  <p>No Record to Display.</p>
  <a href="<?= ROOT ?>/admin/faqs/build">Add a Record.</a>
<?php endif; ?>




<script>
  $(document).ready(function() {
    $('.accordion-list > li > .answer').hide();

    $('.accordion-list > li').click(function() {
      if ($(this).hasClass("active")) {
        $(this).removeClass("active").find(".answer").slideUp();
      } else {
        $(".accordion-list > li.active .answer").slideUp();
        $(".accordion-list > li.active").removeClass("active");
        $(this).addClass("active").find(".answer").slideDown();
      }
      return false;
    });

  });
</script>

</body>

</html>