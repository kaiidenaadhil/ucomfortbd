  <div class="data-table">
  <div class="table-container">
  <h2> Display metaseo </h2>
<table>
  <thead>
    <tr>
      <th>#</th>
      <th>Id</th>
      <th>Page Slug</th>
      <th>Meta Title</th>
      <th>Meta Description</th>
      <th>Meta Keywords</th>
      <th>Image Feature</th>
      <th>Image Alt</th>
      <th>Image Caption</th>
      <th>Canonical U R L</th>
      <th>Meta Author</th>
      <th>Metaseo Updated</th>
      <th>Metaseo Identify</th>
    </tr>
  </thead>
  <tbody>
<?php foreach($params['metaseo'] as $key => $metaseo): ?>
    <tr>
      <td><?= $key + 1 ?></td>
<td><?= $metaseo['id'] ?></td>
<td><?= $metaseo['pageSlug'] ?></td>
<td><?= $metaseo['metaTitle'] ?></td>
<td><?= $metaseo['metaDescription'] ?></td>
<td><?= $metaseo['metaKeywords'] ?></td>
<td><?= $metaseo['imageFeature'] ?></td>
<td><?= $metaseo['imageAlt'] ?></td>
<td><?= $metaseo['imageCaption'] ?></td>
<td><?= $metaseo['canonicalURL'] ?></td>
<td><?= $metaseo['metaAuthor'] ?></td>
<td><?= $metaseo['metaseoUpdated'] ?></td>
<td><?= $metaseo['metaseoIdentify'] ?></td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
</tbody>
</table>
 <div><aside class="row"><a href="<?= ROOT ?>/admin/metaseo" class="cancel-btn">back</a></aside> </div>
</div>
</div>
