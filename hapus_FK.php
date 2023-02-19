<?php

include 'config/app.php';
//menerima id kamar yang dipilih pengguna
$id_kamar = (int)$_GET['no_kamar'];
if (delete_FK($id_kamar) > 0) {
    echo "<script>
    alert('Data fasilitas berhasil di hapus');
    document.location.href = 'fasilitas_kamar.php';
     </script>";
} else {
    echo "<script>
    alert('data fasitas tidak berhasil di hapus);
    document.location.href = 'fasilitas_kamar.php';
     </script>";
}

//fungsi hapus
function delete_FK($id_kamar)
{

    global $conn;
    //query hapus data
    $query = "DELETE FROM fasilitas_kamar WHERE no_kamar = $id_kamar";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
