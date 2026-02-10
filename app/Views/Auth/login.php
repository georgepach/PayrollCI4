<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f4f7fa; height: 100vh; display: flex; align-items: center; justify-content: center; }
        .login-card { width: 400px; border: none; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
    <div class="card login-card p-4">
        <div class="text-center mb-4">
            <h3 class="fw-bold text-primary">FOCUS<span class="text-dark">HR</span></h3>
            <p class="text-muted small">Sign in to manage your workspace</p>
        </div>
        
        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger small border-0"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form action="/auth/attemptLogin" method="post">
            <div class="mb-3">
                <label class="small fw-bold">EMAIL ADDRESS</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-4">
                <label class="small fw-bold">PASSWORD</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 rounded-pill shadow-sm">Login</button>
        </form>
        <p class="text-center mt-3 small text-muted">Don't have an account? <a href="/register">Register</a></p>
    </div>
</body>
</html>