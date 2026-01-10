function searchTable() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("searchInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("dataTable");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function validasiInput(event) {
  var nama = document.forms["formBarang"]["nama_barang"].value;
  var lokasi = document.forms["formBarang"]["lokasi_ditemukan"].value;

  if (nama == "" || lokasi == "") {
    event.preventDefault(); 
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

function konfirmasiHapus(id, event) {
  event.preventDefault(); 

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
  
      window.location.href = "hapus.php?id=" + id;
    }
  });
}
