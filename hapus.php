<?php
include 'koneksi.php';

$id = $_GET['id'];

// Query Hapus
$query = "DELETE FROM barang_temuan WHERE id='$id'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    
    header("Location: index.php");
} else {
    echo "Gagal menghapus data.";
}
?>
