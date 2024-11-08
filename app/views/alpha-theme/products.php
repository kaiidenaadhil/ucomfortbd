
<style>
/* Container */
.container {
    display: flex;
    max-width: 1200px;
    width: 100%;
    margin: 0 auto;
    padding: 15px;
    align-items: flex-start;
}

/* Sidebar */
.sidebar {
    width: 250px;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    margin-right: 15px;
    position: sticky;
    top: 120px;
}

.sidebar h2 {
    font-size: 1.3em;
    margin-bottom: 15px;
    color: #444;
    font-weight: 600;
}

.sidebar label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    color: #555;
}

.sidebar select {
    width: 100%;
    padding: 8px;
    margin-bottom: 12px;
    border-radius: 5px;
    border: 1px solid #ddd;
    transition: border-color 0.3s ease;
}

.sidebar select:hover {
    border-color: #007bff;
}

/* Product Panel */
.product-panel {
    display: grid;
    gap: 15px;
    flex: 1;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
}

.product-card {
    text-align: center;
    border-radius: 10px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.product-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
}

/* Hover Animation for Images */
.hover-animation {
    position: relative;
    overflow: hidden;
    width: 100%;
    height: 180px;
    border-radius: 10px;
}

.image-front, .image-back {
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

/* Price and Cart Button */
.price-cart {
    display: flex;
    justify-content: space-between;
    align-items: center;
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
    transition: background 0.3s ease, transform 0.2s ease;
    box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
    position: relative;
    top: -3px;
}

.cart-container:hover {
    background: linear-gradient(135deg, #0056b3, #007bff);
    transform: scale(1.05);
}

.cart-container .cart-text {
    margin-right: 4px;
}

.cart-container i {
    font-size: 1.1em;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .product-panel {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .product-panel {
        grid-template-columns: repeat(1, 1fr);
    }


    .sidebar {
        position: relative;
        width: calc(100% - 35px);
        padding: 15px;
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        margin-right: 15px;
        top: 10px;
    }

.container{
    padding: 5px;
}
}
</style>
<style>
          .price-range-container {
            max-width: 500px;
            margin: 25px auto;
            font-family: Arial, sans-serif;
        }

        .range-slider {
            position: relative;
            height: 5px;
            background: #ddd;
            border-radius: 5px;
        }

        .range-slider input[type="range"] {
            position: absolute;
            width: 100%;
            height: 5px;
            -webkit-appearance: none;
            background: transparent;
            pointer-events: none;
        }

        .range-slider input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #ff4500;
            cursor: pointer;
            border: 2px solid #fff;
            position: relative;
            z-index: 2;
            pointer-events: auto;
        }

        .range-slider input[type="range"]::-moz-range-thumb {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #ff4500;
            cursor: pointer;
            border: 2px solid #fff;
            pointer-events: auto;
        }

        .price-display {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            font-size: 16px;
            font-weight: bold;
        }
     .filter-panel {
    border-radius: 8px;
    max-width: 350px;
    margin: 20px;
    flex: 1;

        }

        .product-panel {
            flex: 3;
            padding: 20px;
            margin: 20px;
        }

        .filter-panel h2, .price-range, .sorting-section, .category-section {
            margin-bottom: 15px;
        }

        .price-range {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sorting-section label {
            display: block;
            margin-bottom: 5px;
        }

        .category-header, .subcategory-list {
            display: flex;
            flex-direction: column;
        }

        .category-header {
            cursor: pointer;
            padding: 10px;
            border-bottom:2px solid #f5f5f5;
            transition: background-color 0.3s;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-direction: row;
        }

        .subcategory-list {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease;
            padding-left: 15px;
            margin-top: 5px;
        }

        .subcategory-list.show {
            max-height: 500px;
        }

        .icon.rotate {
            transform: rotate(180deg);
        }

        /* Hide filter toggle button on larger screens */
        .filter-toggle {
            display: none;
        }

        /* Responsive Styles for mobile */
        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }

            .filter-toggle {
                width: 95%;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
        cursor: pointer;
        background-color: #555;
        color: #fff;
        border: none;
        font-size: 18px;
        margin: 10px;
        border-radius: 8px;
            }

            .filter-panel {
                display: none;
                max-width: 100%;
            }

            .filter-panel.active {
                display: block;
            }
        }

        #goButton {
    display: inline-block;
    width: 100%;
    padding: 10px;
    margin-top: 15px;
    background-color: #007BFF; /* Primary blue color */
    color: #fff;
    font-size: 16px;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-align: center;
    transition: background-color 0.3s ease;
}

