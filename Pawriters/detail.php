<?php
session_start();
include 'config/koneksi.php';

$id = $_GET['id'];

// ambil postingan + nama penulis
$query = "
    SELECT posts.*, users.nama_lengkap 
    FROM posts 
    JOIN users ON posts.user_id = users.id 
    WHERE posts.id = '$id'
";
$row = mysqli_fetch_assoc(mysqli_query($koneksi, $query));

// load head + navbar publik
include 'layout/head.php';
include 'layout/navbar.php';
?>

<body class="bg-light">

<div class="container py-5" style="max-width: 720px;">

    <!-- Judul -->
    <h1 class="fw-bold display-5 mb-3">
        <?= $row['judul']; ?>
    </h1>

    <!-- Penulis -->
    <div class="d-flex align-items-center text-muted mb-4 pb-3 border-bottom">
        <img src="https://ui-avatars.com/api/?name=<?= $row['nama_lengkap']; ?>&background=random"
             class="rounded-circle shadow-sm me-3"
             width="48">

        <div>
            <div class="fw-semibold text-dark"><?= $row['nama_lengkap']; ?></div>
            <small><?= date('d F Y · H:i', strtotime($row['tanggal'])); ?></small>
        </div>
    </div>

    <!-- Konten Artikel -->
    <article class="fs-5 lh-lg text-dark">
        <?= nl2br($row['isi']); ?>
    </article>

    <!-- Tombol kembali -->
    <div class="mt-5 pt-4 border-top">
        <a href="index.php" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali ke Beranda
        </a>
    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>