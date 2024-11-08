  <div class="data-table">
  <div class="table-container">
  <h2> Display campaign </h2>
<table>
  <thead>
    <tr>
      <th>#</th>
      <th>Campaign Id</th>
      <th>Campain Title</th>
      <th>Campaign Subtitle</th>
      <th>Campaign Media</th>
      <th>Campaign Updated</th>
      <th>Campaign Identify</th>
    </tr>
  </thead>
  <tbody>
<?php foreach($params['campaign'] as $key => $campaign): ?>
    <tr>
      <td><?= $key + 1 ?></td>
<td><?= $campaign['campaignId'] ?></td>
<td><?= $campaign['campainTitle'] ?></td>
<td><?= $campaign['campaignSubtitle'] ?></td>
<td><?= $campaign['campaignMedia'] ?></td>
<td><?= $campaign['campaignUpdated'] ?></td>
<td><?= $campaign['campaignIdentify'] ?></td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
</tbody>
</table>
 <div><aside class="row"><a href="<?= ROOT ?>/admin/campaign" class="cancel-btn">back</a></aside> </div>
</div>
</div>
