<?php
include '../config/database.php';


// //cek apakah tombol ubah di tekan
// if (isset($_POST['konfirmasi'])) {
//     if (update_kf($_POST) > 0) {
//         echo "<script>
    
//     alert('pesanan Berhasil di konfirmasi');
//         </script>";
//     } else {
//         echo "<script>
      
//         alert('pesanan gagal di konfirmasi');
//             </script>";
//     }
// }

// // fungsi mengubah data mahasiswa
// function update_kf($post)
// {
//     global $conn;

//     $tanggal_ci = $post['in'];
//     $status = $post['status'];

//     $query = "UPDATE pesan set  tanggal_ci = '$tanggal_ci' , status = '$status'  WHERE tanggal_ci = '$tanggal_ci' ";

//     mysqli_query($conn, $query);

//     return mysqli_affected_rows($conn);
// }
