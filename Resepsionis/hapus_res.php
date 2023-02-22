<?php

include '../config/app.php';



function select($query)
{
  global $conn;

  $result = mysqli_query($conn, $query);

  $rows = [];

  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

//menerima id kamar yang dipilih pengguna
$id_kamar = (int)$_GET['tanggal_ci'];
if (delete_kamar($id_kamar) > 0) {
  echo "<script>
    alert('Pesanan berhasil di hapus');
    document.location.href = 'resepsionis.php';
     </script>";
} else {
  echo "<script>
    alert('Pesanan tidak berhasil di hapus);
    document.location.href = 'resepsionis.php';
     </script>";
}
//fungsi menghapus data siswa
function delete_kamar($id_kamar)
{
    global $conn;

    //query hapus data siswa
    $query = "DELETE FROM pesan WHERE tanggal_ci = $id_kamar";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>
<?php
