<?php 
 session_start();
 ob_start();

 include "../config/koneksi.php";

//  CEK SESI LOGIN
 if(empty($_SESSION['username']) or empty($_SESSION['password'])){
    echo "<p align='center'> Anda harus login terlebih dahulu!</p>";
    echo "<meta http-equiv='refresh' content='2'; url=login.php'>";
 }else{
   header("location:dashboard.php");
   $sesi=$_SESSION['username'];
 }
?>

