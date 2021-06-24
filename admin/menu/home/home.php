<?php
if (!defined('Akses')) {
  die('Gak Boleh Akses Langsung Ke Sini');
}

?>
<!-- CARD UNTUK JUDUL -->
<div class="card">
  <div class="card-body">
    <i class="fas fa-home"></i> Dashboard
  </div>
</div>
<!-- TUTUP CARD JUDUL -->
<br>
<!-- ALERT WELCOME -->
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Halo</strong> Selamat Datang Di Website Pengumuman Kelulusan
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  <br>
</div>
<!-- TUTUP ALERT -->

<!-- CARD KONTEN UTAMA -->
<div class="card">
  <div class="card-header">
    <strong><i class="fas fa-chart-bar"></i> STATISTIK SISWA</strong>
  </div>
  <div class="card-body">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 mb-3">
          <div class="ibox bg-primary color-white widget-stat">
            <div class="ibox-body" style="
  padding: 12px 15px; color:white">
              <h2 class="m-b-5 font-strong"> <?php $hitung = mysqli_query($koneksi, "SELECT * FROM siswa");
                                              $final = mysqli_num_rows($hitung);
                                              echo $final; ?></h2>
              <div class="m-b-5">DATA SISWA</div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
          <div class="ibox bg-info color-white widget-stat">
            <div class="ibox-body" style="
  padding: 12px 15px; color:white">
              <h2 class="m-b-5 font-strong"> <?php $hitung = mysqli_query($koneksi, "SELECT * FROM siswa WHERE keterangan='1'");
                                              $final = mysqli_num_rows($hitung);
                                              echo $final; ?></h2>
              <div class="m-b-5">SISWA LULUS</div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
          <div class="ibox bg-danger color-white widget-stat">
            <div class="ibox-body" style="
  padding: 12px 15px; color:white">
              <h2 class="m-b-5 font-strong"> <?php $hitung = mysqli_query($koneksi, "SELECT * FROM siswa WHERE keterangan!='1'");
                                              $final = mysqli_num_rows($hitung);
                                              echo $final; ?></h2>
              <div class="m-b-5">SISWA TIDAK LULUS</div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
          <div class="ibox bg-warning color-white widget-stat">
            <div class="ibox-body" style="
  padding: 12px 15px; color:white">
              <h2 class="m-b-5 font-strong"> <?php $hitung = mysqli_query($koneksi, "SELECT * FROM user");
                                              $final = mysqli_num_rows($hitung);
                                              echo $final; ?></h2>
              <div class="m-b-5">JUMLAH USER</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- TUTUP CARD KONTEN UTAMA -->
<br>

<!-- CARD STAT BUKA -->
<div class="card">
  <div class="card-header">
    <strong><i class="fas fa-eye"></i> STATISTIK TAMPILAN</strong>
  </div>
  <div class="card-body">
    <div class="container-fluid">
      <div class="row" style="align-content: center;">
        <div class="col-lg-6 col-md-6 mb-3">
          <div class="ibox bg-success color-white widget-stat">
            <div class="ibox-body" style="
  padding: 12px 15px; color:white">
              <h2 class="m-b-5 font-strong"> <?php $hitung = mysqli_query($koneksi, "SELECT * FROM siswa WHERE status='1'");
                                              $final = mysqli_num_rows($hitung);
                                              echo $final; ?></h2>
              <div class="m-b-5">TELAH DIBUKA</div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 mb-3">
          <div class="ibox bg-info color-white widget-stat">
            <div class="ibox-body" style="
  padding: 12px 15px; color:white">
              <h2 class="m-b-5 font-strong"> <?php $hitung = mysqli_query($koneksi, "SELECT * FROM siswa WHERE status='0'");
                                              $final = mysqli_num_rows($hitung);
                                              echo $final; ?></h2>
              <div class="m-b-5">BELUM DIBUKA</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- TUTUP CARD STAT BUKA -->
<br>
<!-- CARD UNTUK DETAIL WEBSITEKU -->
<div class="card">
  <div class="card-body">
    <center>
      <h5>
        UAS Pemrograman Web 5 2021
      </h5>
    </center>
    <br>
    <p>
      Made By IRFAN AKBARI HABIBI 201401086
    </p>
    <p>
      Estimated Working Time : 4 Days
    </p>
    <div class="row">
      <div class="about1 col-lg-6 col-md-6 mb-3">
        <p>
          <strong>Using :</strong>
        </p>
        <ul>
          <li>Bootstrap Version 5</li>
          <li>HTML</li>
          <li>CSS</li>
          <li>PHP</li>
          <li>JS</li>
          <li>Database MySQL</li>
          <li>FontAwesome</li>
          <li>Google Fonts</li>
          <li>Plugin PHP Excel Reader</li>
          <li>Plugin Text Editor TinyMCE</li>
        </ul>
      </div>
      <div class="about2 col-lg-6 col-md-6 mb-3">
        <p>
          <strong>Reference :</strong>
        </p>
        <ul>
          <li>Stackoverflow</li>
          <li>W3 Schools</li>
          <li>Bootstrap 5 Documentation</li>
          <li>Book "Pemrograman Web"</li>
          <li>Google</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- TUTUP DETAIL WEBSITE -->