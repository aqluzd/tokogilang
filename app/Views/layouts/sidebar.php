<?php $role = session('role_id'); ?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">TOKOGILANG</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Menu Umum -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/dashboard') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <?php if ($role == 1): ?>
        <!-- Menu khusus Owner -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/manajemen-user') ?>">
                <i class="fas fa-users-cog"></i>
                <span>Manajemen User</span>
            </a>
        </li>
    <?php endif; ?>

    <!-- Menu Manajemen Toko -->
    <?php if ($role == 1): ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/store') ?>">
                <i class="fas fa-store"></i>
                <span>Manajemen Toko</span>
            </a>
        </li>
    <?php endif; ?>

    <?php if (in_array(session()->get('role_id'), [1, 2])): ?>
        <?php
            $storeModel = new \App\Models\StoreModel();
            $stores = $storeModel->findAll();
            $activeStoreId = session()->get('active_store_id');
        ?>
        <form class="px-3 pb-2">
            <select name="store_select" class="form-control form-control-sm" style="width: 100%;" onchange="window.location.href=this.value;">
                <option value="#">-- Pilih Toko --</option>
                <?php foreach ($stores as $store): ?>
                    <option value="<?= site_url('set-active-store/' . $store['id']) ?>" <?= ($activeStoreId == $store['id']) ? 'selected' : '' ?>>
                        <?= esc($store['name']) ?>
                    </option>
                <?php endforeach ?>
            </select>
        </form>
    
    <?php if ($role == 2): ?>
        <!-- Menu khusus Kasir -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/transaksi') ?>">
                <i class="fas fa-cash-register"></i>
                <span>Transaksi</span>
            </a>
        </li>
    <?php endif; ?>

    <?php if ($role == 3): ?>
        <!-- Menu khusus Gudang -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/stok-barang') ?>">
                <i class="fas fa-boxes"></i>
                <span>Stok Barang</span>
            </a>
        </li>
    <?php endif; ?>
</ul>
<?php endif; ?>