<?= $this->include('layouts/header'); ?>
<?= $this->include('layouts/sidebar'); ?>
<?= $this->section('content') ?>

<h1 class="h3 mb-4"><?= $title ?></h1>

<form action="<?= $action ?>" method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Nama Produk</label>
        <input type="text" name="name" id="name" class="form-control" value="<?= old('name', $product['name'] ?? '') ?>" required>
    </div>

    <div class="mb-3">
        <label for="buy_price" class="form-label">Harga Beli</label>
        <input type="number" name="buy_price" id="buy_price" class="form-control" value="<?= old('buy_price', $product['buy_price'] ?? '') ?>" required>
    </div>

    <div class="mb-3">
        <label for="sell_price" class="form-label">Harga Jual</label>
        <input type="number" name="sell_price" id="sell_price" class="form-control" value="<?= old('sell_price', $product['sell_price'] ?? '') ?>" required>
    </div>

    <div class="mb-3">
        <label for="stock" class="form-label">Stok</label>
        <input type="number" name="stock" id="stock" class="form-control" value="<?= old('stock', $product['stock'] ?? '') ?>" required>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="<?= site_url('product') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>
