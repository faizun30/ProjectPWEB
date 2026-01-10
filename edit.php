<?php
include 'koneksi.php';

$id = $_GET['id'];

$data_awal = mysqli_query($koneksi, "SELECT * FROM barang_temuan WHERE id='$id'");
$d = mysqli_fetch_array($data_awal);


if (isset($_POST['update'])) {
    $nama = $_POST['nama_barang'];
    $lokasi = $_POST['lokasi_ditemukan'];
    $tgl = $_POST['tanggal_ditemukan'];
    $ciri = $_POST['ciri_ciri'];
    $status = $_POST['status'];

    $query = "UPDATE barang_temuan SET 
              nama_barang='$nama', 
              lokasi_ditemukan='$lokasi', 
              tanggal_ditemukan='$tgl', 
              ciri_ciri='$ciri',
              status='$status' 
              WHERE id='$id'";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Data Berhasil Diupdate!'); window.location='index.php';</script>";
    } else {
        echo "Gagal update: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="css/style.css">

    

</head>
<body>
    <div class="container">
        <h3>Edit Data Barang</h3>
        <a href="index.php" class="btn btn-kembali">< Kembali</a>

        <form name="formBarang" action="" method="POST">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" value="<?php echo $d['nama_barang']; ?>">

            <label>Lokasi Ditemukan</label>
            <input type="text" name="lokasi_ditemukan" value="<?php echo $d['lokasi_ditemukan']; ?>">

            <label>Tanggal Ditemukan</label>
            <input type="date" name="tanggal_ditemukan" value="<?php echo $d['tanggal_ditemukan']; ?>">

            <label>Ciri-ciri</label>
            <textarea name="ciri_ciri" rows="3"><?php echo $d['ciri_ciri']; ?></textarea>

            <label>Status</label>
            <select name="status">
                <option value="Belum Diambil" <?php if($d['status'] == 'Belum Diambil') echo 'selected'; ?>>Belum Diambil</option>
                <option value="Sudah Diambil" <?php if($d['status'] == 'Sudah Diambil') echo 'selected'; ?>>Sudah Diambil</option>
            </select>
            <br><br>

            <button type="submit" name="update" class="btn btn-simpan">Update Data</button>
        </form>
    </div>
</body>
</html>
