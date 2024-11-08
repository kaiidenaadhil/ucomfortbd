<div class="search-container">
<form class="search-form" action="<?= ROOT ?>/admin/blog/" method="get">
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
<h3>Blog List</h3> <a href="<?= ROOT ?>/admin/blog/build" class="gradient-btn">add New blog</a>
</div>
<div class="data-table">
<div class="table-container">
<?php if (count($params['blog']) > 0): ?>
<table>
<thead>
<tr>
<th>#</th>
<th>Blog Title</th>
<th>Blog Subtitle</th>
<th>Blog Author</th>
<th>Blog Image</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php foreach($params['blog'] as $key => $blog): ?>
<tr>
<td><?= $key + 1 ?></td>
<td><?= $blog['blogTitle'] ?></td>
<td><?= $blog['blogSubtitle'] ?></td>
<td><?= $blog['blogAuthor'] ?></td>
<td><?= $blog['blogImage'] ?></td>
<td>
<a href="<?= ROOT ?>/admin/blog/<?= $blog['blogIdentify'] ?>">Show</a>
<a href="<?= ROOT ?>/admin/blog/<?= $blog['blogIdentify'] ?>/modify">Edit</a>
<a href="<?= ROOT ?>/admin/blog/<?= $blog['blogIdentify'] ?>/destroy">Delete</a>
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
<a href="<?= ROOT ?>/admin/blog/build">Add a Record.</a>
<?php endif; ?>
</div>
