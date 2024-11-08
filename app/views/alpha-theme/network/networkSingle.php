  <div class="data-table">
  <div class="table-container">
  <h2> Display network </h2>
<table>
  <thead>
    <tr>
      <th>#</th>
      <th>Network Id</th>
      <th>Network Title</th>
      <th>Network Country</th>
      <th>Network City</th>
      <th>Network Store</th>
      <th>Network Phone</th>
      <th>Network Address</th>
      <th>Network Image</th>
      <th>Network Updated</th>
      <th>Network Identify</th>
    </tr>
  </thead>
  <tbody>
<?php foreach($params['network'] as $key => $network): ?>
    <tr>
      <td><?= $key + 1 ?></td>
<td><?= $network['networkId'] ?></td>
<td><?= $network['networkTitle'] ?></td>
<td><?= $network['networkCountry'] ?></td>
<td><?= $network['networkCity'] ?></td>
<td><?= $network['networkStore'] ?></td>
<td><?= $network['networkPhone'] ?></td>
<td><?= $network['networkAddress'] ?></td>
<td><?= $network['networkImage'] ?></td>
<td><?= $network['networkUpdated'] ?></td>
<td><?= $network['networkIdentify'] ?></td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
</tbody>
</table>
 <div><aside class="row"><a href="<?= ROOT ?>/admin/network" class="cancel-btn">back</a></aside> </div>
</div>
</div>
