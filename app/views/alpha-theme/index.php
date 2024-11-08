<section class="hero-section">
<?php
$latestVideo = null;
foreach ($params['sliders'] as $s) {
    if (preg_match('/\.(mp4|avi|mov)$/i', $s['campaignMedia']) && 
        (!$latestVideo || strtotime($s['campaignUpdated']) > strtotime($latestVideo['campaignUpdated']))) {
        $latestVideo = $s;
    }
}

if ($latestVideo) {
    $videoUrl = ASSETS . "/img/uploads/" . htmlspecialchars($latestVideo['campaignMedia']);
    echo '<video autoplay muted loop class="hero-video">
            <source src="' . $videoUrl . '" type="video/mp4">
            Your browser does not support the video tag.
          </video>';
}
?>
<?php if (isset($s['campainTitle'], $s['campaignSubtitle']) && $s['campainTitle'] !== null && $s['campaignSubtitle'] !== null): ?>
    <div class="hero-overlay">
        <h1><?= htmlspecialchars($s['campainTitle'], ENT_QUOTES, 'UTF-8') ?></h1>
        <p><?= htmlspecialchars($s['campaignSubtitle'], ENT_QUOTES, 'UTF-8') ?></p>
    </div>
<?php endif; ?>

</section>




<div style="margin-top:50px;"></div>
<div class="heading sub-heading">
  <h1>ONE-STOP PROJECTS SOLUTION
    <span>Elevate Your Home with Exceptional Designs</span>
  </h1>
</div>
<div class="">
    <div class="card-deck">  
    <?php foreach ($params['categories'] as $category): ?>
      <div class="card">
      
        <img class="card-img-top desktop" src="<?=ASSETS?>/img/uploads/<?=$category['categoryFeatureImage']?>" alt="<?php echo $category['categoryName']; ?>" alt="Card image">
        <img class="card-img-top mobile" src="<?=ASSETS?>/img/uploads/<?=$category['categoryFeatureImage']?>" alt="<?php echo $category['categoryName']; ?>" alt="Card image">
        <div class="card-img-overlay">
          <h4 class="card-title"><?php echo $category['categoryName']; ?></h4>
          <p class="card-text">
            <a href="#" class="btn btn-link text-light">EXPLORE</a>
          </p>
        </div>

        <div class="card-hover">
        <a style="text-decoration:none;color:white;" href="<?=ROOT?>/categories/<?php echo $category['categoryUri']; ?>">
          <div class="text-wrapper">
            <div class="text">
              <h3><?php echo $category['categoryName']; ?></h3>
              <p class="caption"></p>
              <p><?php echo $category['categoryDesc']; ?></p>

            </div>
          </div>
          </a>
        </div>
      
      </div>
      <?php endforeach; ?>

     

      <!-- Repeat card structure for other items... -->
    </div>
  </div>





	<div style="padding-top:50px;"></div>
<div class="heading sub-heading">
  <h1>HOT PRODUCTS
    <span>YOUR PARTNER FOR BATH ROOM SOLUTION</span>
  </h1>
</div>

<style>
    /* Carousel Container */
    .carousel-container {
        width: 90%;
        margin: 0 auto;
        overflow: hidden;
        position: relative;
        padding: 1rem 0;
    }

    .product-carousel {
        display: flex;
        transition: transform 0.5s ease-in-out;
    }

    /* Product Card Styling */
    .product-card {
        flex: 0 0 23%;
        margin: 0.5rem;
        position: relative;
        height: 400px;
        overflow: hidden;
        border-radius: 8px;
        transition: transform 0.3s, box-shadow 0.3s;
        background-color: #fff;
    }

    .product-card:hover {
        box-shadow: 0 7px 23px rgba(0, 0, 0, 0.2);
        transform: translateY(-3px);
    }

    /* Hover Animation with Image Flip */
    .hover-animation {
        position: relative;
        width: 100%;
        height: 60%;
    }

    .hover-animation img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        position: absolute;
        transition: opacity 0.6s ease;
        border-radius: 8px 8px 0 0;
    }

    .hover-animation .image-front:hover {
        opacity: 0;
    }

    /* Product Info */
    .product-info {
        padding: 1rem;
    }

    .product-name {
        font-size: 1.2em;
        margin-bottom: 0.5rem;
        color: #000;
        font-weight: bold;
        text-transform: uppercase;
    }

    .product-description {
        font-size: 0.9em;
        color: #666;
        margin-bottom: 0.5rem;
    }

    .product-price {
        font-size: 1.2em;
        color: #ea1f24;
        font-weight: bold;
    }

    /* Price and Cart Button Container */
    .price-cart {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 1rem;
    }

    /* Cart Button */
    .cart-container {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 50px;
        height: 50px;
        background-color: #3498db;
        border-radius: 50%;
        color: #fff;
        transition: all 0.3s ease;
        cursor: pointer;
        position: relative;
    }

    .cart-container:hover {
        width: 150px;
        border-radius: 10px;
    }

    .cart-text {
        display: none;
        font-weight: bold;
    }

    .cart-container:hover .cart-text {
        display: inline-block;
        margin-left: 10px;
    }

    /* Responsive Styling */
    @media (max-width: 1024px) {
        .product-card {
            flex: 0 0 30%;
        }
    }

    @media (max-width: 768px) {
        .product-card {
            flex: 0 0 45%;
            height: 350px;
        }
        .product-info {
            padding: 0.8rem;
        }
    }

    @media (max-width: 480px) {
        .product-card {
            flex: 0 0 100%;
            height: 300px;
        }
        .product-name {
            font-size: 1em;
        }
        .product-price {
            font-size: 1.1em;
        }
        .cart-container {
            width: 40px;
            height: 40px;
        }
    }

    /* View All Link */
    .view-all-link {
        text-align: center;
        margin-top: 1.5rem;
    }

    .view-all-link a {
        color: #e44d26;
        text-decoration: none;
        font-weight: bold;
        font-size: 1.1em;
        transition: color 0.3s;
    }

    .view-all-link a:hover {
        color: #2d3191;
    }

