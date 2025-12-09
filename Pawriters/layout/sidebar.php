<?php 
include 'layout/head.php';
?>
<div class="d-flex flex-column flex-shrink-0 bg-white border-end" style="width: 250px; height: 100vh;">
    
    <div class="p-3 border-bottom fw-bold fs-5">
       <img src="assets/img/logo.png" alt="Pawriterss Logo" class="ms-2" style="height:32px;"> Pawriterss 
    </div>

    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="index.php" class="nav-link <?= basename($_SERVER['PHP_SELF'])=='index.php'?'active':'link-dark' ?>">
                <i class="bi bi-house-door"></i> Beranda
            </a>
        </li>

        <li>
            <a href="tulisansaya.php" class="nav-link <?= basename($_SERVER['PHP_SELF'])=='tulisansaya.php'?'active':'link-dark' ?>">
                <i class="bi bi-file-earmark-text"></i> Tulisan Saya
            </a>
        </li>

        <li>
            <a href="daftarbacaan.php" class="nav-link <?= basename($_SERVER['PHP_SELF'])=='daftarbacaan.php'?'active':'link-dark' ?>">
                <i class="bi bi-bookmark"></i> Daftar Bacaan
            </a>
        </li>

        <li>
            <a href="profil.php" class="nav-link <?= basename($_SERVER['PHP_SELF'])=='profil.php'?'active':'link-dark' ?>">
                <i class="bi bi-person"></i> Profil
            </a>
        </li>
    </ul>

    <div class="mt-auto p-3 border-top">
        <a href="logout.php" class="text-danger fw-bold text-decoration-none">
            <i class="bi bi-box-arrow-right me-1"></i> Logout
        </a>
    </div>

</div>
