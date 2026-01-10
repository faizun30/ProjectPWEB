<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Sistem Laporan Barang Hilang</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container">
        <div class="card">
            <div class="page-header">
                <h2><i class='bx bx-search-alt'></i> Sitem Laporan Barang Hilang</h2>
                
                <div class="search-box">
                    <i class='bx bx-search'></i>
                    <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Cari nama barang...">
                </div>
            </div>

            <a href="tambah.php" class="btn btn-primary">
                <i class='bx bx-plus-circle'></i> Catat Barang Temuan
            </a>
            
            <div class="table-responsive">
                <table id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Lokasi & Tanggal</th>
                            <th>Status</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM barang_temuan ORDER BY id DESC");
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td>
                                <strong><?php echo $data['nama_barang']; ?></strong>
                            </td>
                            <td>
                                <small><i class='bx bx-map'></i> <?php echo $data['lokasi_ditemukan']; ?></small><br>
                                <small style="color: var(--secondary-color);"><i class='bx bx-calendar'></i> <?php echo $data['tanggal_ditemukan']; ?></small>
                            </td>
                            <td>
                                <?php 
                                
                                if($data['status'] == 'Belum Diambil'){
                                    echo "<span class='badge badge-danger'>Belum Diambil</span>";
                                } else {
                                    echo "<span class='badge badge-success'>Sudah Diambil</span>";
                                }
                                ?>
                            </td>
                            <td style="text-align: center;">
                                <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-warning btn-sm">
                                    <i class='bx bx-edit-alt'></i>
                                </a>
                                <a href="#" onclick="konfirmasiHapus(<?php echo $data['id']; ?>, event)" class="btn btn-danger btn-sm">
                                    <i class='bx bx-trash'></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div> </div> </div>

    <?php if(isset($_GET['pesan']) && $_GET['pesan'] == 'sukses') : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Data telah disimpan.',
            timer: 2000,
            showConfirmButton: false
        })
    </script>
    <?php endif; ?>

    <script src="js/script.js"></script>
</body>
</html>
