 <?php
session_start();
include '../config/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password']; // Hashing simpel

$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
    $_SESSION['status'] = "login";
    $_SESSION['user_id'] = $data['id'];
    $_SESSION['nama'] = $data['nama_lengkap'];
    header("Location: ../index.php");
} else {
    echo "<script>alert('Login Gagal!'); window.location='../login.php';</script>";
}
?>