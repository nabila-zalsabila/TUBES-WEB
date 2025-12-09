<?php
session_start();
if (!isset($_SESSION['status'])) { 
    header("Location: login.php"); 
    exit(); 
}

include 'config/koneksi.php';
include 'layout/head.php';

$user_id = $_SESSION['user_id'];
$u = mysqli_fetch_assoc(mysqli_query($koneksi, 
    "SELECT * FROM users WHERE id='$user_id'"
));
?>

<body class="bg-light">
    <div class="d-flex">
        <?php include 'layout/sidebar.php'; ?>
        <div class="flex-grow-1">
            <?php include 'layout/navbar.php'; ?>
            <div class="container mt-5 d-flex justify-content-center">
            
                <div class="card shadow-sm border-0 p-4" style="max-width: 500px; width: 100%;">
            
                    <!-- FOTO PROFIL -->
                    <div class="text-center">
                        <img src="https://ui-avatars.com/api/?name=<?= $u['nama_lengkap']; ?>&background=random&size=128" 
                             class="rounded-circle shadow-sm mb-3" alt="foto">
            
                        <h3 class="fw-bold mb-0"><?= $u['nama_lengkap']; ?></h3>
                        <p class="text-muted">@<?= $u['username']; ?></p>
                    </div>
            
                    <hr>
            
                    <!-- BIO -->
                    <div class="bg-light rounded p-3">
                        <small class="text-muted fw-bold d-block mb-1">BIO PENGGUNA</small>
                        <p class="mb-0">
                            <?= !empty($u['bio']) ? $u['bio'] : 'Belum ada bio yang ditulis.'; ?>
                        </p>
                    </div>
            
                    <!-- BUTTON -->
                    <a href="tulisansaya.php" class="btn btn-outline-primary w-100 mt-4">
                        Ke Dashboard Penulis
                    </a>
            
                </div>
            
            </div>
        </div>
    </div>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>