#goButton:hover {
    background-color: #0056b3; /* Darker blue on hover */
}

#goButton:active {
    background-color: #004494; /* Even darker blue on click */
    transform: scale(0.98); /* Slightly smaller on click for effect */
}

#goButton:focus {
    outline: none;
    box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.5); /* Light blue outline on focus */
}
.subcategory-link{
    text-decoration: none;
    color: black;
    padding: 0.5rem 0.2rem;

}
.subcategory-link:hover{
color:#ff4500
}
</style>
<div class="heading sub-heading" style="margin-top:1rem;">
  <h1> PRODUCTS
  </h1>
</div>


<div class="container">
    <!-- Filter Toggle Button for Mobile View -->
    <button class="filter-toggle" onclick="toggleFilter()">
        <i class="fas fa-filter"></i> Filter
    </button>
    <aside class="sidebar">
    <!-- Filter Panel -->
    <div class="filter-panel" id="filterPanel">

        <!-- Price Range Filter -->
        <div class="price-range-container">
            <h2>Filter Price Range</h2>
            <div class="range-slider">
                <input type="range" id="min-price" min="0" max="500000" value="100000">
                <input type="range" id="max-price" min="0" max="500000" value="400000">
            </div>
            <div class="price-display">
                <span id="min-price-output"></span> -
                <span id="max-price-output"></span>
            </div>
        </div>

        <!-- Sorting Section -->
        <!-- <div class="sorting-section">
            <h2>Sorting</h2>
            <label><input type="radio" name="sort" value="low-high"> Price: low to high</label>
            <label><input type="radio" name="sort" value="high-low"> Price: high to low</label>
            <label><input type="radio" name="sort" value="a-z"> Name A to Z</label>
            <label><input type="radio" name="sort" value="z-a"> Name Z to A</label>
            <label><input type="radio" name="sort" value="newest"> Newest first</label>
            <label><input type="radio" name="sort" value="oldest"> Oldest first</label>
        </div> -->

        <?php foreach ($params['categories'] as $category): ?>
    <div class="category-item">
        <div class="category-header" onclick="toggleCategory(<?php echo $category['categoryId']; ?>)">
            <a class="subcategory-link" href="<?=ROOT?>/products/<?=$category['categoryUri']?>"><?php echo htmlspecialchars($category['categoryName']); ?></a>
            <span class="icon" id="icon-<?php echo $category['categoryId']; ?>">▾</span>
        </div>
        <div class="subcategory-list" id="subcategory-<?php echo $category['categoryId']; ?>">
            <?php if (!empty($category['subcategories'])): ?>
                <?php foreach ($category['subcategories'] as $subcategory): ?>
                    <a class="subcategory-link" href="<?=ROOT?>/products/<?=$subcategory['subcategoryUri']?>">
                        <?php echo htmlspecialchars($subcategory['subcategoryName']); ?>
                    </a>
                <?php endforeach;?>
            <?php endif;?>
        </div>
    </div>
<?php endforeach;?>

        <!-- Go Button -->
        <button id="goButton">Go</button>

    </div>
