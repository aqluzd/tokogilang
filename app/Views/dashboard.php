<!-- dashboard.php -->
<?= view('layouts/header') ?>
<?= view('layouts/sidebar') ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            Selamat datang, <strong><?= esc($username) ?></strong>!
        </div>
    </div>
</div>

<?= view('layouts/footer') ?>
