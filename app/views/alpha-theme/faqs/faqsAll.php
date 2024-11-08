<div class="search-container">
<form class="search-form" action="<?= ROOT ?>/admin/faqs/" method="get">
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
<h3>Faqs List</h3> <a href="<?= ROOT ?>/admin/faqs/build" class="gradient-btn">add New faqs</a>
</div>
<div class="data-table">
<div class="table-container">
<?php if (count($params['faqs']) > 0): ?>
<table>
<thead>
<tr>
<th>#</th>
<th>Faq Title</th>
<th>Faq Desc</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php foreach($params['faqs'] as $key => $faqs): ?>
<tr>
<td><?= $key + 1 ?></td>
<td><?= $faqs['faqTitle'] ?></td>
<td><?= $faqs['faqDesc'] ?></td>
<td>
<a href="<?= ROOT ?>/admin/faqs/<?= $faqs['faqIdentify'] ?>">Show</a>
<a href="<?= ROOT ?>/admin/faqs/<?= $faqs['faqIdentify'] ?>/modify">Edit</a>
<a href="<?= ROOT ?>/admin/faqs/<?= $faqs['faqIdentify'] ?>/destroy">Delete</a>
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
<a href="<?= ROOT ?>/admin/faqs/build">Add a Record.</a>
<?php endif; ?>
</div>
