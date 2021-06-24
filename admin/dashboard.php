<?php
include "../config/koneksi.php";

$query = mysqli_query($koneksi, "SELECT * FROM profil_sekolah");
$data = mysqli_fetch_array($query);
session_start();
define('MyConst',TRUE);

if (!isset( $_SESSION['username'])) {
    header('location:login.php');
} else {
    $user = $_SESSION['username'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/3ba93a3de6.js" crossorigin="anonymous"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- Editor TinyMce -->
    <script src="https://cdn.tiny.cloud/1/e02q5u96ktjlvnfds0hfdkvrvhxqu256c5j1dzftz0fsfg1s/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link rel="icon" href="../assets/img/<?=$data['gambar']?>" type="image/x-icon">
    <meta name="author" content="">
    <title>Administrator | <?= $data['nama_sekolah'] ?></title>
    <!-- CSS PUNYAKU -->
    <link href="../assets/css/admin.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar Atas -->
     <!--Navbar -->
    <div id="wrapper" class="">
    <nav class="navigasi navbar nav-fixed">
        <div class="container-fluid">
            <a href="#menu-toggle" id="menu-toggle"><i class="fas fa-bars"></i></a>
            <a class="navbar-brand" href="#">
                <img src="../assets/img/tutwuri.png" alt="" width="35" class="d-inline-block align-text-top">
            </a>
        </div>
    </nav>
    <!-- TUTUP-->
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand" style="padding-bottom: 15px;
    padding-top: 0px;">
                    <a href="#"><i class="fas fa-user"></i> Hai,
                        <?= $user;  ?>
                    </a>
                </li>
                <li>
                    <a href="?hal=home"><i class="fas fa-home"></i> Dashboard</a>
                </li>
                <li>
                    <a href="?hal=siswa"><i class="fas fa-user"></i> Data Siswa</a>
                </li>
                <li>
                    <a href="?hal=pengumuman"><i class="fas fa-bullhorn"></i> Pengumuman</a>
                </li>
                <li>
                    <a href="?hal=settings"><i class="fas fa-cogs"></i> Pengaturan Aplikasi</a>
                </li>
                <li>
                    <a href="?hal=user"><i class="fas fa-user-cog"></i> Manajemen Akun</a>
                </li>
                <li>
                    <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Keluar</a>
                </li>
            </ul>
        </div>
        <!-- TUTUP Sidebar -->
        <!-- Konten Utama -->
        <div id="page-content-wrapper">
            <?php include "menu.php" ?>
        </div>
        <!-- TUTUP Konten Utama -->
    </div>
    <!-- JS Untuk Ilang Timbul Menu ATAU TOGGLE HEHE-->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</body>
</html>