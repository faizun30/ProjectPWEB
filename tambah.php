<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    // (Bagian ambil data $_POST sama seperti sebelumnya...)
    $nama = $_POST['nama_barang'];
    $lokasi = $_POST['lokasi_ditemukan'];
    $tgl = $_POST['tanggal_ditemukan'];
    $ciri = $_POST['ciri_ciri'];
    $status = $_POST['status'];

    $query = "INSERT INTO barang_temuan (nama_barang, lokasi_ditemukan, tanggal_ditemukan, ciri_ciri, status) 
              VALUES ('$nama', '$lokasi', '$tgl', '$ciri', '$status')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // UBAH INI: Redirect dengan parameter pesan sukses
        header("Location: index.php?pesan=sukses");
    } else {
        echo "Gagal: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="card" style="max-width: 700px; margin: auto;">
            <div class="page-header">
                 <h2><i class='bx bx-folder-plus'></i> Tambah Data</h2>
            </div>
            
            <form name="formBarang" action="" method="POST" onsubmit="return validasiInput(event)">
                
                <div class="form-group">
                    <label class="form-label">Nama Barang</label>
                    <input type="text" name="nama_barang" placeholder="Misal: Dompet Coklat">
                </div>

                <div class="form-group">
                     <label class="form-label">Lokasi Ditemukan</label>
                     <input type="text" name="lokasi_ditemukan" placeholder="Misal: Lobby Utama">
                </div>

                <div class="form-group" style="display: flex; gap: 20px;">
                    <div style="flex: 1;">
                         <label class="form-label">Tanggal Ditemukan</label>
                         <input type="date" name="tanggal_ditemukan">
                    </div>
                    <div style="flex: 1;">
                         <label class="form-label">Status Awal</label>
                         <select name="status">
                             <option value="Belum Diambil">Belum Diambil</option>
                         </select>
                    </div>
                </div>

                <div class="form-group">
                     <label class="form-label">Ciri-ciri / Keterangan</label>
                     <textarea name="ciri_ciri" rows="4" placeholder="Detail barang..."></textarea>
                </div>
                <br>
                <div style="display: flex; gap: 10px;">
                    <a href="index.php" class="btn btn-secondary"><i class='bx bx-arrow-back'></i> Batal</a>
                    <button type="submit" name="simpan" class="btn btn-primary" style="flex: 1;">
                        <i class='bx bx-save'></i> Simpan Data
                    </button>
                </div>

            </form>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>