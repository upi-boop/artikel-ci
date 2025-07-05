<div class="container mt-4">
  <h3>Feedback Pengguna</h3>
  <table class="table table-bordered">
    <thead>
      <tr><th>#</th><th>Nama</th><th>Email</th><th>Pesan</th></tr>
    </thead>
    <tbody>
      <?php foreach ($feedback as $f): ?>
        <tr>
          <td><?= $f->id ?></td>
          <td><?= $f->nama ?></td>
          <td><?= $f->email ?></td>
          <td><?= $f->pesan ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>