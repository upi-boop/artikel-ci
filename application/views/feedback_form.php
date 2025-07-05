<div class="container mt-4">
  <h3>Form Feedback</h3>

  <?= validation_errors('<div class="alert alert-danger">','</div>'); ?>

  <form method="post" action="<?= site_url('home/feedback') ?>">
    <div class="form-group mb-2">
      <label>Nama</label>
      <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="form-group mb-2">
      <label>Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="form-group mb-3">
      <label>Pesan</label>
      <textarea name="pesan" class="form-control" rows="4" required></textarea>
    </div>
    <button class="btn btn-success">Kirim</button>
  </form>
</div>

<?php if ($this->session->flashdata('sukses')): ?>
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Berhasil',
      text: '<?= $this->session->flashdata('sukses') ?>'
    });
  </script>
<?php endif ?>
