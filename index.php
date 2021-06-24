<?php 
// AMBIL DATA DARI DATABASE
include "config/koneksi.php";
$query = mysqli_query($koneksi, "SELECT * FROM profil_sekolah");
$data = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul_web']; ?></title>
    <link rel="icon" href="assets/img/<?=$data['gambar']?>" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/3ba93a3de6.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <div class="bg ">
        <div class="header d-flex">
            <div class="logo">
                <img src="assets/img/<?=$data['gambar']?>" alt="">
            </div>
            <div class="sosmed">
                <a title="WhatsApp Admin" href="https://api.whatsapp.com/send?phone=62<?= $data['wa'] ?>" target="_blank" class="sosm1" style="text-decoration:none;">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </div>
        </div>
        <?php
        if ($data['status'] == 0) {
        ?>
            <div class="alert alert-danger container-sm d-flex align-items-center " role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </svg>
                <div>
                    Mohon Maaf Portal Pengumuman Belum Dibuka
                </div>
            </div>
        <?php
        }
        ?>
        <div class="main">
            <div class="judul">
                <?php
                if ($data['status'] == 1) {
                ?>
                    <p>Pengumuman Kelulusan</p>
                <?php
                } else {
                ?>
                    <center>
                        <p>Pengumuman Kelulusan</p>
                    </center>
                <?php
                }
                ?>

                <h3><?= $data['nama_sekolah'] ?></h3>
            </div>
            <?php
            if ($data['status'] == 1) {
            ?>
                <div class="form">
                    <h3>Login Siswa</h3>
                    <form action="cek.php" method="POST">
                        <input type="text" name="nisn" placeholder="NISN" />
                        <input class="btn" type="submit" name="login" value="Login" />
                    </form>  
                    <center>
                       <div style="margin-bottom: 2cm;">
                           <p>&copy; 2020 | Irfan Akbari Habibi</p>
                       </div>
                    </center>                
                </div>
            <?php
            }
            ?>
        </div>

</body>

</html>