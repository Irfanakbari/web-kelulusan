<?php
include "../../../config/koneksi.php";
   $query = mysqli_query($koneksi, "DELETE FROM user WHERE id='$_POST[id]'");

   if($query){
      echo "Data berhasil dihapus!";
      echo "<meta http-equiv='refresh' content='1; url=../../dashboard.php?hal=user'>";
   }else{
      echo "Tidak dapat menyimpan data!<br>";
   }
