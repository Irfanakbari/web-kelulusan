<?php 
include "config/koneksi.php";
session_start();

// NGAMBIL DARI FORM LOGIN
$nisn = $_POST['nisn'];

// CEK DATA DI DATABASE
$cek = mysqli_query($koneksi,"SELECT * FROM siswa WHERE nisn='$nisn'");
$result = mysqli_num_rows($cek);

// HASIL PENGECEKAN KALAU TRUE
if ($result == true) {
    $_SESSION['nisn'] = $nisn;
    define('Home',TRUE);
    header('location:portal.php');
    
} else {
    header ('location:index.php');
}
?>