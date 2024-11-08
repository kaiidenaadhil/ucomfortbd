<div class="search-container">
<form class="search-form" action="<?= ROOT ?>/admin/campaign/" method="get">
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
<h3>Campaign List</h3> <a href="<?= ROOT ?>/admin/campaign/build" class="gradient-btn">add New campaign</a>
</div>
<div class="data-table">
<div class="table-container">
<?php if (count($params['campaign']) > 0): ?>
<table>
<thead>
<tr>
<th>#</th>
<th>Campain Title</th>
<th>Campaign Subtitle</th>
<th>Campaign Media</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php foreach($params['campaign'] as $key => $campaign): ?>
<tr>
<td><?= $key + 1 ?></td>
<td><?= $campaign['campainTitle'] ?></td>
<td><?= $campaign['campaignSubtitle'] ?></td>
<td><?= $campaign['campaignMedia'] ?></td>
<td>
<a href="<?= ROOT ?>/admin/campaign/<?= $campaign['campaignIdentify'] ?>">Show</a>
<a href="<?= ROOT ?>/admin/campaign/<?= $campaign['campaignIdentify'] ?>/modify">Edit</a>
<a href="<?= ROOT ?>/admin/campaign/<?= $campaign['campaignIdentify'] ?>/destroy">Delete</a>
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
<a href="<?= ROOT ?>/admin/campaign/build">Add a Record.</a>
<?php endif; ?>
</div>
