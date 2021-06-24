<?php
include "../../../config/koneksi.php";
   $query = mysqli_query($koneksi, "DELETE FROM siswa WHERE id='$_POST[id]'");

   if($query){
      header('location:../../dashboard.php?hal=siswa');
   }else{
      echo "Tidak dapat Menghapus data!<br>";
      echo "<meta http-equiv='refresh' content='1; url=../../dashboard.php?hal=siswa'>";
   }
