<?php 
include "../../../config/koneksi.php";
session_start();

$nama = $_POST['nama'];
$nisn = $_POST['nisn'];
$kelas = $_POST['kelas'];
$id = $_POST['id'];
$keterangan = $_POST['keterangan'];

$query = mysqli_query($koneksi,"UPDATE siswa SET nama_siswa='$nama',nisn='$nisn',kelas='$kelas',keterangan='$keterangan' WHERE id='$id'");
if($query){
    echo "Data berhasil disimpan!";
    echo "<meta http-equiv='refresh' content='1; url=../../dashboard.php?hal=siswa'>";
 }else{
    echo "Tidak dapat menyimpan data!<br>";
 }

?>