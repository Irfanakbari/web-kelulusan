<?php 
include "../../../config/koneksi.php";
session_start();

$judul = $_POST['judul'];
$isi = $_POST['isi'];

$query = mysqli_query($koneksi,"UPDATE pengumuman SET judul='$judul', isi='$isi' WHERE id='1'");
if($query){
    echo "Data berhasil disimpan!";
    echo "<meta http-equiv='refresh' content='1; url=../../dashboard.php?hal=pengumuman'>";
 }else{
    echo "Tidak dapat menyimpan data!<br>";
 }

?>