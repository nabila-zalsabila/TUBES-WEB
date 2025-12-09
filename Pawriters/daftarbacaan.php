<?php
session_start();
include 'config/koneksi.php';

if (!isset($_SESSION['status'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$keyword = $_GET['q'] ?? '';

// Query semua bookmark user
$query = "
    SELECT bookmarks.id AS bid, posts.*, users.nama_lengkap
    FROM bookmarks
    JOIN posts ON bookmarks.post_id = posts.id
    JOIN users ON posts.user_id = users.id
    WHERE bookmarks.user_id = '$user_id'
      AND posts.judul LIKE '%$keyword%'
    ORDER BY posts.id DESC
";
$result = mysqli_query($koneksi, $query);

include 'layout/head.php';
?>

<body>

<div class="d-flex">

    <!-- SIDEBAR -->
    <?php include 'layout/sidebar.php'; ?>

    <!-- MAIN AREA -->
    <div class="flex-grow-1">

        <!-- NAVBAR -->
        <?php include 'layout/navbar.php'; ?>

        <!-- PAGE CONTENT -->
        <div class="container mt-4">

            <h4 class="fw-bold mb-4">Daftar Bacaan Disimpan</h4>

            <div class="card shadow-sm border-0">

                <div class="list-group list-group-flush">

                    <?php if (mysqli_num_rows($result) == 0): ?>
                        <div class="list-group-item text-center py-4 text-muted">
                            Tidak ada daftar bacaan ditemukan.
                        </div>
                    <?php endif; ?>

                    <?php while ($r = mysqli_fetch_assoc($result)): ?>
                        <div class="list-group-item py-4">

                            <div class="d-flex justify-content-between">
                                <h5 class="fw-bold mb-1">
                                    <a href="detail.php?id=<?= $r['id']; ?>" class="text-dark text-decoration-none">
                                        <?= $r['judul']; ?>
                                    </a>
                                </h5>
                                <small class="text-muted">
                                    <?= date('d M Y', strtotime($r['tanggal'])); ?>
                                </small>
                            </div>

                            <p class="mb-2 text-muted small">
                                Penulis: <?= $r['nama_lengkap']; ?>
                            </p>

                            <div class="d-flex gap-2">
                                <a href="detail.php?id=<?= $r['id']; ?>" class="btn btn-sm btn-primary">
                                    Baca
                                </a>
                                <a href="aksi/proses_hapus_bookmark.php?id=<?= $r['bid']; ?>"
                                   onclick="return confirm('Hapus dari daftar bacaan?')"
                                   class="btn btn-sm btn-outline-danger">
                                    Hapus
                                </a>
                            </div>

                        </div>
                    <?php endwhile; ?>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>