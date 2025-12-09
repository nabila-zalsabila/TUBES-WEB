<?php
session_start();
include '../config/koneksi.php';

$judul = $_POST['judul'];
$isi = $_POST['isi'];
$user_id = $_SESSION['user_id'];

$query = "INSERT INTO posts (user_id, judul, isi) VALUES ('$user_id', '$judul', '$isi')";

if (mysqli_query($koneksi, $query)) {
    header("Location: ../tulisansaya.php");
} else {
    echo "Gagal: " . mysqli_error($koneksi);
}
?>