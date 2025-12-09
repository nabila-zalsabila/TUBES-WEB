<?php
session_start();
include 'config/koneksi.php';
if (!isset($_SESSION['status'])) { header("Location: login.php"); exit(); }

include 'layout/head.php';

// Search
$keyword = $_GET['q'] ?? '';
$where = "WHERE posts.judul LIKE '%$keyword%'";

// Query Ambil Post
$query = "
    SELECT posts.*, users.nama_lengkap
    FROM posts
    JOIN users ON posts.user_id = users.id
    $where ORDER BY posts.id DESC
";
$result = mysqli_query($koneksi, $query);

$user_id = $_SESSION['user_id'];
?>

<body>

<div class="d-flex">
    
    <?php include 'layout/sidebar.php'; ?>

    <div class="flex-grow-1">

        <?php include 'layout/navbar.php'; ?>

        <div class="container mt-4">

            <h4 class="fw-bold mb-4">Beranda</h4>

            <div class="row">

            <?php while($row = mysqli_fetch_assoc($result)): ?>

                <?php
                    // CEK apakah postingan ini sudah disimpan user
                    $post_id = $row['id'];
                    $check = mysqli_query($koneksi, "
                        SELECT 1 FROM bookmarks 
                        WHERE user_id='$user_id' AND post_id='$post_id'
                        LIMIT 1
                    ");
                    $isSaved = mysqli_num_rows($check) > 0;
                ?>

                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">

                            <div class="d-flex align-items-center mb-3">
                                <img src="https://ui-avatars.com/api/?name=<?= $row['nama_lengkap']; ?>&background=random"
                                     class="rounded-circle me-2" width="35">
                                
                                <div>
                                    <strong><?= $row['nama_lengkap']; ?></strong><br>
                                    <small class="text-muted"><?= date('d M Y', strtotime($row['tanggal'])); ?></small>
                                </div>
                            </div>

                            <h5><?= $row['judul']; ?></h5>
                            <p class="text-muted"><?= substr($row['isi'], 0, 100); ?>...</p>

                            <div class="d-flex justify-content-between mt-3 border-top pt-3">

                                <a href="detail.php?id=<?= $row['id']; ?>" 
                                   class="btn btn-primary">
                                   Baca
                                </a>

                                <!-- BUTTON BOOKMARK -->
                                <button 
                                    class="btn btn-bookmark btn-sm <?= $isSaved ? 'btn-primary text-white' : 'btn-light text-muted' ?>" 
                                    data-id="<?= $row['id']; ?>"
                                    data-saved="<?= $isSaved ? '1' : '0' ?>"
                                >
                                    <?php if ($isSaved): ?>
                                        <i class="bi bi-bookmark-fill"></i> Disimpan
                                    <?php else: ?>
                                        <i class="bi bi-bookmark"></i> Simpan
                                    <?php endif; ?>
                                </button>

                            </div>

                        </div>
                    </div>
                </div>

            <?php endwhile; ?>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.querySelectorAll('.btn-bookmark').forEach(btn => {
    btn.addEventListener('click', async function () {

        let postID = this.dataset.id;
        let saved = this.dataset.saved === "1";

        // Tentukan endpoint
        let url = saved 
            ? "aksi/proses_hapus_bookmark.php?id=" + postID
            : "aksi/proses_bookmark.php?id=" + postID;

        // Kirim request
        await fetch(url);

        // Toggle status
        if (!saved) {
            // berubah menjadi DISIMPAN
            this.dataset.saved = "1";
            this.classList.remove("btn-light", "text-muted");
            this.classList.add("btn-primary", "text-white");
            this.innerHTML = `<i class="bi bi-bookmark-fill"></i> Disimpan`;
        } else {
            // berubah menjadi SIMPAN
            this.dataset.saved = "0";
            this.classList.remove("btn-primary", "text-white");
            this.classList.add("btn-light", "text-muted");
            this.innerHTML = `<i class="bi bi-bookmark"></i> Simpan`;
        }
    });
});
</script>

</body>
</html>