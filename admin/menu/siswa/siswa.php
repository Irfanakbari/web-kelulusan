<?php
if (!defined('Akses')) {
    die('Gak Boleh Akses Langsung Ke Sini');
}

?>


<div class="card">
    <div class="card-body">
        <i class="fas fa-user"></i> Data Siswa
    </div>
</div>
<br>
<!-- Modal Untuk Import Siswa -->
<div class="modal fade" id="tambahUser" tabindex="-1" aria-labelledby="tambahUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahUserLabel"><i class="fas fa-upload"></i> Tambah Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Harap Kosongkan Data Siswa Supaya Gak Tertimpa</p>
                <p>Format Unduh <a href="../../../assets/template/format.xls" download="">Disini</a></p>
                <form method="POST" action="menu/siswa/import.php" enctype="multipart/form-data">
                    <input type="hidden" value="" name="id" class="form-control" required="">
                    <div class="mb-3">
                        <label for="name" class="col-form-label">Upload File :</label>
                        <input type="file" class="form-control" value="" id="file" name="file">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Tutup Modal -->
<!-- Konten Utama -->
<div class="card">
    <div class="card-body">
        <div class="container-fluid">
            <div class="row">
                <button class="btn btn-primary btn-rounded" style="width: 4cm; margin-left:1cm; margin-bottom:0.5cm" data-bs-toggle="modal" data-bs-target="#tambahUser">
                    <i class="fas fa-upload"></i> Import Data
                </button>
                <div class="col-lg-12">
                    <section class="ftco-section">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-wrap">
                                        <table class="table">
                                            <thead class="thead-primary" style="background: grey; color:white;">
                                                <tr>
                                                    <th>No</th>
                                                    <th>NISN</th>
                                                    <th style="width: 10cm;">Nama Siswa</th>
                                                    <th>Kelas</th>
                                                    <th>Keterangan</th>
                                                    <th style="width: 6cm;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $query = mysqli_query($koneksi, "SELECT * FROM siswa ORDER BY id ASC");
                                                $no = 0;
                                                while ($data = mysqli_fetch_array($query)) {
                                                    $no++;
                                                ?>
                                                    <tr>
                                                        <th scope="row"><?= $no ?></th>
                                                        <td><?= $data['nisn'] ?></td>
                                                        <td><?= $data['nama_siswa'] ?></td>
                                                        <td><?= $data['kelas'] ?></td>
                                                        

                                                            <?php if ($data['keterangan'] == 1) { ?>
                                                                <td style="color:green;font-weight:bold">Lulus</td>
                                                            <?php } else { ?>
                                                                <td style="color:red;font-weight:bold">Tidak Lulus</td>
                                                            <?php }

                                                            ?>

                                                        
                                                        <td class="aks">
                                                            <button class="btn btn-primary btn-rounded" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $no ?>">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button class="btn btn-danger btn-rounded" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $no ?>">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <!-- Modal Untuk Update Siswa -->
                                                    <div class="modal fade" id="exampleModal<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"></i> Edit Siswa</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST" action="menu/siswa/update.php">
                                                                        <input type="hidden" value="<?= $data['id'] ?>" name="id" class="form-control" required="">
                                                                        <div class="mb-3">
                                                                            <label for="name" class="col-form-label">Nama :</label>
                                                                            <input type="text" class="form-control" value="<?= $data['nama_siswa'] ?>" id="name" name="nama">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="username" class="col-form-label">NISN :</label>
                                                                            <input type="text" class="form-control" value="<?= $data['nisn'] ?>" id="username" name="nisn"></input>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="kelas" class="col-form-label">Kelas :</label>
                                                                            <input type="text" class="form-control" value="<?= $data['kelas'] ?>" id="kelas" name="kelas"></input>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="exampleFormControlInput1" class="form-label">Keterangan</label>
                                                                            <select name="keterangan" class="form-select" aria-label="Default select example">
                                                                                <option value="1">Lulus</option>
                                                                                <option <?php
                                                                                        if ($data['keterangan'] == 0) {
                                                                                            echo "selected";
                                                                                        }
                                                                                        ?> value="0">Tidak Lulus</option>
                                                                            </select>
                                                                        </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Tutup Modal Untuk Update Siswa -->
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="deleteModal<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Yakin Mau Hapus ?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="menu/siswa/hapus.php" method="post">
                                                                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                                        <button type="submit" class="btn btn-primary">Ya</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Tutup Modal Hapus Siswa -->
                                                <?php
                                                }
                                                ?>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Tutup Konten Utama -->