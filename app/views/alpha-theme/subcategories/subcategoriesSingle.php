  <div class="data-table">
  <div class="table-container">
  <h2> Display subcategories </h2>
<table>
  <thead>
    <tr>
      <th>#</th>
      <th>Subcategory Id</th>
      <th>Subcategory Name</th>
      <th>Subcategory Desc</th>
      <th>Subcategory Uri</th>
      <th>Subcategory Feature Image</th>
      <th>Subcategory Updated</th>
      <th>Subcategory Identify</th>
    </tr>
  </thead>
  <tbody>
<?php foreach($params['subcategories'] as $key => $subcategories): ?>
    <tr>
      <td><?= $key + 1 ?></td>
<td><?= $subcategories['subcategoryId'] ?></td>
<td><?= $subcategories['subcategoryName'] ?></td>
<td><?= $subcategories['subcategoryDesc'] ?></td>
<td><?= $subcategories['subcategoryUri'] ?></td>
<td><?= $subcategories['subcategoryFeatureImage'] ?></td>
<td><?= $subcategories['subcategoryUpdated'] ?></td>
<td><?= $subcategories['subcategoryIdentify'] ?></td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
</tbody>
</table>
 <div><aside class="row"><a href="<?= ROOT ?>/admin/subcategories" class="cancel-btn">back</a></aside> </div>
</div>
</div>
