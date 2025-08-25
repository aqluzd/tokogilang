<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Produk</h1>

    <div class="card shadow">
        <div class="card-body">
            <form action="/product/update/<?= $product['id'] ?>" method="post">
                <?= csrf_field() ?>

                <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" name="name" class="form-control" value="<?= $product['name'] ?>" required>
                </div>

                <div class="form-group">
                    <label>Kode / SKU</label>
                    <input type="text" name="sku" class="form-control" value="<?= $product['sku'] ?>">
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <input type="text" name="category" class="form-control" value="<?= $product['category'] ?>">
                </div>

                <div class="form-group">
                    <label>Satuan</label>
                    <input type="text" name="unit" class="form-control" value="<?= $product['unit'] ?>">
                </div>

                <div class="form-group">
                    <label>Harga Beli</label>
                    <input type="number" name="purchase_price" class="form-control" value="<?= $product['purchase_price'] ?>" required>
                </div>

                <div class="form-group">
                    <label>Harga Jual</label>
                    <input type="number" name="selling_price" class="form-control" value="<?= $product['selling_price'] ?>" required>
                </div>

                <div class="form-group">
                    <label>Supplier</label>
                    <select name="supplier_id" class="form-control">
                        <option value="">-- Pilih Supplier --</option>
                        <?php foreach ($suppliers as $s): ?>
                            <option value="<?= $s['id'] ?>" <?= $s['id'] == $product['supplier_id'] ? 'selected' : '' ?>>
                                <?= $s['name'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Toko</label>
                    <select name="store_id" class="form-control" required>
                        <?php foreach ($stores as $st): ?>
                            <option value="<?= $st['id'] ?>" <?= $st['id'] == $product['store_id'] ? 'selected' : '' ?>>
                                <?= $st['name'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="description" class="form-control"><?= $product['description'] ?></textarea>
                </div>

                <button type="submit" class="btn btn-success">Update</button>
                <a href="/product" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
