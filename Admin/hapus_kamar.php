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
$id_kamar = (int)$_GET['no_kamar'];
if (delete_kamar($id_kamar) > 0) {
  echo "<script>
    alert('Data kamar berhasil di hapus');
    document.location.href = 'data_kamar.php';
     </script>";
} else {
  echo "<script>
    alert('data kamar tidak berhasil di hapus);
    document.location.href = 'data_kamar.php';
     </script>";
}
//fungsi menghapus data siswa
function delete_kamar($id_kamar)
{
    global $conn;

    //query hapus data siswa
    $query = "DELETE FROM data_kamar WHERE no_kamar = $id_kamar";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>
<?php
