<?php
session_start();
include '../config/koneksi.php';

if (!isset($_SESSION['user_id'])) {
    exit("Not authorized");
}

$user_id = $_SESSION['user_id'];
$post_id = $_GET['id'];

// Hapus bookmark berdasarkan user & post
mysqli_query($koneksi, "
    DELETE FROM bookmarks 
    WHERE user_id='$user_id' AND post_id='$post_id'
");
?>
