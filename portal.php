<?php
include "config/koneksi.php";
session_start();
ob_start();

// CEK SESI LOGIN
if (empty($_SESSION['nisn'])) {
    header('location:index.php');
}
define('Home', TRUE);

// AMBIL DATA DARI DB
$query = mysqli_query($koneksi, "SELECT * FROM profil_sekolah");
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/<?= $data['gambar'] ?>" type="image/x-icon">
    <title>Home | <?= $data['judul_web']; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/3ba93a3de6.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <!-- Modal BUAT PENGUMUMAN -->
    <div class="modal fade" id="pengumuman" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pengumuman</h5>
                </div>
                <div class="modal-body">
                    <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM pengumuman");
                    $data = mysqli_fetch_array($query);
                    ?>
                    <center>
                        <h3><?= $data['judul'] ?></h3>
                    </center>

                    <p style="word-spacing:5px; line-height:1cm">
                        <?= $data['isi'] ?>
                    </p>
                </div>

                <div class="modal-footer">
                    <button type="button" style="color:white;" class="btn bg-success" data-bs-dismiss="modal">Oke</button>
                </div>
            </div>
        </div>
    </div>
    <!-- TUTUP MODAL PENGUMUMAN -->

    <div class="bg2">

        <!-- NAVIGASI ATAS -->
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
        <!-- AKHIR NAVIGASI -->

        <!-- ISI UTAMA -->
        <div class="main">
            <div class="judul">
                <h2>Hi, <?php
                        $querry = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn='$_SESSION[nisn]' ");
                        $hsil = mysqli_fetch_array($querry);
                        echo $hsil['nama_siswa']
                        ?></h2><br>
                <h4 class="pengumum">Silahkan Lihat Pengumuman Kelulusan Kamu</h4>
                <br>
                <h4>Teruslah belajar, berkarya, </h4>
                <h4>dan jadilah pribadi penebar manfaat.</h4>
                <br>
                <?php
                if ($data['id'] !== 0) {
                ?>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#pengumuman" class="btn btn-primary bg-danger fw-bold">Pengumuman</button>
                <?php
                }
                ?>

            </div>
            <a type="button" href="final.php?nis=<?= $_SESSION['nisn'] ?>" class="mantap">Pengumuman Lulus</a>
        </div>
        <!-- AKHIR ISI -->
</body>

</html>