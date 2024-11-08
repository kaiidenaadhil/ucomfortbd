
<section style="width: calc(100% - 40px);
    padding: 20px;">
<style>
        .category-container {
            display: grid;
            grid-template-columns: repeat(5, 1fr); /* Default to 5 items per row */
            grid-gap: 20px;
            padding: 20px;
        }

        .category-item {
            background-color: #ffffff;
            text-align: center;
            margin: 15px;
            border-radius: 10px;
            transition: background-color 0.3s ease;
            text-decoration: none;
            overflow: hidden;
        }

        .category-item a {
            text-decoration: none;
        }

        .category-item a:hover {
            text-decoration: underline;
        }

        .category-item img {
            width: 100%;
            height: auto;
            margin-bottom: 10px;
            transition: transform 0.3s ease;
        }

        .category-item p {
            font-size: 20px;
            color: #333;
            margin: 5px 0;
        }

        .category-desc {
            font-size: 16px;
            color: #666;
            margin: 0;
        }

        .category-item:hover {
            background-color: #f1f1f1;
        }

        .category-item:hover img {
            transform: scale(1.1);
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .category-container {
                grid-template-columns: repeat(4, 1fr); /* 4 items per row on large screens */
            }
        }

        @media (max-width: 992px) {
            .category-container {
                grid-template-columns: repeat(3, 1fr); /* 3 items per row on medium screens */
            }
        }

        @media (max-width: 768px) {
            .category-container {
                grid-template-columns: repeat(2, 1fr); /* 2 items per row on small screens */
            }
        }

        @media (max-width: 576px) {
            .category-container {
                grid-template-columns: 1fr; /* 1 item per row on extra small screens */
            }
        }
    </style>

