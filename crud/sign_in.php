<?php session_start(); ?>
<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>เข้าสู่ระบบ</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Krub:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Krub', sans-serif; background:#f8f9fa; }
    .card { border-radius: 1rem; }
  </style>
</head>
<body>
<div class="container min-vh-100 d-flex align-items-center">
  <div class="row w-100 justify-content-center">
    <div class="col-md-5">
      <div class="card shadow-sm">
        <div class="card-body p-4">
          <h3 class="mb-3 text-center">เข้าสู่ระบบ</h3>

          <?php if (!empty($_SESSION['error'])): ?>
            <div class="alert alert-danger">
              <?php echo htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?>
            </div>
          <?php endif; ?>

          <form method="post" action="sign_in_process.php" class="needs-validation" novalidate>
            <div class="mb-3">
              <label class="form-label">ชื่อผู้ใช้</label>
              <input type="text" name="username" class="form-control"
                    value="<?= htmlspecialchars($_COOKIE['remember_name'] ?? '') ?>" required>
              <div class="invalid-feedback">กรอกชื่อผู้ใช้</div>
            </div>
            <div class="mb-3">
              <label class="form-label">รหัสผ่าน</label>
              <input type="password" name="password" class="form-control" required>
              <div class="invalid-feedback">กรอกรหัสผ่าน</div>
            </div>

            <div class="form-check mb-3">
              <input class="form-check-input" type="checkbox" id="remember_name" name="remember_name"
                    <?= isset($_COOKIE['remember_name']) ? 'checked' : '' ?>>
              <label class="form-check-label" for="remember_name">จำชื่อผู้ใช้</label>
            </div>

            <button class="btn btn-primary w-100" type="submit">ล็อกอิน</button>
          </form>


          <div class="text-center mt-3">
            <a href="sign_up.php">ยังไม่มีบัญชี? สมัครสมาชิก</a>
          </div>
        </div>
      </div>
      <p class="text-center text-muted mt-3 mb-0">© WEB DEE DEE</p>
    </div>
  </div>
</div>

<script>
(function(){
  'use strict';
  const forms = document.querySelectorAll('.needs-validation');
  Array.from(forms).forEach(form=>{
    form.addEventListener('submit',e=>{
      if(!form.checkValidity()){ e.preventDefault(); e.stopPropagation(); }
      form.classList.add('was-validated');
    }, false);
  });
})();
</script>
</body>
</html>
