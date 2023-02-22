<?php
include '../config/app.php';

// $_POST = memanggil data yang telah diinputkan agar bisa ditampilkan di file action.
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    if ($row['id_level'] == 1) {
        header("location:../Admin/admin.php");
    } elseif ($row['id_level'] == 2) {
        header('location:../Resepsionis/resepsionis.php');
    } else {
        echo "<script>alert('anda tidak memiliki hak akses')
          document.location='login.php'</script>";
    }
} else {
    echo "<script>alert('Maaf login gagal, username dan password anda salah.!!')
    document.location='login.php'</script>";
}
