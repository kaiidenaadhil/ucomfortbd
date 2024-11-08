  <div class="data-table">
  <div class="table-container">
  <h2> Display clients </h2>
<table>
  <thead>
    <tr>
      <th>#</th>
      <th>Client Id</th>
      <th>Client Name</th>
      <th>Client Email</th>
      <th>Whatsapp</th>
      <th>Client Message</th>
      <th>Client Updated</th>
      <th>Client Identify</th>
    </tr>
  </thead>
  <tbody>
<?php foreach($params['clients'] as $key => $clients): ?>
    <tr>
      <td><?= $key + 1 ?></td>
<td><?= $clients['clientId'] ?></td>
<td><?= $clients['clientName'] ?></td>
<td><?= $clients['clientEmail'] ?></td>
<td><?= $clients['whatsapp'] ?></td>
<td><?= $clients['clientMessage'] ?></td>
<td><?= $clients['clientUpdated'] ?></td>
<td><?= $clients['clientIdentify'] ?></td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
</tbody>
</table>
 <div><aside class="row"><a href="<?= ROOT ?>/admin/clients" class="cancel-btn">back</a></aside> </div>
</div>
</div>
