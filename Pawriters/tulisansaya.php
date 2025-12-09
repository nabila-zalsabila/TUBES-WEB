<?php
session_start();
include 'config/koneksi.php';
if (!isset($_SESSION['status'])) { header("Location: login.php"); exit(); }

$user_id = $_SESSION['user_id'];
$keyword = $_GET['q'] ?? '';

// Query: tampilkan hanya tulisan user + filter pencarian
$query = "
    SELECT * FROM posts 
    WHERE user_id = '$user_id' AND judul LIKE '%$keyword%'
    ORDER BY id DESC
";
$result = mysqli_query($koneksi, $query);
$jumlah = mysqli_num_rows($result);

include 'layout/head.php';
?>

<body>

<div class="d-flex">

    <!-- SIDEBAR -->
    <?php include 'layout/sidebar.php'; ?>

    <!-- CONTENT -->
    <div class="flex-grow-1">

        <!-- NAVBAR -->
        <?php include 'layout/navbar.php'; ?>

        <!-- PAGE CONTENT -->
        <div class="container mt-4">

            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold m-0">Kelola Tulisan</h4>
                <a href="tambah.php" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Buat Baru
                </a>
            </div>

            <!-- Card List -->
            <div class="card shadow-sm border-0 mb-4">

                <div class="card-header bg-light fw-bold">
                    Daftar Postingan Saya (<?= $jumlah; ?>)
                </div>

                <div class="list-group list-group-flush">

                    <?php if ($jumlah === 0): ?>
                        <div class="list-group-item py-4 text-center text-muted">
                            Belum ada tulisan dibuat.
                        </div>
                    <?php endif; ?>

                    <?php while($row = mysqli_fetch_assoc($result)) : ?>
                        <div class="list-group-item d-flex justify-content-between align-items-center py-3">

                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center justify-content-center bg-secondary text-white rounded me-3 fw-bold"
                                     style="width:40px; height:40px;">
                                    <?= strtoupper(substr($row['judul'], 0, 1)); ?>
                                </div>

                                <div>
                                    <div class="fw-bold"><?= $row['judul']; ?></div>
                                    <small class="text-success">
                                        Dipublikasikan <?= date('d M Y', strtotime($row['tanggal'])); ?>
                                    </small>
                                </div>
                            </div>

                            <div>
                                <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-light border me-1">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="aksi/proses_hapus.php?id=<?= $row['id']; ?>" 
                                    class="btn btn-sm btn-light border text-danger"
                                    onclick="return confirm('Yakin ingin menghapus tulisan ini?')">
                                    <i class="bi bi-trash"></i>
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