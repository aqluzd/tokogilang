<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Manajemen Produk</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Produk</h6>
            <a href="<?= base_url('products/create') ?>" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Produk
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Supplier</th>
                            <th>Toko</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $p): ?>
                        <tr>
                            <td><?= $p['id'] ?></td>
                            <td><?= $p['name'] ?></td>
                            <td><?= $p['category'] ?></td>
                            <td><?= $p['supplier_name'] ?? '-' ?></td>
                            <td><?= $p['store_name'] ?></td>
                            <td><?= number_format($p['purchase_price'], 0, ',', '.') ?></td>
                            <td><?= number_format($p['selling_price'], 0, ',', '.') ?></td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm" onclick="return confirm('Hapus produk ini?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
