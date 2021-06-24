<?php
if (!defined('Akses')) {
   die('Gak Boleh Akses Langsung Ke Sini');
}
$query = mysqli_query($koneksi, "SELECT * FROM profil_sekolah");
$data = mysqli_fetch_array($query);
?>
<div class="card">
   <div class="card-body">
      <i class="fas fa-cogs"></i> Pengaturan
   </div>
</div>
<br>
<div class="card">
   <div class="card-body">
      <form action="menu/settings/update.php" method="post" enctype="multipart/form-data">
         <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Aplikasi</label>
            <input type="text" name="namapk" class="form-control" id="exampleFormControlInput1" value="<?= $data['judul_web'] ?>">
         </div>
         <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Sekolah</label>
            <input type="text" name="namsek" class="form-control" id="exampleFormControlInput1" value="<?= $data['nama_sekolah'] ?>">
         </div>
         <div class="row g-3">
            <div class=" col-md-5">
               <label for="exampleFormControlInput1" class="form-label">Status Portal</label>
               <select name="status" class="form-select" aria-label="Default select example">
                  <option value="1">Buka</option>
                  <option <?php
                           if ($data['status'] == 0) {
                              echo "selected";
                           }
                           ?> value="0">Tutup</option>
               </select>
            </div>
            <div class="mb-3 col-md-5">
            <label for="exampleFormControlInput1" class="form-label">Nomor WA Admin</label>
            <div class="input-group">
               <span class="input-group-text" id="addon-wrapping">+62</span>
               <input type="text" name="wa" style="min-height: calc(2.08rem + 6px);" class="form-control" value="<?= $data['wa'] ?>" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
         </div>
         </div>
      
         <div class="mb-3">
            <label for="formFileSm" class="form-label">Upload Logo</label>
            <input class="form-control form-control-sm" name="gambar" id="formFileSm" type="file">
         </div>
         <button type="submit" class="btn btn-success"><i class="far fa-save"></i> Simpan</button>
      </form>
   </div>
</div>