<div class="container mt-4">
  <h3><?= isset($artikel) ? 'Edit' : 'Tambah' ?> Artikel</h3>
  <?= validation_errors('<div class="alert alert-danger">','</div>'); ?>
  <form method="post">
    <div class="form-group">
      <label>Judul</label>
      <input type="text" name="judul" class="form-control" value="<?= isset($artikel) ? $artikel->judul : '' ?>">
    </div>
    <div class="form-group">
      <label>Status</label>
      <select name="status" class="form-control">
        <option value="draft" <?= isset($artikel) && $artikel->status == 'draft' ? 'selected' : '' ?>>Draft</option>
        <option value="publish" <?= isset($artikel) && $artikel->status == 'publish' ? 'selected' : '' ?>>Publish</option>
      </select>
    </div>
    <button class="btn btn-success">Simpan</button>
  </form>
</div>

