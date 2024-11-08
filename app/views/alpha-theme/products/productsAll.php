<div class="search-container">
<form class="search-form" action="<?= ROOT ?>/admin/products/" method="get">
<input type="text" name="search" placeholder="Search">
<button type="submit" class="gradient-btn">Search</button>
</form>
</div>
<div class="data-info">
<?php if (isset($_SESSION['success_message'])): ?>
<p><?= $_SESSION['success_message'] ?></p>
<?php unset($_SESSION['success_message']); ?>
<?php endif; ?>
</div>
<div class="data-info">
<h3>Products List</h3> <a href="<?= ROOT ?>/admin/products/build" class="gradient-btn">add New products</a>
</div>
<div class="data-table">
<div class="table-container">
<?php if (count($params['products']) > 0): ?>
<table>
<thead>
<tr>
<th>#</th>
<th>Product Name</th>
<th>Product Short Desc</th>
<th>Product Price</th>
<th>Product Image</th>
<th>Product Tags</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php foreach($params['products'] as $key => $products): ?>
<tr>
<td><?= $key + 1 ?></td>
<td><?= $products['productName'] ?></td>
<td><?= $products['productShortDesc'] ?></td>
<td><?= $products['productPrice'] ?></td>
<td><?= $products['productImage'] ?></td>
<td><?= $products['productTags'] ?></td>
<td>
<a href="<?= ROOT ?>/admin/products/<?= $products['productIdentify'] ?>">Show</a>
<a href="<?= ROOT ?>/admin/products/<?= $products['productIdentify'] ?>/modify">Edit</a>
<a href="<?= ROOT ?>/admin/products/<?= $products['productIdentify'] ?>/destroy">Delete</a>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
</div>
<div class="pagination-container">
<?= $params["pagination"] ?>
</div>
<?php else: ?>
<p>No Record to Display.</p>
<a href="<?= ROOT ?>/admin/products/build">Add a Record.</a>
<?php endif; ?>
</div>
