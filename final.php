<?php
session_start();
ob_start();

// CEK SESI
 if(empty($_SESSION['nisn'])){
    header('location:index.php');
 }
include "config/koneksi.php";
$kuery = mysqli_query($koneksi, "SELECT * FROM profil_sekolah");
$title = mysqli_fetch_array($kuery);

// UBAH DATA DI DB PAS BUKA HALAMAN INI
$monyet = mysqli_query($koneksi,"UPDATE siswa SET status='1' WHERE nisn='$_SESSION[nisn]' ");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/<?= $title['gambar'] ?>" type="image/x-icon">
    <title>Pengumuman Kelulusan</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/3ba93a3de6.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <div class="bg2">
    <!-- NAVBAR -->
        <div class="header d-flex">
            <div class="logo">
                <img src="assets/img/tutwuri.png" alt="">
            </div>
            <div class="sosmed">
                <a href="logout.php" class="sosm1" style="text-decoration:none;">
                    <i class="fas fa-sign-out-alt"></i>Logout
                </a>
            </div>
        </div>
    <!-- TUTUP NAVBAR -->
        <br><br>
    <!-- KONTEN UTAMA -->
        <div class="container-sm">
            <div class="card text-center">
                <div class="card-header" style="font-weight: bold;">
                    PENGUMUMAN KELULUSAN 2021
                </div>
                <?php
                $kuerry = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn='$_SESSION[nisn]'");
                $data = mysqli_fetch_array($kuerry);

                ?>
                <div class="card-body" style="padding: 1cm 1cm;">
                    <p class="card-text" style="text-transform: uppercase;">SISWA ATAS NAMA <strong><?= $data['nama_siswa'] ?></strong> DENGAN NISN <strong><?=$_SESSION['nisn'] ?></strong> DINYATAKAN:</p>
                    <?php
                    if ($data['keterangan'] == 0) { ?>
                        <h5 style="font-weight: bold;font-size:25px;color:red">TIDAK LULUS</h5>
                        <br>
                        <h4 class="card-title">TETAP SEMANGAT DAN JANGAN MENYERAH</h4>

                    <?php
                    } else { ?>
                        <h5 style="font-weight: bold;font-size:25px;color:green">LULUS</h5>
                        <br>
                        <h4 class="card-title">SELAMAT ATAS KEBERHASILANMU</h4>
                    <?php
                    }
                    ?>

                </div>
                <div class="card-footer text-muted">
                    <a href="portal.php" class="btn btn-primary"><i class="fas fa-chevron-left"></i> Kembali</a>
                </div>
            </div>
        </div>
    <!-- TUTUP KONTEN -->

</body>

</html>