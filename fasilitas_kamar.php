<?php include 'layout/header1.php';
include 'config/database.php';

$fasiliitas_kamar = SELECT("SELECT * FROM fasilitas_kamar ORDER BY no_kamar DESC");


// tambah
//cek apakah tombol tambah di tekan
if (isset($_POST['tambah'])) {
    if (create_FK($_POST) > 0) {
        echo "<script>
    alert('Data Barang Berhasil Di tambahkan');
    document.location.href = 'fasilitas_kamar.php';
        </script>";
    } else {
        echo "<script>
    alert('Data Barang Tidak Berhasil Di tambahkan');
    document.location.href = 'fasilitas_kamar.php';
    </script>";
    }
}
//fungsi menambahkan data barang
function create_FK($post)
{
    global $conn;

    //nama ini di ambil dari name di form    
    $id_kamar = strip_tags($post['no_kamar']);
    $nama_fasilitas = strip_tags($post['nama_fasilitas']);
    $fasilitas = strip_tags($post['fasilitas']);
    $fasilitas_lain = strip_tags($post['fasilitas_lain']);


    //query tambah data
    $query = "INSERT INTO fasilitas_kamar VALUES ('$id_kamar' , '$nama_fasilitas' , '$fasilitas' , '$fasilitas_lain')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


//cek apakah tombol ubah di tekan
if (isset($_POST['ubah'])) {
    if (update_FK($_POST)) {
        echo "<script>
    alert('Data kamar Berhasil Di ubah');
    document.location.href = 'fasilitas_kamar.php';
        </script>";
    } else {

        echo "<script>
  console.log('" . $_POST['harga'] . "');
    </script>";
    }
}

// fungsi mengubah data mahasiswa
function update_FK($post)
{
    global $conn;

    $id_kamar = strip_tags($post['no_kamar']);
    $nama_fasilitas = strip_tags($post['nama_fasilitas']);

    $query = "INSERT INTO fasilitas_kamar VALUES ('$id_kamar' , ' $nama_fasilitas' )";

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
                    <h1 class="m-0">Data fasilitas Kamar</h1>
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

                <!-- ./col -->
                <!-- <div class="col-lg-3 col-6">
                <!-- small box -->
                <!-- <div class="small-box bg-success">
                  <div class="inner">
                    <h3>3</h3> -->

                <!-- <p>Bounce Rate</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="#" class="small-box-footer">Lihat Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                </div> -->
                <!-- </div> -->
                <!-- ./col -->
                <!-- <div class="col-lg-3 col-6">
                <!-- small box -->
                <!-- <div class="small-box bg-warning">
                  <div class="inner">
                    <h3>1</h3>

                    <p>Kamar Kotor</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  <a href="#" class="small-box-footer">lihat Selengkapnya<i class="fas fa-arrow-circle-right"></i></a>
                </div> -->
                <!-- </div> -->

                <!-- ./col -->
                <!-- </div> -->
                <!-- /.row -->
                <!-- Main row -->
                <!-- Main content -->
                <div class="container-fluid">
                    <section class="content">

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Fasilitas kamar</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <a href="" class="btn btn-primary mb-1" data-toggle="modal" data-target="#modaltambah"><i class="fas fa-plus"></i>Tambah</a>
                                        <table id="example2" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No kamar</th>
                                                    <th>Nama Fasilitas</th>
                                                    <th>Fasilitas lain</th>
                                                    <th>Fasilitas lain</th>
                                                    <th>Aksi</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($fasiliitas_kamar as $kamar) : ?>

                                                    <td><?= $kamar['no_kamar']; ?></td>
                                                    <td><?= $kamar['nama_fasilitas']; ?></td>
                                                    <td><?= $kamar['fasilitas']; ?></td>
                                                    <td><?= $kamar['fasilitas_lain']; ?></td>
                                                    <td width="30%" class="text-center">

                                                        <a href="fasilitas_kamar.php?no_kamar=<?= $kamar['no_kamar']; ?>" data-toggle="modal" data-target="#modalubah<?= $kamar['no_kamar']; ?>" class="btn btn-success btn-sm"> Ubah</a>
                                                        <a href="fasilitas_kamar.php?no_kamar=<?= $kamar['no_kamar']; ?>" data-toggle="modal" data-target="#modalhapus<?= $kamar['no_kamar']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                                                    </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>


                                        <!-- modal tambah-->
                                        <div class="modal fade" id="modaltambah">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-primary">
                                                        <h4 class="modal-title">Tambah Data Fasilitas Kamar</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="" method="post" enctype="multipart/form-data">

                                                            <div class="mb-2">
                                                                <label for="no_kamar" class="form-label">No kamar</label>
                                                                <input type="number" class="form-control" id="no_kamar" name="no_kamar" value="<? $kamar['no_kamar']; ?>" placeholder="no kamar" required>
                                                            </div>
                                                            <div class="mb-2">
                                                                <label for="NM" class="form-label">Nama Fasilitas</label>
                                                                <input type="text" class="form-control" id="NM" name="nama_fasilitas" placeholder="Nama fasilitas" required>
                                                            </div>
                                                            <div class="mb-2">
                                                                <label for="NM" class="form-label">Nama Fasilitas lain</label>
                                                                <input type="text" class="form-control" id="NM" name="fasilitas" placeholder="Nama fasilitas" required>
                                                            </div>
                                                            <div class="mb-2">
                                                                <label for="nNM" class="form-label">Nama Fasilitas lain</label>
                                                                <input type="text" class="form-control" id="NM" name="fasilitas_lain" placeholder="Nama fasilitas" required>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                        <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>





                                        <!-- modal ubah -->
                                        <?php foreach ($fasiliitas_kamar as $kamar) : ?>
                                            <div class="modal fade" id="modalubah<?= $kamar['no_kamar']; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-success">
                                                            <h4 class="modal-title">Ubah Kamar</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="post">
                                                                <input type="hidden" name="id_kamar" value="<?= $kamar['no_kamar']; ?>">

                                                                <div class="mb-2">
                                                                    <label for="no_kamar" class="form-label">No kamar</label>
                                                                    <input type="number" class="form-control" id="no_kamar" name="no_kamar" value="<?= $kamar['no_kamar']; ?>" placeholder="no kamar" required>
                                                                </div>
                                                                <div class="mb-2">
                                                                    <label for="nNM" class="form-label">Nama Fasilitas</label>
                                                                    <input type="text" class="form-control" id="NM" name="nama_fasilitas" value="<?= $kamar['nama_fasilitas']; ?>" placeholder="Nama fasilitas" required>
                                                                </div>
                                                                <div class="mb-2">
                                                                    <label for="NM" class="form-label">Nama Fasilitas lain</label>
                                                                    <input type="text" class="form-control" id="NM" name="fasilitas" value="<?= $kamar['fasilitas']; ?>" required>
                                                                </div>
                                                                <div class="mb-2">
                                                                    <label for="nNM" class="form-label">Nama Fasilitas lain</label>
                                                                    <input type="text" class="form-control" id="NM" name="fasilitas_lain" value="<?= $kamar['fasilitas_lain']; ?>" required>
                                                                </div>

                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                            <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>


                                        <!-- modal hapus -->
                                        <?php foreach ($fasiliitas_kamar as $kamar) : ?>
                                            <div class="modal fade" id="modalhapus<?= $kamar['no_kamar']; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger">
                                                            <h4 class="modal-title">Hapus data Fasilitas??</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Yakin ingin mengapus data Fasilitas ini???</p>
                                                            <a href="hapus_FK.php?no_kamar=<?= $kamar['no_kamar'] ?>" type="submit" class="btn btn-primary" style="float: right;">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>


                                        <!-- modal detail -->
                                        <?php foreach ($fasiliitas_kamar as $kamar) : ?>
                                            <div class="modal fade" id="modaldetail<?= $kamar['no_kamar']; ?>">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary">
                                                            <h4 class="modal-title">Detail Data Kamar</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table table-bordered table-striped table-hover mt-3" style="justify-content: center;">
                                                                <tr>
                                                                    <td>Nomer kamar</td>
                                                                    <td>: <?= $kamar['no_kamar'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Tipe kamar</td>
                                                                    <td>: <?= $kamar['tipe_kamar'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Harga kamar </td>
                                                                    <td>: <?= $kamar['harga'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Lantai kamar</td>
                                                                    <td>: <?= $kamar['lantai_kamar'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Max Dewasa</td>
                                                                    <td>: <?= $kamar['max_dewasa'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Max Anak-anak</td>
                                                                    <td>: <?= $kamar['max_anak'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="50%">Foto</td>
                                                                    <td> <a href="assets/img/<?= $kamar['foto'] ?>">
                                                                            <img src="assets/img/<?= $kamar['foto'] ?>" width="40%">
                                                                        </a></td>
                                                                </tr>
                                                            </table>
                                                            <a href="admin.php" class="btn btn-secondary btn-sm" style="float:right;">Kembali</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                            <?php endforeach; ?>




                            <!-- previem image -->
                            <script>
                                function previewImg() {
                                    const foto = document.querySelector('#foto');
                                    const imgPreview = document.querySelector('.img-preview');

                                    const fileFoto = new FileReader();
                                    fileFoto.readAsDataURL(foto.files[0]);

                                    fileFoto.onload = function(e) {
                                        imgPreview.src = e.target.result;
                                    }
                                }
                            </script>
                    </section>
                </div>

            </div>

    </section>
    <!-- /.content -->

</div>

<!-- /.content-wrapper -->
<?php include 'layout/footer1.php'; ?>