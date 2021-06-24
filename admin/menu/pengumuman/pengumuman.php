<?php
if (!defined('Akses')) {
   die('Gak Boleh Akses Langsung Ke Sini');
}
$query = mysqli_query($koneksi, "SELECT * FROM pengumuman WHERE id='1'");
$data = mysqli_fetch_array($query);
?>
<div class="card">
   <div class="card-body">
      <i class="fas fa-bullhorn"></i> Pengumuman
   </div>
</div>
<br>
<div class="card">
   <div class="card-body">
      <form action="menu/pengumuman/update.php" method="post" enctype="multipart/form-data">
         <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" id="exampleFormControlInput1" value="<?= $data['judul'] ?>">
         </div>
         <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea name="isi" class="form-control" rows="20" id="isi"><?= $data['isi'] ?></textarea>
         </div>
         <button type="submit" class="btn btn-success"><i class="far fa-save"></i> Simpan</button>
      </form>
   </div>
</div>
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',
   });
  </script>