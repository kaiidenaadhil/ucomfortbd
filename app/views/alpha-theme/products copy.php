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
    background-color: #f8f9fa;
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
        display: none;
    }
}
</style>

<div class="heading sub-heading" style="margin-top:1rem;">
  <h1>HOT PRODUCTS
    <span>YOUR PARTNER FOR BATH ROOM SOLUTION</span>
  </h1>
</div>
<div class="container">
    <aside class="sidebar">
        <h2>Filters</h2>

        

        <label for="productTags">Select Category:</label>
        <select id="category">
            <option value="">-- Select Category --</option>
            <?php foreach ($params['categories'] as $category) {
                echo '<option value="' . $category['categoryId'] . '">' . $category['categoryName'] . '</option>';
            }?>
      </select>

        <label for="subcategory">Subcategory</label>
        <select id="subcategory" name="subcategoryId">
            <?php if (isset($params['subcategoryUri'])): ?>
                <option value="<?= $params['subcategoryUri'] ?>" selected><?= $params['subcategoryName'] ?></option>
            <?php endif; ?>
        </select>



        <label for="price-range">Price Range</label>
        <select id="price-range">
            <option value="low">Low to High</option>
            <option value="high">High to Low</option>
        </select>
    </aside>

    <main class="product-panel">
        <?php foreach ($params['products'] as $product) : ?>
            <div class="product-card">
                <div class="hover-animation">
                    <img src="https://www.empolobath.com/wp-content/uploads/2023/12/eb734w.jpg" class="image-back" alt="Product Image Back">
                    <img src="<?=ASSETS?>/img/uploads/<?=$product["productImage"]?>" class="image-front" alt="Product Image Front">
                </div>
                <div class="product-info">
                    <div class="product-name"><?=$product['productName']?></div>
                    <div class="product-description"><?= substr($product['productDesc'], 0, 40) ?></div>
                    <div class="price-cart">
                        <div class="product-price">$<?=$product['productPrice']?></div>
                        <div class="cart-container" onclick="window.location.href = '<?=ROOT?>/product/<?=$product['productIdentify']?>'">
                            <span class="cart-text">READ MORE</span> 
                            <i class="uil uil-shopping-cart"></i>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </main>
</div>

<script>
    // When category changes, trigger the AJAX request to load subcategories
    $('#category').on('change', function() {
        var categoryId = $(this).val();  // Get the selected category ID

        // Clear the subcategory dropdown
        $('#subcategory').html('<option value="">-- Select Subcategory --</option>');

        if (categoryId) {
            $.ajax({
                url: '<?=ROOT?>/admin/get-subcategories/' + categoryId,  // Dynamic category ID in the URL
                type: 'GET',  // Use GET method
                success: function(data) {
                    // Populate subcategories dropdown with the received data
                    $('#subcategory').append(data);
                }
            });
        }
    });
</script>