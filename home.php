<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
    <link rel="icon" href="http://www.transparentpng.com/thumb/bleach/DhRKK4-bleach-simple.png">
    <title>PT Sawit Bahagia</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <div class="container">
            <img class="navbar-brand" src="http://www.transparentpng.com/thumb/bleach/DhRKK4-bleach-simple.png" alt="" width="30px">
            <a class="navbar-brand" href="home.php">General Manager PT Sawit Bahagia</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link active" aria-current="page" href="home.php">List Karyawan</a>
                        <a class="nav-link active" aria-current="page" href="index.php">Logout</a>
                    </div>
                </div>
        </div>
    </nav>
    <div class="container data-karyawan mt-5">
        <!-- Modal -->
        <!-- Pastikan modal berada di dalam container -->
        <!-- Button untuk memunculkan modal -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahData">
            Tambah Data</button>
        <!-- Modal tambah data-->
        <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Kita membuat form dengan method post untuk memanggil file create.php -->
                    <form method="post" action="create.php" name="form">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahDataLabel">Data Karyawan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Input nama -->
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Karyawan" name="nama" required>
                            </div>
                            <!-- Input No.KTP -->
                            <div class="mb-3">
                                <label for="NIM" class="form-label">No.KTP</label>
                                <input type="text" class="form-control" id="ktp" placeholder="Masukkan No.KTP Karyawan" name="ktp" required>
                            </div>
                            <!-- Input No.Telpon -->
                            <div class="mb-3">
                                <label for="Alamat" class="form-label">No.Telp</label>
                                <input type="text" class="form-control" id="telpon" placeholder="Masukkan No.Telp Karyawan" name="telpon" required>
                            </div>
                            <!-- Input tahun masuk -->
                            <div class="mb-3">
                                <label for="Alamat" class="form-label">tahun masuk</label>
                                <input type="date" class="form-control" id="tahun" placeholder="Masukkan tahun masuk Karyawan" name="tahun" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- Button close modal -->
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <!-- Button tambah data pastikan berada di dalam <form></form> -->
                            <button type="submit" class="btn btn-primary" value="SIMPAN">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Akhir Modal --> 
        <table class="table table-striped" id="tabelkaryawan">
            <thead>
                <tr>
                <th scope="col">No. </th>
                <th scope="col">Nama</th>
                <th scope="col">No.KTP</th>
                <th scope="col">No.Telp</th>
                <th scope="col">tahun masuk</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Memanggil config.php yang sudah kita buat
                include 'config.php';
                // Membuat variabel untuk nomor karyawan yang akan diincrement
                $no = 1;
                // Melakukan query
                $karyawan = mysqli_query($koneksi, "select * from karyawan");
                //Looping data karyawan
                while ($data = mysqli_fetch_array($karyawan)) {
                ?>
                    <!-- Menampilkan data karyawan ke dalam tabel -->
                    <tr>
                        <!-- Increment nomor baris $no++ -->
                        <td><?php echo $no++; ?></td>
                        <!-- Menampilkan data -->
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['ktp']; ?></td>
                        <td><?php echo $data['telpon']; ?></td>
                        <td><?php echo $data['tahun']; ?></td>
                        <!-- Kolom ini untuk aksi data karyawan -->
                        <td>
                            <!-- Aksi Edit Dan Delete, di sini menggunakan btn-sm agar tombolnya kecil -->
                            <a href="detail.php?id=<?php echo $data['id']; ?>" class="btn btn-success btn-sm text-white">Detail</a>
                            <!-- Link untuk masuk ke halaman edit -->
                            <!-- edit.php?id=<
                            ?php echo $data['id']; ?> Mengirimkan id dari data karyawan ke halaman edit -->
                            <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-warning btn-sm text-white">EDIT</a>
                            <!-- Link untuk delete berdasarkan id, akan keluar confirm terlebih dahulu -->
                            <a href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin Akan Menghapus Data Karyawan Ini?')">HAPUS</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <footer>
        <div class="footer container-fluid bg-dark">
          <div class="copyright">
            <div class class="row columns " style="margin-right: 0;margin-left: 0;padding: 10px 0;line-height:1; color: #929292;font-size: 12px;display:flex; justify-content: center">
              <span>© 2021 Muhammad Yahya Luqmanulhakim.</span>
            </div>
          </div>
        </div>
     </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script>    
        $(document).ready(function() {
            $('#tabelKaryawan').DataTable();
        } );
    </script>
</body>
</html>