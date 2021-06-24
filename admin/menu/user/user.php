<?php
if (!defined('Akses')) {
    die('Gak Boleh Akses Langsung Ke Sini');
}

?>

<div class="card">
    <div class="card-body">
        <i class="fas fa-user-cog"></i> Pengaturan Pengguna
    </div>
</div>
<br>
<!-- Modal Untuk Tambah Data -->
<div class="modal fade" id="tambahUser" tabindex="-1" aria-labelledby="tambahUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahUserLabel"><i class="fas fa-plus"></i> Tambah Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="menu/user/tambah.php">
                    <input type="hidden" value="" name="id" class="form-control" required="">
                    <div class="mb-3">
                        <label for="name" class="col-form-label">Nama :</label>
                        <input type="text" class="form-control" value="" id="name" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="col-form-label">Username :</label>
                        <input type="text" class="form-control" value="" id="username" name="username"></input>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="col-form-label">Password :</label>
                        <input type="password" class="form-control" id="password" name="password"></input>
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
<div class="card">
    <div class="card-body">
        <div class="container-fluid">
            <div class="row">
                <button class="btn btn-primary btn-rounded" style="width: 4cm; margin-left:1cm; margin-bottom:0.5cm" data-bs-toggle="modal" data-bs-target="#tambahUser">
                    <i class="fas fa-plus"></i> Tambah User
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
                                                    <th style="width: 10cm;">Nama</th>
                                                    <th>Username</th>
                                                    <th style="width: 6cm;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $query = mysqli_query($koneksi, "SELECT * FROM user ORDER BY id ASC");
                                                $no = 0;
                                                while ($data = mysqli_fetch_array($query)) {
                                                    $no++;
                                                ?>
                                                    <tr>
                                                        <th scope="row"><?= $no ?></th>
                                                        <td><?= $data['nama'] ?></td>
                                                        <td><?= $data['username'] ?></td>
                                                        <td class="aks">
                                                            <button class="btn btn-primary btn-rounded" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $no ?>">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button class="btn btn-danger btn-rounded" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $no ?>">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <!-- Modal Untuk Update Data -->
                                                    <div class="modal fade" id="exampleModal<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"></i> Edit Pengguna</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST" action="menu/user/update.php">
                                                                        <input type="hidden" value="<?= $data['id'] ?>" name="id" class="form-control" required="">
                                                                        <div class="mb-3">
                                                                            <label for="name" class="col-form-label">Nama :</label>
                                                                            <input type="text" class="form-control" value="<?= $data['nama'] ?>" id="name" name="nama">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="username" class="col-form-label">Username :</label>
                                                                            <input type="text" class="form-control" value="<?= $data['username'] ?>" id="username" name="username"></input>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="password" class="col-form-label">Password Baru :</label>
                                                                            <input type="password" class="form-control" id="password" name="password"></input>
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
                                                    <!-- Tutup Modal Untuk Update Data -->
                                                    <!-- Modal Mau Hapus? -->
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
                                                                    <form action="menu/user/hapus.php" method="post">
                                                                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                                        <button type="submit" class="btn btn-primary">Ya</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Tutup Modal Mau Hapus? -->
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