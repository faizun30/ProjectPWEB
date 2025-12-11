<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_lostfound_nama"; // PENTING: Sesuaikan dengan nama database Anda tadi

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Gagal Konek: " . mysqli_connect_error());
}
?>