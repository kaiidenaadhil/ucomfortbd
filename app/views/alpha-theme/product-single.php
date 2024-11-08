<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Product View</title>
    <style>
        /* Styles here as previously provided */
        /* Container and layout styling */
        .product-view-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: auto;
            border-radius: 8px;
            background-color: #fff;
        }

        /* Styling for the image section */
        .product-image-section {
            flex: 1;
            max-width: 50%;
            position: relative;
            overflow: hidden;
        }

        /* Main image container with zoom styling */
        .image-zoom-container {
            overflow: hidden;
            width: 100%;
            max-width: 400px;
            height: 400px;
            position: relative;
            border: 3px solid #e0e0e0;
            border-radius: 8px;
        }

        .main-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            cursor: zoom-in;
            transition: transform 0.3s ease;
            position: absolute;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .main-image.show {
            opacity: 1;
        }

        .image-zoom-container:hover .main-image {
            transform: scale(1.5);
            cursor: move;
        }

        /* Smooth transition for image slider change */
        .main-image.fade-in {
            opacity: 0;
            transition: opacity 0.5s;
        }

        .main-image.show {
            opacity: 1;
        }

        /* Thumbnail slider styling */
        .thumbnail-slider {
            display: flex;
            justify-content: center;
            margin-top: 10px;
            gap: 10px;
        }

        .thumbnail-slider img {
            width: 60px;
            height: 60px;
            cursor: pointer;
            border: 2px solid #e0e0e0;
            border-radius: 4px;
            transition: border-color 0.3s, transform 0.3s;
        }

        .thumbnail-slider img:hover {
            border-color: #d32f2f;
            transform: scale(1.05);
        }

        /* Product details styling */
        .product-details-section {
            flex: 1;
            max-width: 50%;
            padding: 20px;
        }


        .product-details-section h2 {
            font-size: 1.5em;
            color: #333;
        }

        .product-details-section h1 {
            font-size: 2em;
            margin: 10px 0;
            color: #d32f2f;
        }

        .product-details-section p {
            font-size: 1em;
            color: #555;
            margin: 10px 0;
        }

        /* Buttons styling */
        .add-to-favorites,
        .store-locator {
            display: inline-block;
            margin: 10px 10px 0 0;
            padding: 10px 20px;
            color: #fff;
            background-color: #d32f2f;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .add-to-favorites:hover,
        .store-locator:hover {
            background-color: #b71c1c;
        }

        /* Responsive styling */
        @media (max-width: 768px) {
            .product-view-container {
                flex-direction: column;
                padding: 10px;
            }

            .product-image-section,
            .product-details-section {
                max-width: 100%;
            }
        }

        .full-width-container {
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }

        .line-wrapper {
            position: relative;
            width: 100%;
            height: 2px;
            /* Thin line */
            background-color: #ddd;
            margin-bottom: 15px;
        }

        .line-overlay {
            position: absolute;
            width: 25%;
            /* 25% overlay */
            height: 100%;
            background-color: #333;
        }

        .heading-description {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            text-transform: uppercase;
        }


        .product-tags {
            display: flex;
            /* Use flexbox for layout */
            flex-wrap: wrap;
            /* Allow tags to wrap onto the next line */
            margin: 10px 0;
            /* Margin above and below the tags */
            padding: 10px 0px;
            /* Padding around the tags */

        }

        .tag {
            display: inline-block;
            /* Inline block for tags */
            background-color: #f9f9f9;
            /* Light gray background for each tag */
            color: #333;
            /* Dark text color */
            padding: 8px 12px;
            /* Padding for tags */
            margin: 0 10px 10px 0;
            /* Margin between tags */
            border: 1px solid #ddd;
            /* Light border for definition */
            border-radius: 8px;
            /* Rounded corners for tags */
            text-decoration: none;
            /* Remove underline from links */
            font-weight: normal;
            /* Normal font weight */
            transition: background-color 0.3s, transform 0.2s;
            /* Smooth transition for hover effect */
        }

        .tag:hover {
            background-color: #d9d9d9;
            /* Darker gray on hover */
            transform: scale(1.05);
            /* Slightly enlarge on hover */
        }
    </style>
</head>

<body>
    <div class="product-view-container">
        <?php foreach ($params['products'] as $key => $product): ?>
            <div class="product-image-section">
                <div class="image-zoom-container" onmousemove="zoom(event)">
                    <!-- Main product image dynamically generated -->
                    <img src="<?= ASSETS ?>/img/uploads/<?= $product['productImage'] ?>"
                        alt="<?= $product['productName'] ?>" class="main-image show" id="mainImage<?= $key ?>">
                </div>

                <!-- Thumbnails dynamically generated -->
                <!-- Thumbnail Slider -->
                <div class="thumbnail-slider">
                    <!-- Main Thumbnail -->
                    <img src="<?= ASSETS ?>/img/uploads/<?= $params['products'][0]['productImage'] ?>" alt="Thumbnail 1"
                        data-image="<?= ASSETS ?>/img/uploads/<?= $params['products'][0]['productImage'] ?>"
                        onclick="changeImage(this)">

                    <!-- Additional Thumbnails -->
                    <?php foreach ($params['mediaFiles'] as $key => $media): ?>
                        <img src="<?= ASSETS ?>/img/uploads/<?= htmlspecialchars($media['mediaFile']) ?>"
                            alt="Thumbnail <?= $key + 2 ?>"
                            data-image="<?= ASSETS ?>/img/uploads/<?= htmlspecialchars($media['mediaFile']) ?>"
                            onclick="changeImage(this)">
                    <?php endforeach; ?>
                </div>


            </div>
            <div class="product-details-section">
                <h2><?= $product['productName'] ?></h2>
                <h1><?= $product['productShortDesc'] ?></h1>
                <p><strong>Product Code:</strong> <?= $product['productIdentify'] ?></p>
                <p><strong>Price:</strong> $<?= $product['productPrice'] ?></p>
                <button class="add-to-favorites">Add to Favorites</button>



                <div class="product-tags">
                    <?php
                    $tagsArray = explode(',', $product['productTags']);
                    foreach ($tagsArray as $tag) {
                        $tag = trim($tag);
                        echo "<span class='tag'>{$tag}</span> ";
                    }
                    ?>
                </div>

            </div>

            <!-- HTML Structure -->
            <div class="full-width-container">
                <div class="line-wrapper">
                    <div class="line-overlay"></div>
                </div>
                <h1 class="heading-description">Description</h1>
                <br>
                <br>
                <?= html_entity_decode($product['productDesc']) ?>
            </div>


        <?php endforeach; ?>

    </div>










    <script>
        // Function to smoothly change the image with fade effect
        function changeImage(element) {
            const mainImage = document.querySelector('.main-image');
            const newSrc = element.getAttribute('data-image');

            // Smooth transition
            mainImage.classList.remove('show');  // Hide the image
            setTimeout(() => {
                mainImage.src = newSrc;  // Change source after fade out
                mainImage.classList.add('show');  // Fade in the new image
            }, 300);  // Delay matches CSS transition duration
        }


        // Function to handle zooming and panning effect within image container
        function zoom(event) {
            const mainImage = event.target;
            const zoomContainer = mainImage.parentElement;
            const rect = zoomContainer.getBoundingClientRect();
            const x = event.clientX - rect.left;
            const y = event.clientY - rect.top;

            const xPercent = (x / rect.width) * 100;
            const yPercent = (y / rect.height) * 100;

            mainImage.style.transformOrigin = `${xPercent}% ${yPercent}%`;
        }
    </script>
</body>

</html>

<style>
    .carousel-container {
        max-width: 1200px;
        overflow: hidden;
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 15px;
    }

    .carousel-wrapper {
        display: flex;
        transition: transform 0.3s ease;
        cursor: grab;
    }

    .product-card {
        min-width: 25%;
        max-width: 300px;
        padding: 15px;
        text-align: center;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        margin: 0 10px;

    }

    .hover-animation {
        position: relative;
        overflow: hidden;
        width: 100%;
        height: 180px;
        border-radius: 10px;
    }

    .image-front,
    .image-back {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: opacity 0.3s ease;
        position: absolute;
        top: 0;
        left: 0;
    }

    .image-back {
        opacity: 0;
    }

    .hover-animation:hover .image-back {
        opacity: 1;
    }

    .product-info {
        padding-top: 8px;
    }

    .product-name {
        font-size: 1.1em;
        margin: 8px 0 4px;
        color: #333;
        font-weight: 600;
    }

    .product-description {
        color: #777;
        font-size: 0.9em;
        margin-bottom: 6px;
    }

    .price-cart {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 5px;
    }

    .product-price {
        color: #007bff;
        font-size: 1em;
        font-weight: 600;
    }

    .cart-container {
        display: flex;
        align-items: center;
        cursor: pointer;
        background: linear-gradient(135deg, #007bff, #0056b3);
        color: #fff;
        padding: 5px 9px;
        border-radius: 15px;
        font-weight: 500;
        font-size: 0.8em;
        transition: background 0.3s ease;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
    }

    .cart-text {
        margin-right: 4px;
    }

    /* Navigation Buttons */
    .carousel-button {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        border: none;
        padding: 15px;
        cursor: pointer;
        font-size: 1.5em;
        border-radius: 12px;
        width: 45px;
        height: 45px;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 10;
        transition: opacity 0.3s ease;
    }

    .carousel-button.left {
        left: 10px;
    }

    .carousel-button.right {
        right: 10px;
    }

    /* Inactive Button Styling */
    .carousel-button.inactive {
        opacity: 0.3;
        cursor: not-allowed;
    }
</style>

<div class="heading sub-heading">
    <h1>Related Products
    </h1>
</div>
<div class="carousel-container">
    <button class="carousel-button left inactive" onclick="moveLeft()" id="leftBtn">
        <i class="uil uil-angle-left"></i>
    </button>
    <div class="carousel-wrapper" id="carousel">
        <?php foreach ($params['relatedProducts'] as $product): ?>
            <div class="product-card">
                <div class="hover-animation">
                    <img src="https://www.empolobath.com/wp-content/uploads/2023/12/eb734w.jpg" class="image-back"
                        alt="Product Image Back">
                    <img src="<?= ASSETS ?>/img/uploads/<?= $product["productImage"] ?>" class="image-front"
                        alt="Product Image Front">
                </div>
                <div class="product-info">
                    <div class="product-name"><?= $product['productName'] ?></div>
                    <div class="product-description"><?= substr($product['productDesc'], 0, 40) ?></div>
                    <div class="price-cart">
                        <div class="product-price">$<?= $product['productPrice'] ?></div>
                        <div class="cart-container"
                            onclick="window.location.href = '<?= ROOT ?>/product/<?= $product['productIdentify'] ?>'">
                            <span class="cart-text">READ MORE</span>
                            <i class="uil uil-shopping-cart"></i>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <button class="carousel-button right" onclick="moveRight()" id="rightBtn">
        <i class="uil uil-angle-right"></i>
    </button>
</div>

<script>
    // Carousel functionality remains the same as in previous examples
    // Update buttons when reach the beginning or end

    const carousel = document.getElementById("carousel");
    const cardWidth = carousel.querySelector(".product-card").offsetWidth + 20; // includes margin
    const visibleCards = 4;
    const maxScroll = carousel.children.length - visibleCards;
    let scrollPosition = 0;

    const leftBtn = document.getElementById("leftBtn");
    const rightBtn = document.getElementById("rightBtn");

    function moveLeft() {
        if (scrollPosition > 0) {
            scrollPosition--;
            updateCarouselPosition();
        }
    }

    function moveRight() {
        if (scrollPosition < maxScroll) {
            scrollPosition++;
            updateCarouselPosition();
        }
    }

    function updateCarouselPosition() {
        carousel.style.transform = `translateX(-${scrollPosition * cardWidth}px)`;

        // Disable left button if at start
        if (scrollPosition === 0) {
            leftBtn.classList.add("inactive");
        } else {
            leftBtn.classList.remove("inactive");
        }

        // Disable right button if at end
        if (scrollPosition === maxScroll) {
            rightBtn.classList.add("inactive");
        } else {
            rightBtn.classList.remove("inactive");
        }
    }

    updateCarouselPosition(); // Initial check for button states
    // Drag Functionality (same as previous implementation)
    let isDragging = false;
    let startPos = 0;
    let currentTranslate = 0;
    let prevTranslate = 0;

    carousel.addEventListener("mousedown", (e) => {
        isDragging = true;
        startPos = e.pageX - currentTranslate;
        carousel.style.transition = "none";
    });

    carousel.addEventListener("mouseup", () => {
        isDragging = false;
        carousel.style.transition = "transform 0.3s ease";
        snapToCard();
    });

    carousel.addEventListener("mousemove", (e) => {
        if (!isDragging) return;
        const currentPosition = e.pageX - startPos;
        currentTranslate = prevTranslate + currentPosition;

        if (currentTranslate <= 0 && currentTranslate >= -maxScroll * cardWidth) {
            carousel.style.transform = `translateX(${currentTranslate}px)`;
        }
    });

    function snapToCard() {
        scrollPosition = Math.round(-currentTranslate / cardWidth);
        scrollPosition = Math.max(0, Math.min(scrollPosition, maxScroll));
        updateCarouselPosition();
    }

    carousel.addEventListener("mouseleave", () => {
        isDragging = false;
        snapToCard();
    });

    carousel.addEventListener("touchstart", (e) => {
        isDragging = true;
        startPos = e.touches[0].clientX - currentTranslate;
        carousel.style.transition = "none";
    });

    carousel.addEventListener("touchmove", (e) => {
        if (!isDragging) return;
        const currentPosition = e.touches[0].clientX - startPos;
        currentTranslate = prevTranslate + currentPosition;

        if (currentTranslate <= 0 && currentTranslate >= -maxScroll * cardWidth) {
            carousel.style.transform = `translateX(${currentTranslate}px)`;
        }
    });

    carousel.addEventListener("touchend", () => {
        isDragging = false;
        snapToCard();
    });
</script>