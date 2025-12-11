<?php
include 'koneksi.php';

// Tangkap ID dari URL
$id = $_GET['id'];

// Query Hapus
$query = "DELETE FROM barang_temuan WHERE id='$id'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    // Jika berhasil hapus, langsung balik ke index
    header("Location: index.php");
} else {
    echo "Gagal menghapus data.";
}
?>