</style>


<div class="carousel-container" id="customCarousel">
  
    <div class="product-carousel">
        <?php foreach ($params['products'] as $key => $product) : ?>
            <div class="product-card">
                <div class="hover-animation">
                    <img src="https://www.empolobath.com/wp-content/uploads/2023/12/eb734w.jpg" class="image-back">
                    <img src="<?= ASSETS ?>/img/uploads/<?= $product["productImage"] ?>" class="image-front">
                </div>
                <div class="product-info">
                    <div class="product-name"><?= $product['productName'] ?></div>
                    <div class="product-description"><?= substr($product['productDesc'], 0, 40) ?></div>
                    <div class="price-cart">
                        <div class="product-price">$<?= $product['productPrice'] ?></div>
                        <div class="cart-container" onclick="window.location.href = '<?= ROOT ?>/product/<?= $product['productIdentify'] ?>'">
                            <span class="cart-text">READ MORE</span> 
                            <i class="uil uil-shopping-cart"></i>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="view-all-link">
    <a href="<?= ROOT ?>/products">View All Products</a>
</div>

<script>
    const container = document.getElementById('customCarousel');
    let isDragging = false;
    let startX;
    let scrollLeft;

    container.addEventListener('mousedown', (e) => {
        isDragging = true;
        startX = e.pageX - container.offsetLeft;
        scrollLeft = container.scrollLeft;
        container.classList.add('grabbing');
    });

    container.addEventListener('mouseleave', () => {
        isDragging = false;
        container.classList.remove('grabbing');
    });

    container.addEventListener('mouseup', () => {
        isDragging = false;
        container.classList.remove('grabbing');
    });

    container.addEventListener('mousemove', (e) => {
        if (!isDragging) return;
        e.preventDefault();
        const x = e.pageX - container.offsetLeft;
        const walk = (x - startX) * 1.5;
        container.scrollLeft = scrollLeft - walk;
    });
</script>


<style>
        .sales-card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            max-width: 1200px;
            margin: 20px auto;
        }

        .sales-card {
            width: calc(33.33% - 20px);
            margin-bottom: 20px;
            border-radius: 8px;
            overflow: hidden;
            
        }
        .sales-card:hover{
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .sales-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .sales-details {
            padding: 15px;
            box-sizing: border-box;
            color:#615757;
        }

        .location-heading {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .city,
        .store-name,
        .phone,
        .address {
            margin-bottom: 5px;
        }

        .city,
        .store-name,
        .phone,
        .address {
            margin-bottom: 5px;
        }

        @media (max-width: 768px) {
            .sales-card {
                width: calc(50% - 20px);
            }
        }
        span{
            font-weight: bold;
        }
    </style>
<div style="padding-top:50px;"></div>
<div class="heading sub-heading">
  <h1>ONE-STOP PROJECT SOLUTION
    <span>YOUR PARTNER FOR BATH ROOM SOLUTION</span>
  </h1>
  <img style="width:100%;" src="https://ucomfortbd.com/assets/alpha-theme/img/certificate.jpg" alt="">
</div>


<div style="padding-top:50px;"></div>
<div class="heading sub-heading">
  <h1>SALES NETWORK
    <span>YOUR PARTNER FOR BATH ROOM SOLUTION</span>
  </h1>
</div>


<div class="sales-card-container">


<?php foreach ($params['networks'] as $key => $network) : ?>
<div class="sales-card"><img src="<?=ASSETS?>/img/uploads/<?=$network['networkImage']?>" alt="Sales Card Image">
    <div class="sales-details">
        <h2><i class="uil uil-map-marker"></i> <?=$network['networkTitle']?></h2>
        <div class="location-heading"><span>Country: </span><?=$network['networkCountry']?></div>
        <div class="city"><span>
            City: 
        </span> <?=$network['networkCity']?></div>
        <div class="store-name"><span>Store: </span>  <?=$network['networkStore']?></div>
        <div class="phone"><span>Phone:</span> <?=$network['networkPhone']?></div>
        <div class="address"><span>Address: </span>  <?=$network['networkAddress']?></div>
    </div>
</div>
<?php endforeach; ?>
</div>


<div style="padding-top:50px;"></div>



<style>
  .blog-container {
    width: calc(100% - 40px );
    padding: 20px;
}

.article {
    width: 100%;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 5px;
}

.article h1 {
    font-size: 2rem;
    margin-bottom: 10px;
}

.article h2 {
    font-size: 1.5rem;
    margin-bottom: 10px;
    color: #555;
}

.article p {
    font-size: 1rem;
    color: #333;
}

@media (max-width: 768px) {
    .article h1 {
        font-size: 1.5rem;
    }

    .article h2 {
        font-size: 1.2rem;
    }

    .article p {
        font-size: 0.9rem;
    }
}
</style>


<div class="blog-container">
<?php foreach($params['blog'] as $key => $blog): ?>
        <article class="article">
            <h1><?= $blog['blogTitle'] ?></h1>
            <h2><?= $blog['blogSubtitle'] ?></h2>
            <p><?= $blog['blogContent'] ?></p>
        </article>
        <?php endforeach; ?>
        
    </div>

<div style="padding-top:50px;"></div>