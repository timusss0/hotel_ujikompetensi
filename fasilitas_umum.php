<?php include 'layout/header1.php';

$fasilitas_umum = SELECT("SELECT * FROM fasilitas_umum ORDER BY id DESC");


//cek apakah tombol tambah di tekan
if (isset($_POST['tambah'])) {
    if (create_fasilitas($_POST) > 0) {
        echo "<script>
      alert('Data Barang Berhasil Di tambahkan');
      document.location.href = 'fasilitas_umum.php';
          </script>";
    } else {
        echo "<script>
      alert('Data Barang Tidak Berhasil Di tambahkan');
      document.location.href = 'fasilitas_umum.php';
      </script>";
    }
}


//fungsi menambahkan data fasilitas
function create_fasilitas($post)
{
    global $conn;

    //nama ini di ambil dari name di form    
    $nama_fasilitas = strip_tags($post['nama_fasilitas']);

    //query tambah data
    $query = "INSERT INTO fasilitas_umum VALUES (null,'$nama_fasilitas')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}



//cek apakah tombol ubah di tekan
if (isset($_POST['ubah'])) {
    if (update_FU($_POST) > 0) {
        echo "<script>
      alert('Data fasilitas publik Berhasil Di ubah');
      document.location.href = 'fasilitas_umum.php';
          </script>";
    } else {
        echo "<script>
      alert('Data fasilitas publik Tidak Berhasil Di ubah');
      document.location.href = 'fasilitas_umum.php';
      </script>";
    }
}

// fungsi mengubah data mahasiswa
function update_FU($post)
{
    global $conn;

    $id = strip_tags($post['id']);
    $FU = strip_tags($post['nama_fasilitas']);

    // query ubah data
    $query = "UPDATE fasilitas_umum SET nama_fasilitas =  '$FU'  WHERE  id = '$id' ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}



?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data fasilitas umum</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="container-fluid">
                    <section class="content">

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Data failitas Umum</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <a href="" class="btn btn-primary mb-1" data-toggle="modal" data-target="#modaltambah"><i class="fas fa-plus"></i>Tambah</a>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="example2" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Nomer</th>
                                                        <th>Nama Fasilitas</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <?php $no = 1; ?>
                                                        <?php foreach ($fasilitas_umum as $umum) : ?>

                                                            <td><?= $no++; ?></td>
                                                            <td><?= $umum['nama_fasilitas']; ?></td>
                                                            <td class="text-center">
                                                                <a href="fasilitas_umum.php?id=<?= $umum['id']; ?>" class="btn btn-success" data-toggle="modal" data-target="#modalubah<?= $umum['id']; ?>"> Ubah</a>
                                                                <a href="fasilitas_umum.php?id=<?= $umum['id']; ?>" data-toggle="modal" data-target="#modalhapus<?= $umum['id']; ?>" class="btn btn-danger">Hapus</a>
                                                            </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </tr>
                                                </tbody>
                                            </table>

                                            <!-- modal tambah -->
                                            <div class="modal fade" id="modaltambah">
                                                <div class="modal-dialog">
                                                    <div class="modal-content ">
                                                        <div class="modal-header bg-primary">
                                                            <h4 class="modal-title ">Tambah data fasilitas</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="fasilitas_umum.php" method="post" enctype="multipart/form-data">
                                                                <div class="mb-2 py-2">
                                                                    <label for="fasilitas" class="form-label">Nama Fasilitas</label>
                                                                    <input type="text" class="form-control" name="nama_fasilitas" id="fasilitas" placeholder="fasilitas umum">
                                                                </div>

                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                            <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                            <!-- modal hapus -->
                                            <?php foreach ($fasilitas_umum as $umum) : ?>
                                                <div class="modal fade" id="modalhapus<?= $umum['id']; ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-danger">
                                                                <h4 class="modal-title">Hapus data fasilitas??</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Yakin ingin mengapus data fasilitas ini???</p>
                                                                <a href="hapus_FU.php?id=<?= $umum['id'] ?>" type="submit" class="btn btn-danger btn-sm" style="float: right;">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>






                                            <!-- modal ubah -->
                                            <?php foreach ($fasilitas_umum as $umum) : ?>
                                                <div class="modal fade" id="modalubah<?= $umum['id']; ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-success">
                                                                <h4 class="modal-title">Ubah Data Fasiitas umum</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-2 py-2">
                                                                    <label for="fasilitas" class="form-label">Nama Fasilitas</label>
                                                                    <input type="text" class="form-control" name="nama_fasilitas" id="fasilitas" value="<?= $umum['nama_fasilitas']; ?>">
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                    <button type="submit" name="ubah"  class="btn btn-success">Ubah</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->

                                            <?php endforeach; ?>


                                        </div>
                                    </div>
                                </div>
                            </div>
                    </section>
                </div>
            </div>
    </section>
    <!-- /.content -->

</div>

<!-- /.content-wrapper -->
<?php include 'layout/footer1.php'; ?>