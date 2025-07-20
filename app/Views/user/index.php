<?= $this->include('layouts/header'); ?>
<?= $this->include('layouts/sidebar'); ?>

<!-- Konten -->
<div class="container py-4">
    <h2 class="mb-3">Manajemen User</h2>
    <p class="text-muted mb-4">Ini adalah halaman untuk mengelola user.</p>

    <div class="card shadow-sm">
        <div class="card-body">
            <a href="<?= site_url('user/create') ?>" class="btn btn-primary mb-3">Tambah User</a>
            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $index => $user): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= esc($user['username']) ?></td>
                            <td><?= $user->role_name ?></td>
                            <td>
                                <?php if ($user['username'] !== 'owner'): ?>
                                    <a href="<?= site_url('user/edit/' . $user['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="<?= site_url('user/delete/' . $user['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</a>
                                <?php else: ?>
                                    <span class="text-muted">Akun Owner</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->include('layouts/footer'); ?>
