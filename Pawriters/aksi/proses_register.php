<?php
include '../config/koneksi.php';

$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];

$query = "INSERT INTO users (username, password, nama_lengkap) VALUES ('$username', '$password', '$nama')";

if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Daftar Berhasil, Silahkan Login'); window.location='../login.php';</script>";
} else {
    echo "Gagal: " . mysqli_error($koneksi);
}
?>