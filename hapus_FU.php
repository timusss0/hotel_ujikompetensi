<?php

include 'config/app.php';
//menerima id kamar yang dipilih pengguna
$id = (int)$_GET['id'];
if (delete_fasilitas($id) > 0) {
    echo "<script>
    alert('Data fasilitas berhasil di hapus');
    document.location.href = 'fasilitas_umum.php';
     </script>";
} else {
    echo "<script>
    alert('data fasitas tidak berhasil di hapus);
    document.location.href = 'fasilitas_umum.php';
     </script>";
}

//fungsi hapus
function delete_fasilitas($id)
{
    global $conn;


    // //ambil foto sesuai data yang di pilih 
    // $foto = select("SELECT * FROM fasilitas_umum WHERE id = $id")[0];
    // unlink("assets/img/".$foto['foto']);
    // //jika ada data foto akan di hapus

    //query hapus data
    $query = "DELETE FROM fasilitas_umum WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
