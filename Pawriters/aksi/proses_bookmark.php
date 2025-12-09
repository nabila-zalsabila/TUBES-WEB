<?php
session_start();
include '../config/koneksi.php';

$post_id = $_GET['id'];
$user_id = $_SESSION['user_id'];

// Cek apakah sudah dibookmark agar tidak duplikat
$cek = mysqli_query($koneksi, "SELECT * FROM bookmarks WHERE user_id='$user_id' AND post_id='$post_id'");
if (mysqli_num_rows($cek) == 0) {
    mysqli_query($koneksi, "INSERT INTO bookmarks (user_id, post_id) VALUES ('$user_id', '$post_id')");
}

header("Location: ../index.php");
?>