</aside>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    const minPriceInput = document.getElementById("min-price");
    const maxPriceInput = document.getElementById("max-price");
    const minPriceOutput = document.getElementById("min-price-output");
    const maxPriceOutput = document.getElementById("max-price-output");
    const goButton = document.getElementById("goButton");

    // Display the initial values for min and max price
    minPriceOutput.textContent = minPriceInput.value;
    maxPriceOutput.textContent = maxPriceInput.value;

    // Update displayed values as range inputs are adjusted
    minPriceInput.addEventListener("input", function() {
        minPriceOutput.textContent = minPriceInput.value;
    });
    maxPriceInput.addEventListener("input", function() {
        maxPriceOutput.textContent = maxPriceInput.value;
    });

    goButton.addEventListener("click", function() {
        let params = new URLSearchParams();

        // Add price range filters
        params.append("min_price", minPriceInput.value);
        params.append("max_price", maxPriceInput.value);

        // Add sorting filter
        const selectedSort = document.querySelector('input[name="sort"]:checked');
        if (selectedSort) {
            params.append("sort", selectedSort.value);
        }

        // Add category filters
        const selectedCategories = Array.from(document.querySelectorAll('input[name="subcategory"]:checked'))
            .map(cb => cb.value);
        if (selectedCategories.length > 0) {
            params.append("categories", selectedCategories.join(","));
        }

        // Redirect to the filtered URL
        window.location.href = "?" + params.toString();
    });
});

</script>
    <main class="product-panel">
        <?php foreach ($params['products'] as $product): ?>
            <div class="product-card">
                <div class="hover-animation">
                    <img src="https://www.empolobath.com/wp-content/uploads/2023/12/eb734w.jpg" class="image-back" alt="Product Image Back">
                    <img src="<?=ASSETS?>/img/uploads/<?=$product["productImage"]?>" class="image-front" alt="Product Image Front">
                </div>
                <div class="product-info">
                    <div class="product-name"><?=$product['productName']?></div>
                    <div class="product-description"><?=substr($product['productDesc'], 0, 40)?></div>
                    <div class="price-cart">
                        <div class="product-price">$<?=$product['productPrice']?></div>
                        <div class="cart-container" onclick="window.location.href = '<?=ROOT?>/product/<?=$product['productIdentify']?>'">
                            <span class="cart-text">READ MORE</span>
                            <i class="uil uil-shopping-cart"></i>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>

    </main>
</div>
<?php if (isset($params["pagination"])) {?>
<div class="pagination-container">
<?=$params["pagination"]?>
</div>
<?php }?>



<div class="blog-container">
<?php foreach($params['blog'] as $key => $blog): ?>
        <article class="article" style="padding:1rem 0rem;">
            <h1><?= $blog['blogTitle'] ?></h1>
            <h2><?= $blog['blogSubtitle'] ?></h2>
            <p><?= $blog['blogContent'] ?></p>
        </article>
        <?php endforeach; ?>
        
</div>

<div style="padding-top:50px;"></div>

<script>
        const minPriceInput = document.getElementById('min-price');
        const maxPriceInput = document.getElementById('max-price');
        const minPriceOutput = document.getElementById('min-price-output');
        const maxPriceOutput = document.getElementById('max-price-output');

        function updatePriceOutputs() {
            minPriceOutput.textContent = `Min: $${parseInt(minPriceInput.value).toLocaleString()}`;
            maxPriceOutput.textContent = `Max: $${parseInt(maxPriceInput.value).toLocaleString()}`;
        }

        minPriceInput.addEventListener('input', () => {
            if (parseInt(minPriceInput.value) > parseInt(maxPriceInput.value)) {
                minPriceInput.value = maxPriceInput.value;
            }
            updatePriceOutputs();
        });

        maxPriceInput.addEventListener('input', () => {
            if (parseInt(maxPriceInput.value) < parseInt(minPriceInput.value)) {
                maxPriceInput.value = minPriceInput.value;
            }
            updatePriceOutputs();
        });

        // Initialize the outputs
        updatePriceOutputs();
    </script>
<script>

function toggleCategory(categoryId) {
    const subcategoryList = document.getElementById("subcategory-" + categoryId);
    const icon = document.getElementById("icon-" + categoryId);

    if (subcategoryList.classList.contains("show")) {
        subcategoryList.classList.remove("show");
        icon.classList.remove("rotate");
    } else {
        subcategoryList.classList.add("show");
        icon.classList.add("rotate");
    }
}


        function toggleFilter() {
            document.getElementById('filterPanel').classList.toggle('active');
        }
    </script>