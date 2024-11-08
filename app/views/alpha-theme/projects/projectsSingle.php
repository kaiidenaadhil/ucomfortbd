  <div class="data-table">
  <div class="table-container">
  <h2> Display projects </h2>
<table>
  <thead>
    <tr>
      <th>#</th>
      <th>Project Id</th>
      <th>Project Flag Code</th>
      <th>Project Image</th>
      <th>Project Country Name</th>
      <th>Project Updated</th>
      <th>Project Identify</th>
    </tr>
  </thead>
  <tbody>
<?php foreach($params['projects'] as $key => $projects): ?>
    <tr>
      <td><?= $key + 1 ?></td>
<td><?= $projects['projectId'] ?></td>
<td><?= $projects['projectFlagCode'] ?></td>
<td><?= $projects['projectImage'] ?></td>
<td><?= $projects['projectCountryName'] ?></td>
<td><?= $projects['projectUpdated'] ?></td>
<td><?= $projects['projectIdentify'] ?></td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
</tbody>
</table>
 <div><aside class="row"><a href="<?= ROOT ?>/admin/projects" class="cancel-btn">back</a></aside> </div>
</div>
</div>
