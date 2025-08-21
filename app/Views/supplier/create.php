<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Supplier</h1>

    <div class="card shadow">
        <div class="card-body">
            <form action="<?= base_url('supplier/store'); ?>" method="post">
                <?= csrf_field(); ?>

                <div class="form-group">
                    <label for="name">Nama Supplier</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="contact">Kontak</label>
                    <input type="text" class="form-control" id="contact" name="contact" required>
                </div>

                <div class="form-group">
                    <label for="address">Alamat</label>
                    <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="<?= base_url('supplier'); ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>

</div>

<?= $this->endSection() ?>
