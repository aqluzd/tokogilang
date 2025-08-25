<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Produk</h1>

    <div class="card shadow">
        <div class="card-body">
            <form action="/product/store" method="post">
                <?= csrf_field() ?>

                <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Kode / SKU</label>
                    <input type="text" name="sku" class="form-control">
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <input type="text" name="category" class="form-control">
                </div>

                <div class="form-group">
                    <label>Satuan</label>
                    <input type="text" name="unit" class="form-control">
                </div>

                <div class="form-group">
                    <label>Harga Beli</label>
                    <input type="number" name="purchase_price" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Harga Jual</label>
                    <input type="number" name="selling_price" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Supplier</label>
                    <select name="supplier_id" class="form-control">
                        <option value="">-- Pilih Supplier --</option>
                        <?php foreach ($suppliers as $s): ?>
                            <option value="<?= $s['id'] ?>"><?= $s['name'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Toko</label>
                    <select name="store_id" class="form-control" required>
                        <?php foreach ($stores as $st): ?>
                            <option value="<?= $st['id'] ?>"><?= $st['name'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="/product" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
