<div class="search-container">
<form class="search-form" action="<?= ROOT ?>/admin/categories/" method="get">
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
<h3>Categories List</h3> <a href="<?= ROOT ?>/admin/categories/build" class="gradient-btn">add New categories</a>
</div>
<div class="data-table">
<div class="table-container">
<?php if (count($params['categories']) > 0): ?>
<table>
<thead>
<tr>
<th>#</th>
<th>Category Name</th>
<th>Category Desc</th>
<th>Category Uri</th>
<th>Category Feature Image</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php foreach($params['categories'] as $key => $categories): ?>
<tr>
<td><?= $key + 1 ?></td>
<td><?= $categories['categoryName'] ?></td>
<td><?= $categories['categoryDesc'] ?></td>
<td><?= $categories['categoryUri'] ?></td>
<td><?= $categories['categoryFeatureImage'] ?></td>
<td>
<a href="<?= ROOT ?>/admin/categories/<?= $categories['categoryIdentify'] ?>">Show</a>
<a href="<?= ROOT ?>/admin/categories/<?= $categories['categoryIdentify'] ?>/modify">Edit</a>
<a href="<?= ROOT ?>/admin/categories/<?= $categories['categoryIdentify'] ?>/destroy">Delete</a>
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
<a href="<?= ROOT ?>/admin/categories/build">Add a Record.</a>
<?php endif; ?>
</div>
