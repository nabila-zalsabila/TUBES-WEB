<?php
include '../config/koneksi.php';

$id = $_POST['id'];
$judul = $_POST['judul'];
$isi = $_POST['isi'];

$query = "UPDATE posts SET judul='$judul', isi='$isi' WHERE id='$id'";

if (mysqli_query($koneksi, $query)) {
    header("Location: ../tulisansaya.php");
} else {
    echo "Gagal: " . mysqli_error($koneksi);
}
?>