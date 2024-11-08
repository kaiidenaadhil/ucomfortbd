  <div class="data-table">
  <div class="table-container">
  <h2> Display blog </h2>
<table>
  <thead>
    <tr>
      <th>#</th>
      <th>Blog Id</th>
      <th>Blog Title</th>
      <th>Blog SubTitle</th>
      <th>Blog Content</th>
      <th>Blog Author</th>
      <th>Blog Image</th>
      <th>Blog Updated</th>
      <th>Blog Identify</th>
    </tr>
  </thead>
  <tbody>
<?php foreach($params['blog'] as $key => $blog): ?>
    <tr>
      <td><?= $key + 1 ?></td>
<td><?= $blog['blogId'] ?></td>
<td><?= $blog['blogTitle'] ?></td>
<td><?= $blog['blogSubtitle'] ?></td>
<td><?= $blog['blogContent'] ?></td>
<td><?= $blog['blogAuthor'] ?></td>
<td><?= $blog['blogImage'] ?></td>
<td><?= $blog['blogUpdated'] ?></td>
<td><?= $blog['blogIdentify'] ?></td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
</tbody>
</table>
 <div><aside class="row"><a href="<?= ROOT ?>/admin/blog" class="cancel-btn">back</a></aside> </div>
</div>
</div>
