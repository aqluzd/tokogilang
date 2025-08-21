<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Manajemen Supplier</h1>

    <!-- Alert -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <!-- Tombol Tambah -->
    <a href="<?= base_url('supplier/create'); ?>" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Supplier
    </a>

    <!-- Tabel -->
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Supplier</th>
                            <th>Kontak</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($suppliers)): ?>
                            <?php foreach ($suppliers as $i => $s): ?>
                                <tr>
                                    <td><?= $i + 1; ?></td>
                                    <td><?= esc($s['name']); ?></td>
                                    <td><?= esc($s['contact']); ?></td>
                                    <td><?= esc($s['address']); ?></td>
                                    <td>
                                        <a href="<?= base_url('supplier/edit/'.$s['id']); ?>" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url('supplier/delete/'.$s['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus supplier ini?');">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center">Belum ada supplier</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>
