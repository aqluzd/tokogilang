<?= $this->include('layouts/header'); ?>
<?= $this->include('layouts/sidebar'); ?>
<?= $this->section('content') ?>

<h1>Tambah Toko</h1>

<form action="<?= site_url('store/store') ?>" method="post">
    <div class="form-group">
        <label for="name">Nama Toko</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="address">Alamat</label>
        <textarea name="address" id="address" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="<?= site_url('store') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>
