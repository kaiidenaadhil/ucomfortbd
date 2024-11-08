<div class="search-container">
<form class="search-form" action="<?= ROOT ?>/admin/network/" method="get">
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
<h3>Network List</h3> <a href="<?= ROOT ?>/admin/network/build" class="gradient-btn">add New network</a>
</div>
<div class="data-table">
<div class="table-container">
<?php if (count($params['network']) > 0): ?>
<table>
<thead>
<tr>
<th>#</th>
<th>Network Title</th>
<th>Network Country</th>
<th>Network City</th>
<th>Network Store</th>
<th>Network Phone</th>
<th>Network Address</th>
<th>Network Image</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php foreach($params['network'] as $key => $network): ?>
<tr>
<td><?= $key + 1 ?></td>
<td><?= $network['networkTitle'] ?></td>
<td><?= $network['networkCountry'] ?></td>
<td><?= $network['networkCity'] ?></td>
<td><?= $network['networkStore'] ?></td>
<td><?= $network['networkPhone'] ?></td>
<td><?= $network['networkAddress'] ?></td>
<td><?= $network['networkImage'] ?></td>
<td>
<a href="<?= ROOT ?>/admin/network/<?= $network['networkIdentify'] ?>">Show</a>
<a href="<?= ROOT ?>/admin/network/<?= $network['networkIdentify'] ?>/modify">Edit</a>
<a href="<?= ROOT ?>/admin/network/<?= $network['networkIdentify'] ?>/destroy">Delete</a>
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
<a href="<?= ROOT ?>/admin/network/build">Add a Record.</a>
<?php endif; ?>
</div>
