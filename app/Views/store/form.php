<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/sidebar') ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <div class="card shadow">
        <div class="card-body">
            <form action="<?= $action ?>" method="post">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Toko</label>
                    <input type="text" name="name" class="form-control" value="<?= isset($store) ? esc($store['name']) : old('name') ?>" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <textarea name="address" class="form-control" required><?= isset($store) ? esc($store['address']) : old('address') ?></textarea>
                </div>

                <?php if (isset($store)): ?>
                    <input type="hidden" name="id" value="<?= $store['id'] ?>">
                <?php endif; ?>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= site_url('/store') ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

<?= $this->include('layouts/footer') ?>