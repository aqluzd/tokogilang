<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - TokoGilang</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap (lokal atau CDN sesuai kebutuhan) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


  <style>
    body {
      background-color: #f8f9fa; /* putih keabu */
    }
    .login-box {
      max-width: 400px;
      margin: 80px auto;
      padding: 30px;
      background: #ffffff;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }
    .form-title {
      color: #0a3d62; /* biru agak tua */
    }
    .btn-login {
      background-color: #20c997; /* tosca */
      color: white;
    }
    .btn-login:hover {
      background-color: #17a085;
    }
  </style>
</head>
<body>

<div class="login-box">
  <h3 class="text-center form-title mb-4">TokoGilang Login</h3>

  <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
  <?php endif; ?>

  <form action="<?= base_url('login') ?>" method="post">
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control" name="username" id="username" required>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" name="password" id="password" required>
    </div>
    <div class="d-grid">
      <button type="submit" class="btn btn-login">Masuk</button>
    </div>
  </form>
</div>

</body>
</html>
