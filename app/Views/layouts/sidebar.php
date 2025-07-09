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
