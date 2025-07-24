<?= $this->include('layouts/header'); ?>
<?= $this->include('layouts/sidebar'); ?>

<div class="container py-4">
    <h2 class="mb-3">Manajemen Toko</h2>
    <p class="text-muted mb-4">Halaman ini digunakan untuk mengelola data toko.</p>

    <div class="card shadow-sm">
        <div class="card-body">
            <a href="<?= site_url('store/create') ?>" class="btn btn-primary mb-3">Tambah Toko</a>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>

            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Toko</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($stores as $index => $store): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= esc($store['name']) ?></td>
                            <td><?= esc($store['address']) ?></td>
                            <td>
                                <a href="<?= site_url('store/edit/' . $store['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= site_url('store/delete/' . $store['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus toko ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    <?php if (empty($stores)): ?>
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada data toko.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->include('layouts/footer'); ?>
