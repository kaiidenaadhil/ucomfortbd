<div class="search-container">
<form class="search-form" action="<?= ROOT ?>/admin/projects/" method="get">
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
<h3>Projects List</h3> <a href="<?= ROOT ?>/admin/projects/build" class="gradient-btn">add New projects</a>
</div>
<div class="data-table">
<div class="table-container">
<?php if (count($params['projects']) > 0): ?>
<table>
<thead>
<tr>
<th>#</th>
<th>Project Flag Code</th>
<th>Project Image</th>
<th>Project Country Name</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php foreach($params['projects'] as $key => $projects): ?>
<tr>
<td><?= $key + 1 ?></td>
<td><?= $projects['projectFlagCode'] ?></td>
<td><?= $projects['projectImage'] ?></td>
<td><?= $projects['projectCountryName'] ?></td>
<td>
<a href="<?= ROOT ?>/admin/projects/<?= $projects['projectIdentify'] ?>">Show</a>
<a href="<?= ROOT ?>/admin/projects/<?= $projects['projectIdentify'] ?>/modify">Edit</a>
<a href="<?= ROOT ?>/admin/projects/<?= $projects['projectIdentify'] ?>/destroy">Delete</a>
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
<a href="<?= ROOT ?>/admin/projects/build">Add a Record.</a>
<?php endif; ?>
</div>
