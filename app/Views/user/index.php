<?= $this->include('layouts/header'); ?>
<?= $this->include('layouts/sidebar'); ?>

<!-- Konten -->
<div class="container py-4">
    <h2 class="mb-3">Manajemen User</h2>
    <p class="text-muted mb-4">Ini adalah halaman untuk mengelola user.</p>

    <div class="card shadow-sm">
        <div class="card-body">
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
                    <?php $no = 1; foreach ($users as $user) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= esc($user['username']); ?></td>
                            <td><?= esc($user['role_id']); ?></td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->include('layouts/footer'); ?>
