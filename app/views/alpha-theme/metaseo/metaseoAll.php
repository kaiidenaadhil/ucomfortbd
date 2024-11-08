<div class="search-container">
<form class="search-form" action="<?= ROOT ?>/admin/metaseo/" method="get">
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
<h3>Metaseo List</h3> <a href="<?= ROOT ?>/admin/metaseo/build" class="gradient-btn">add New metaseo</a>
</div>
<div class="data-table">
<div class="table-container">
<?php if (count($params['metaseo']) > 0): ?>
<table>
<thead>
<tr>
<th>#</th>
<th>Page Slug</th>
<th>Meta Title</th>
<th>Meta Description</th>
<th>Meta Keywords</th>
<th>Image Feature</th>
<th>Image Alt</th>
<th>Image Caption</th>
<th>Canonical U R L</th>
<th>Meta Author</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php foreach($params['metaseo'] as $key => $metaseo): ?>
<tr>
<td><?= $key + 1 ?></td>
<td><?= $metaseo['pageSlug'] ?></td>
<td><?= $metaseo['metaTitle'] ?></td>
<td><?= $metaseo['metaDescription'] ?></td>
<td><?= $metaseo['metaKeywords'] ?></td>
<td><?= $metaseo['imageFeature'] ?></td>
<td><?= $metaseo['imageAlt'] ?></td>
<td><?= $metaseo['imageCaption'] ?></td>
<td><?= $metaseo['canonicalURL'] ?></td>
<td><?= $metaseo['metaAuthor'] ?></td>
<td>
<a href="<?= ROOT ?>/admin/metaseo/<?= $metaseo['metaseoIdentify'] ?>">Show</a>
<a href="<?= ROOT ?>/admin/metaseo/<?= $metaseo['metaseoIdentify'] ?>/modify">Edit</a>
<a href="<?= ROOT ?>/admin/metaseo/<?= $metaseo['metaseoIdentify'] ?>/destroy">Delete</a>
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
<a href="<?= ROOT ?>/admin/metaseo/build">Add a Record.</a>
<?php endif; ?>
</div>
