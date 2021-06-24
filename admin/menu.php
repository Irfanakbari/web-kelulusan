<?php
   if(!defined('MyConst')) {
      die('Gak Boleh Akses Langsung Ke Sini');
   }

   // RUTE NAVIGASI HALAMAN
   define('Akses',TRUE);
   $halaman = array("home","siswa","user","pengumuman","settings");

   if(isset($_GET['hal'])) $hal = $_GET['hal'];
   else $hal = "home";

   foreach($halaman as $h){

      if($hal == $h){
         include "menu/$h/$h.php";
         break;
      }
   }
