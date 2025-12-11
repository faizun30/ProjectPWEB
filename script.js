// 1. Fitur Live Search (Pencarian Instan di Tabel)
function searchTable() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("searchInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("dataTable");
  tr = table.getElementsByTagName("tr");

  // Looping semua baris tabel
  for (i = 0; i < tr.length; i++) {
    // Cek kolom Nama Barang (indeks ke-1)
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      // Jika cocok, tampilkan. Jika tidak, sembunyikan (display: none)
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

// 2. Validasi Form (Pakai SweetAlert Error)
function validasiInput(event) {
  var nama = document.forms["formBarang"]["nama_barang"].value;
  var lokasi = document.forms["formBarang"]["lokasi_ditemukan"].value;

  if (nama == "" || lokasi == "") {
    event.preventDefault(); // Mencegah form submit
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Nama Barang dan Lokasi wajib diisi!",
      confirmButtonColor: "#4e73df",
    });
    return false;
  }
  return true;
}

// 3. Konfirmasi Hapus Modern (Pakai SweetAlert Confirm)
function konfirmasiHapus(id, event) {
  event.preventDefault(); // Mencegah link langsung jalan

  Swal.fire({
    title: "Yakin hapus data ini?",
    text: "Data tidak bisa dikembalikan lagi!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#e74a3b",
    cancelButtonColor: "#858796",
    confirmButtonText: "Ya, Hapus!",
    cancelButtonText: "Batal",
  }).then((result) => {
    if (result.isConfirmed) {
      // Jika klik YA, baru arahkan ke hapus.php
      window.location.href = "hapus.php?id=" + id;
    }
  });
}
