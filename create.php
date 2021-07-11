<?php
// Include koneksi database
include './config.php';

// Menangkap data yang di kirim dari form
$nama = $_POST['nama'];
$ktp = $_POST['ktp'];
$telpon = $_POST['telpon'];
$tahun = $_POST['tahun'];

//Mengikuti data ke database
mysqli_query($koneksi, "insert into karyawan values('','$nama','$ktp','$telpon','$tahun')");
//Mengembalikan ke halaman awal
header("location:./home.php");
