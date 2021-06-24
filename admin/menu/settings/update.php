<?php
include "../../../config/koneksi.php";
session_start();

$namapk = $_POST['namapk'];
$namsek = $_POST['namsek'];
$status = $_POST['status'];
$wa = $_POST['wa'];
$gambar = $_FILES['gambar']['name'];


if ($gambar !== "") {
    $query = mysqli_query($koneksi, "UPDATE profil_sekolah SET nama_sekolah='$namsek',judul_web='$namapk',status='$status',wa='$wa', gambar='$gambar'");
    move_uploaded_file($_FILES['gambar']['tmp_name'], "../../../assets/img/" . $_FILES['gambar']['name']);
} else {
    $query = mysqli_query($koneksi, "UPDATE profil_sekolah SET nama_sekolah='$namsek',wa='$wa',judul_web='$namapk',status='$status'");
    move_uploaded_file($_FILES['gambar']['tmp_name'], "../../../assets/img/" . $_FILES['gambar']['name']);
}

if ($query) {
    echo "Data berhasil disimpan!";
    echo "<meta http-equiv='refresh' content='1; url=../../dashboard.php?hal=settings'>";
} else {
    echo "Tidak dapat menyimpan data!<br>";
}
