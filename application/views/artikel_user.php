<div class="container mt-4">
  <h3>Daftar Artikel</h3>
  <div class="row">
    <?php foreach ($artikel as $a): ?>
      <div class="col-md-6 mb-3">
        <div class="card">
          <div class="card-body">
            <h5><?= $a->judul ?></h5>
            <span class="badge bg-secondary">Status: <?= $a->status ?></span>
          </div>
        </div>
      </div>
    <?php endforeach ?>
  </div>
  <a href="<?= site_url('home/feedback') ?>" class="btn btn-primary">Kirim Feedback</a>
</div>
