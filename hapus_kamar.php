<?php

include 'config/app.php';
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

    // ambil foto sesuai data yang dipilih
    $foto = select("SELECT * FROM data_kamar WHERE no_kamar = $id_kamar")[0];
    unlink("assets/img/" . $foto['foto']);

    //query hapus data siswa
    $query = "DELETE FROM data_kamar WHERE no_kamar = $id_kamar";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>
<?php
