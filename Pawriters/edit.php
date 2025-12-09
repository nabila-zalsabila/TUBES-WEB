<?php
session_start();
include 'config/koneksi.php';

if (!isset($_SESSION['status'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM posts WHERE id='$id'"));

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

            <h4 class="fw-bold mb-4">Edit Postingan</h4>

            <div class="card shadow-sm border-0 p-4">

                <form action="aksi/proses_edit.php" method="POST">

                    <input type="hidden" name="id" value="<?= $data['id'] ?>">

                    <!-- JUDUL -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Judul</label>
                        <input type="text"
                               name="judul"
                               class="form-control form-control-lg"
                               value="<?= $data['judul'] ?>"
                               required>
                    </div>

                    <!-- KONTEN -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Konten</label>
                        <textarea name="isi"
                                  class="form-control"
                                  rows="10"
                                  required><?= $data['isi'] ?></textarea>
                    </div>

                    <!-- BUTTONS -->
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-4">
                            Simpan Perubahan
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