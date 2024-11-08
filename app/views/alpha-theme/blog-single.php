<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
     

        /* Blog Heading */
        .heading {
            text-align: center;
            margin: 40px 0;
        }

        .heading h1 {
            font-size: 2.5rem;
            color: #c76484;
        }

        .heading span {
            font-size: 1.2rem;
            color: #555;
            display: block;
            margin-top: 10px;
        }

        /* Blog Wrapper */
        .blog-wrapper {
            max-width: 1200px;
            margin: 20px auto;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        /* Blog Container */
        .blog-container {
            background-color: #fff;
            border-radius: 12px;
            padding: 20px;
            overflow: hidden;
        }

        /* Blog Title */
        .blog-title {
            font-family: 'Merriweather', serif;
            font-size: 2rem;
            color: #333;
            margin-bottom: 10px;
        }

        /* Meta Information */
        .blog-meta {
            font-size: 0.9rem;
            color: #777;
            margin-bottom: 15px;
            width: 100%;
        }

        /* Blog Image */
        .blog-image img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 15px;
            transition: transform 0.3s ease;
        }

        .blog-image:hover img {
            transform: scale(1.05);
        }

        /* Blog Description */
        .blog-description {
            font-size: 1rem;
            line-height: 1.6;
            color: #555;
            margin-bottom: 20px;
        }

        .blog-content a {
            color: #c76484;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .blog-content a:hover {
            color: #716BB1;
        }

        /* Responsive Styles */
        @media (max-width: 576px) {
            .blog-title {
                font-size: 1.5rem;
            }

            .blog-description {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>



    <!-- Blog Wrapper -->
    <div class="blog-wrapper">
        <?php foreach ($params['blog'] as $blog): ?>
            <div class="blog-container">
                <!-- Blog Title -->
                <h2 class="blog-title"><?= htmlspecialchars($blog['blogTitle']) ?></h2>

                <!-- Meta Information -->
                <div class="blog-meta">
                    <span>By uComfortBD | 24 Oct 2024</span>
                </div>

                <!-- Featured Image -->
                <div class="blog-image">
                    <img src="<?= ASSETS ?>/img/uploads/<?= htmlspecialchars($blog['blogImage']) ?>" 
                         alt="<?= htmlspecialchars($blog['blogTitle']) ?>">
                </div>

                <!-- Blog Description -->
                <p class="blog-description" style="width:100%">
                     <?= html_entity_decode($blog["blogContent"]) ?>
                </p>

               
            </div>
        <?php endforeach; ?>
    </div>

</body>
</html>
