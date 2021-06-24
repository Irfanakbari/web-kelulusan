<?php 
$host = "localhost";
$user = "root";
$pass = "";
$db = "pjuas";

$koneksi = mysqli_connect($host,$user,$pass,$db);
if (mysqli_connect_errno()){
    echo "Koneksi gagal: " . mysqli_connect_error();
  }

?>