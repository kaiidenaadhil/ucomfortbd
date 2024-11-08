  <div class="data-table">
  <div class="table-container">
  <h2> Display categories </h2>
<table>
  <thead>
    <tr>
      <th>#</th>
      <th>Category Id</th>
      <th>Category Name</th>
      <th>Category Desc</th>
      <th>Category Uri</th>
      <th>Category Feature Image</th>
      <th>Category Updated</th>
      <th>Category Identify</th>
    </tr>
  </thead>
  <tbody>
<?php foreach($params['categories'] as $key => $categories): ?>
    <tr>
      <td><?= $key + 1 ?></td>
<td><?= $categories['categoryId'] ?></td>
<td><?= $categories['categoryName'] ?></td>
<td><?= $categories['categoryDesc'] ?></td>
<td><?= $categories['categoryUri'] ?></td>
<td><?= $categories['categoryFeatureImage'] ?></td>
<td><?= $categories['categoryUpdated'] ?></td>
<td><?= $categories['categoryIdentify'] ?></td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
</tbody>
</table>
 <div><aside class="row"><a href="<?= ROOT ?>/admin/categories" class="cancel-btn">back</a></aside> </div>
</div>
</div>
