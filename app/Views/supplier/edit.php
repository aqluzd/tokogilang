<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Supplier</h1>

    <div class="card shadow">
        <div class="card-body">
            <form action="<?= base_url('supplier/update/'.$supplier['id']); ?>" method="post">
                <?= csrf_field(); ?>

                <div class="form-group">
                    <label for="name">Nama Supplier</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= esc($supplier['name']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="contact">Kontak</label>
                    <input type="text" class="form-control" id="contact" name="contact" value="<?= esc($supplier['contact']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="address">Alamat</label>
                    <textarea class="form-control" id="address" name="address" rows="3" required><?= esc($supplier['address']); ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update
                </button>
                <a href="<?= base_url('supplier'); ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>

</div>

<?= $this->endSection() ?>
