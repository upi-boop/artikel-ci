<div class="container mt-4">
  <h3>Daftar Artikel</h3>
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
</div>

<script>
  function konfirmasiHapus(id) {
    Swal.fire({
      title: 'Hapus data?',
      text: 'Data tidak bisa dikembalikan!',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = '<?= site_url('artikel/delete/') ?>' + id;
      }
    });
  }

  <?php if ($this->session->flashdata('sukses')): ?>
    Swal.fire('Sukses', '<?= $this->session->flashdata('sukses') ?>', 'success');
  <?php endif ?>
</script>
