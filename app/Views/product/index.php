<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Manajemen Produk</h4>
    <?php if (in_array(session()->get('role_id'), [1, 2])): ?>
        <form>
            <select name="store_select" class="form-control"
                    onchange="window.location.href=this.value;">
                <option value="#">-- Pilih Toko --</option>
                <?php foreach ($stores as $store): ?>
                    <option value="<?= site_url('set-active-store/' . $store['id']) ?>"
                        <?= ($activeStoreId == $store['id']) ? 'selected' : '' ?>>
                        <?= esc($store['name']) ?>
                    </option>
                <?php endforeach ?>
            </select>
        </form>
    <?php else: ?>
        <span class="badge bg-primary">
            <?= esc(array_column($stores, 'name', 'id')[$activeStoreId] ?? 'Toko Tidak Ditemukan') ?>
        </span>
    <?php endif; ?>
</div>

<div class="card shadow">
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?= esc($product['name']) ?></td>
                            <td><?= number_format($product['price'], 0, ',', '.') ?></td>
                            <td><?= esc($product['stock']) ?></td>
                            <td>
                                <a href="<?= site_url('product/edit/'.$product['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="<?= site_url('product/delete/'.$product['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus produk ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php else: ?>
                    <tr><td colspan="4" class="text-center">Belum ada produk</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
