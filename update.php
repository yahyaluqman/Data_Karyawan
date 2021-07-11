<?php
// koneksi database
include './config.php';

// menangkap data di kirim dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$ktp = $_POST['ktp'];
$telpon = $_POST['telpon'];
$tahun = $_POST['tahun'];

// update data ke database
mysqli_query($koneksi,"UPDATE karyawan set nama='$nama', ktp='$ktp',telpon='$telpon', tahun='$tahun' where id='$id'");

// mengalihkan halaman kembali ke home.php
header("location:home.php");
