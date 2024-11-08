<style>
    /* Blog wrapper for two posts per row */
    .blog-wrapper {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        max-width: 1200px;
        margin: 20px auto;
    }

    /* Blog container */
    .blog-container {
        display: flex;
        align-items: stretch; /* Stretch items to the same height */
        background-color: #fff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        width: calc(50% - 10px); /* Two posts per row */
        margin: 10px 0;
        height: 100%; /* Make sure container fills available space */
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
        display: flex;
    }

    .blog-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
        min-height: 320px;
    }

    /* Hover effect */
    .blog-image:hover img {
        transform: scale(1.05);
    }

    /* Blog content */
    .blog-content {
        flex: 1;
        padding: 0 40px;
        color: #444;
        display: flex;
        flex-direction: column;
        justify-content: center; /* Center the content vertically */
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
        .blog-wrapper {
            flex-direction: column;
        }

        .blog-container {
            width: 100%;
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
<div class="heading sub-heading">
  <h1>Discover More on Our Blog
    <span>Dive into articles that inspire, educate, and bring fresh perspectives.</span>
  </h1>
</div>
<div class="blog-wrapper">
    <?php foreach ($params['blog'] as $blog): ?>
        <div class="blog-container">
            <div class="blog-image">
                <img src="<?= ASSETS ?>/img/uploads/<?= $blog['blogImage'] ?>" alt="<?= htmlspecialchars($blog['blogTitle']) ?>">
            </div>
            <div class="blog-content">
                <h2><?= htmlspecialchars($blog['blogTitle']) ?></h2>
                <p><?= htmlspecialchars(substr($blog['blogSubtitle'], 0, 150)) ?>...</p>
                <a href="<?=ROOT?>/blog/<?= htmlspecialchars($blog['blogIdentify']) ?>">Discover More</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<div class="pagination-container">
<?= $params["pagination"] ?>
</div>