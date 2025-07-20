<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/sidebar') ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <div class="card shadow">
        <div class="card-body">
            <form action="<?= $action ?>" method="post">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" value="<?= isset($user) ? esc($user['username']) : old('username') ?>" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password <?= isset($user) ? '(Biarkan kosong jika tidak diubah)' : '' ?></label>
                    <input type="password" name="password" class="form-control" <?= isset($user) ? '' : 'required' ?>>
                </div>
                    <?php if (isset($user)): ?>
                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                    <?php endif; ?>
                <div class="mb-4">
                    <label for="role_id" class="form-label">Role</label>
                    <select name="role_id" class="form-control" required>
                        <option value="">-- Pilih Role --</option>
                        <?php foreach ($roles as $key => $label): ?>
                            <option value="<?= $key ?>" <?= (isset($user) && $user['role_id'] == $key) || old('role_id') == $key ? 'selected' : '' ?>>
                                <?= $label ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="store_id" class="form-label">Toko</label>
                    <select name="store_id" class="form-control">
                        <option value="">-- Tidak Ada --</option>
                        <?php foreach ($stores as $store): ?>
                            <option value="<?= $store['id'] ?>" <?= (isset($user) && $user['store_id'] == $store['id']) || old('store_id') == $store['id'] ? 'selected' : '' ?>>
                                <?= $store['name'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= site_url('/manajemen-user') ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

<?= $this->include('layouts/footer') ?>
