<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f4f7fa; height: 100vh; display: flex; align-items: center; justify-content: center; }
        .auth-card { width: 450px; border: none; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .btn-primary { background: #3758f9; border: none; }
    </style>
</head>
<body>
    <div class="card auth-card p-4">
        <div class="text-center mb-4">
            <h3 class="fw-bold text-primary">FOCUS<span class="text-dark">HR</span></h3>
            <p class="text-muted small">Create your account to get started</p>
        </div>
        
        <?php if(session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger small border-0">
                <ul class="mb-0">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="/auth/attemptRegister" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label class="small fw-bold">USERNAME</label>
                <input type="text" name="username" class="form-control" placeholder="e.g. surya_payroll" value="<?= old('username') ?>" required>
            </div>
            <div class="mb-3">
                <label class="small fw-bold">EMAIL ADDRESS</label>
                <input type="email" name="email" class="form-control" placeholder="name@company.com" value="<?= old('email') ?>" required>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="small fw-bold">PASSWORD</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="small fw-bold">CONFIRM</label>
                    <input type="password" name="password_confirm" class="form-control" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100 rounded-pill shadow-sm py-2 mt-2">Create Account</button>
        </form>
        <p class="text-center mt-3 small text-muted">Already have an account? <a href="/login" class="text-decoration-none">Sign In</a></p>
    </div>
</body>
</html>