<style>
    .gradient-text {
        background: linear-gradient(270deg, #B08291 2.08%, #716BB1 50.64%, #E65B43 99.2%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        color: transparent;
    }

    /* Container with animated pink and blue border */
    .feature-section-container {
        position: relative;
        width: calc(100% - 2rem);
        border-radius: 20px;
        margin-top: 1rem;
        margin-bottom: 2rem;
        background: #ffffff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        margin-left: auto;
        margin-right: auto;
    }

    .feature-section-container::before {
        content: "";
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        border-radius: 20px;
        background: linear-gradient(45deg, #ff6ec4, #7873f5, #ff6ec4, #7873f5);
        background-size: 200% 200%;
        z-index: -1;
        animation: animatePinkBlueBorder 6s ease infinite;
    }

    /* Inner content area */
    .feature-section {
        background-color: #ffffff;
        border-radius: 18px;
        padding: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        max-width: 1200px;
        margin: auto;
    }

    /* Border animation keyframes */
    @keyframes animatePinkBlueBorder {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }

    .feature-image {
        flex: 1;
        position: relative;
        border-radius: 20px 0 0 20px;
        overflow: hidden;
    }

    .feature-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .feature-image::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to bottom right, rgba(255, 75, 162, 0.5), rgba(75, 92, 255, 0.5));
        mix-blend-mode: overlay;
    }

    .feature-image:hover img {
        transform: scale(1.1);
    }

    .feature-content {
        flex: 1;
        padding: 20px 40px;
        text-align: left;
    }

    .feature-content h2 {
        font-size: 2em;
        color: #555;
        margin-bottom: 10px;
        font-weight: 700;
    }

    .feature-content p {
        font-size: 1.1em;
        color: #666;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .feature-link {
        font-size: 1em;
        color: #5c73f2;
        text-decoration: none;
        font-weight: 600;
        border-bottom: 1px solid #5c73f2;
        transition: color 0.3s ease;
    }

    .feature-link:hover {
        color: #ff4ba3;
        border-color: #ff4ba3;
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .feature-section-container {
            width: calc(100% - 2rem); /* Reduce width for tablet */
            margin-top: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .feature-content {
            padding: 20px;
        }

        .feature-content h2 {
            font-size: 1.8em;
        }

        .feature-content p {
            font-size: 1em;
        }
    }

    @media (max-width: 768px) {
        .feature-section {
            flex-direction: column;
            text-align: center;
            padding: 30px 15px;
        }

        .feature-image {
            border-radius: 20px 20px 0 0;
        }

        .feature-content {
            padding: 15px;
        }

        .feature-content h2 {
            font-size: 1.6em;
        }

        .feature-content p {
            font-size: 0.95em;
        }
    }

    @media (max-width: 576px) {
        .feature-section-container {
            width: calc(100% - 1rem); /* Further reduce width on mobile */
            margin-top: 0.5rem;
            margin-bottom: 1rem;
            padding: 10px;
        }

        .feature-content h2 {
            font-size: 1.4em;
        }

        .feature-content p {
            font-size: 0.9em;
        }

        .feature-link {
            font-size: 0.9em;
        }
    }
</style>

<section class="feature-section-container">
    <div class="feature-section">
    <div class="feature-image">
        <img src="<?=ASSETS?>/img/uploads/<?=$params['categories'][0]['categoryFeatureImage']?>" alt="<?php echo $params['categories'][0]['categoryName']; ?>" alt="Category Feature">
    </div>
    <div class="feature-content">
        <h2 class="gradient-text"><?=$params['categories'][0]['categoryName']?></h2>
        <p><?=$params['categories'][0]['categoryDesc']?></p>
        <a href="#" class="feature-link">Discover More</a>
    </div>
    </div>
</section>

    <div class="heading sub-heading">
  <h1>Explore Our Collections
    <span>Elevate Your Space with Our Premium Selection</span>
  </h1>
</div>
<div class="category-container">
        <?php foreach ($params['subcategories'] as $subcategories): ?>
            <div class="category-item">
                <a href="<?=ROOT?>/products/<?php echo $subcategories['subcategoryUri']; ?>">
                <?php
if (isset($subcategories['subcategoryFeatureImage']) && !empty($subcategories['subcategoryFeatureImage'])) {?>
    <img src="<?=ASSETS?>/img/uploads/<?=$subcategories['subcategoryFeatureImage']?>" alt="<?php echo $subcategories['subcategoryName']; ?>">
<?php }
?>

                    <p><?php echo $subcategories['subcategoryName']; ?></p>
                </a>
            </div>
        <?php endforeach;?>
    </div>
</section>



    <style>

        /* Blog container */
        .blog-container {
            display: flex;
            align-items: center;
            max-width: 1000px;
            background-color: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
        }

        /* Alternate layout: Odd items have image on left, even items on right */
        .blog-container:nth-child(odd) {
            flex-direction: row;
        }

        .blog-container:nth-child(even) {
            flex-direction: row-reverse;
        }

        /* Blog image */
        .blog-image {
            flex: 1;
            max-width: 50%;
            overflow: hidden;
        }

        .blog-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        /* Hover effect */
        .blog-image:hover img {
            transform: scale(1.05);
        }

        /* Blog content */
        .blog-content {
            flex: 1;
            padding: 40px;
            color: #444;
        }

        .blog-content h2 {
            font-size: 1.8rem;
            font-weight: 700;
            color: #c76484;
            margin-bottom: 10px;
        }

        .blog-content p {
            font-size: 1rem;
            color: #555;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .blog-content a {
            font-size: 1rem;
            color: #c76484;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .blog-content a:hover {
            color: #716BB1;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .blog-container {
                flex-direction: column;
            }

            .blog-image, .blog-content {
                max-width: 100%;
            }

            .blog-content {
                padding: 20px;
                text-align: center;
            }

            .blog-content h2 {
                font-size: 1.5rem;
            }

            .blog-content p {
                font-size: 0.95rem;
            }
        }

        @media (max-width: 576px) {
            .blog-content h2 {
                font-size: 1.3rem;
            }

            .blog-content p {
                font-size: 0.9rem;
            }

            .blog-content a {
                font-size: 0.9rem;
            }
        }
    </style>

<?php foreach ($params['blog'] as $blog): ?>
    <div class="blog-container">
        <div class="blog-image">
            <img src="<?= ASSETS ?>/img/uploads/<?= $blog['blogImage'] ?>" alt="<?= $blog['blogTitle'] ?>">
        </div>
        <div class="blog-content">
            <h2><?= htmlspecialchars($blog['blogTitle']) ?></h2>
            <p><?= htmlspecialchars($blog['blogContent']) ?></p>
            <a href="<?=ROOT?>/blog/<?= $blog['blogIdentify'] ?>">Discover More</a>
        </div>
    </div>
<?php endforeach; ?>
