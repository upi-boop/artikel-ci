<div class="container mt-4">
  <h3>Daftar Artikel</h3>

  <form method="get" action="<?= site_url('artikel') ?>" class="mb-3 d-flex">
    <input type="text" name="q" class="form-control me-2" placeholder="Cari judul..." value="<?= html_escape($keyword) ?>">
    <button type="submit" class="btn btn-outline-primary">Cari</button>
  </form>

  <a href="<?= site_url('artikel/create') ?>" class="btn btn-primary mb-3">Tambah Artikel</a>

  <table class="table table-bordered">
    <thead>
      <tr><th>#</th><th>Judul</th><th>Status</th><th>Aksi</th></tr>
    </thead>
    <tbody>
      <?php foreach ($artikel as $a): ?>
        <tr>
          <td><?= $a->id ?></td>
          <td><?= $a->judul ?></td>
          <td><?= $a->status ?></td>
          <td>
            <a href="<?= site_url('artikel/edit/'.$a->id) ?>" class="btn btn-sm btn-warning">Edit</a>
            <a href="#" class="btn btn-danger btn-sm" onclick="konfirmasiHapus(<?= $a->id ?>)">Hapus</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>

  <!-- Pagination -->
  <?php
    $total_pages = ceil($total_rows / $limit);
    if ($total_pages > 1):
  ?>
  <nav>
    <ul class="pagination">
      <?php for ($i = 1; $i <= $total_pages; $i++): ?>
        <li class="page-item <?= $page == $i ? 'active' : '' ?>">
          
          <a class="page-link" href="<?= site_url('artikel') . '?q=' . urlencode($keyword ?? '') . '&page=' . $i ?>">
            <?= $i ?>
          </a>

        </li>
      <?php endfor ?>
    </ul>
  </nav>
  <?php endif ?>
</div>
