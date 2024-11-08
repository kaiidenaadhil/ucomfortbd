<div class="search-container">
<form class="search-form" action="<?= ROOT ?>/admin/subcategories/" method="get">
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
<h3>Subcategories List</h3> <a href="<?= ROOT ?>/admin/subcategories/build" class="gradient-btn">add New subcategories</a>
</div>
<div class="data-table">
<div class="table-container">
<?php if (count($params['subcategories']) > 0): ?>
<table>
<thead>
<tr>
<th>#</th>
<th>Subcategory Name</th>
<th>Subcategory Desc</th>
<th>Subcategory Uri</th>
<th>Subcategory Feature Image</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php foreach($params['subcategories'] as $key => $subcategories): ?>
<tr>
<td><?= $key + 1 ?></td>
<td><?= $subcategories['subcategoryName'] ?></td>
<td><?= $subcategories['subcategoryDesc'] ?></td>
<td><?= $subcategories['subcategoryUri'] ?></td>
<td><?= $subcategories['subcategoryFeatureImage'] ?></td>
<td>
<a href="<?= ROOT ?>/admin/subcategories/<?= $subcategories['subcategoryIdentify'] ?>">Show</a>
<a href="<?= ROOT ?>/admin/subcategories/<?= $subcategories['subcategoryIdentify'] ?>/modify">Edit</a>
<a href="<?= ROOT ?>/admin/subcategories/<?= $subcategories['subcategoryIdentify'] ?>/destroy">Delete</a>
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
<a href="<?= ROOT ?>/admin/subcategories/build">Add a Record.</a>
<?php endif; ?>
</div>
