<?php
session_start();
if (!isset($_SESSION['status'])) {
    header("Location: login.php");
    exit();
}

include 'layout/head.php';
?>

<body>

<div class="d-flex">

    <!-- MAIN CONTENT AREA -->
    <div class="flex-grow-1">

        <!-- NAVBAR -->
        <?php include 'layout/navbar.php'; ?>

        <!-- PAGE CONTENT -->
        <div class="container mt-4">

            <h4 class="fw-bold mb-4">Tulis Postingan Baru</h4>

            <!-- FORM CARD -->
            <div class="card shadow-sm border-0 p-4">

                <form action="aksi/proses_tambah.php" method="POST">

                    <!-- Judul -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Judul</label>
                        <input type="text"
                               name="judul"
                               class="form-control form-control-lg"
                               placeholder="Ketik judul menarik di sini..."
                               required>
                    </div>

                    <!-- Konten -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Konten</label>
                        <textarea name="isi"
                                  class="form-control"
                                  rows="10"
                                  placeholder="Mulai menulis ceritamu..."
                                  required></textarea>
                    </div>

                    <!-- Tombol -->
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-send me-2"></i> Publikasikan
                        </button>
                        <a href="tulisansaya.php" class="btn btn-outline-secondary px-4">
                            Batal
                        </a>
                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>