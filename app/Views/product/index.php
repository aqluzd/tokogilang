<?= $this->include('layouts/header'); ?>
<?= $this->include('layouts/sidebar'); ?>
<?= $this->section('content') ?>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<h1 class="h3 mb-4"><?= $title ?></h1>

<a href="<?= site_url('product/create') ?>" class="btn btn-primary mb-3">Tambah Produk</a>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $index => $p): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= esc($p['name']) ?></td>
                    <td>Rp<?= number_format($p['buy_price'], 0, ',', '.') ?></td>
                    <td>Rp<?= number_format($p['sell_price'], 0, ',', '.') ?></td>
                    <td><?= $p['stock'] ?></td>
                    <td>
                        <a href="<?= site_url('product/edit/' . $p['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= site_url('product/delete/' . $p['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus produk ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
