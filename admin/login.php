<?php
include "../config/koneksi.php";

$query = mysqli_query($koneksi, "SELECT * FROM profil_sekolah");
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | <?= $data['judul_web'] ?> </title>
    <link rel="icon" href="../assets/img/<?= $data['gambar'] ?>" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/login.css">
</head>

<body>
    <div class="log-form">
        <center>
            <h2>Login Administrator <?= $data['nama_sekolah'] ?></h2>
        </center>
        
        <form action="ceklogin.php" method="POST">
            <input type="text" name="username" required placeholder="Username" /><br />
            <input type="password" name="password" required placeholder="Password" /><br />
            <input class="btn" type="submit" name="dologin" value="Login" />
        </form>
    </div>

</body>

</html>