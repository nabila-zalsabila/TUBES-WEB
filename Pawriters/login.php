<?php 
session_start();
include 'layout/head.php'; 
?>
<body class="bg-light">

<div class="d-flex align-items-center justify-content-center min-vh-100">
    <div class="card shadow-lg border-0 p-4" style="width: 380px; border-radius: 18px;">
        
        <!-- LOGO AREA -->
        <div class="text-center mb-4">
            <img src="assets/img/logo.png" alt="Logo" style="width: 80px; height: 80px; object-fit: cover;">
            <h3 class="fw-bold mt-3 text-primary">Pawriterss</h3>
            <p class="text-muted">Masuk untuk mulai menulis</p>
        </div>

        <form action="aksi/proses_login.php" method="POST">
            <div class="mb-3">
                <div class="input-group input-group-lg">
                    <span class="input-group-text bg-white border-end-0">
                        <i class="bi bi-person"></i>
                    </span>
                    <input type="text" name="username" class="form-control bg-white border-start-0" placeholder="Username" required>
                </div>
            </div>

            <div class="mb-4">
                <div class="input-group input-group-lg">
                    <span class="input-group-text bg-white border-end-0">
                        <i class="bi bi-lock"></i>
                    </span>
                    <input type="password" name="password" class="form-control bg-white border-start-0" placeholder="Password" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100 btn-lg mb-3" style="border-radius: 10px;">
                Masuk
            </button>

            <div class="text-center">
                <small class="text-muted">
                    Belum punya akun? <a href="register.php" class="text-decoration-none">Daftar</a>
                </small>
            </div>
        </form>
    </div>
</div>

</body>
</html>
