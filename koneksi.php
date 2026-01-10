<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_sistem_laporan_barang_hilang";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Gagal Konek: " . mysqli_connect_error());
}
?>
