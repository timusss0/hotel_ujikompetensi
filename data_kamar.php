<?php include 'layout/header1.php';
include 'config/database.php';

$data_kamar = SELECT("SELECT * FROM data_kamar ORDER BY no_kamar DESC");

// menampilkan jumlah kamar
$datas_kamar = mysqli_query($conn, "SELECT*FROM data_kamar");
$jumlah_kamar = mysqli_num_rows($datas_kamar);

// tambah
//cek apakah tombol tambah di tekan
if (isset($_POST['tambah'])) {
    if (create_kamar($_POST) > 0) {
        echo "<script>
    alert('Data Kamar Berhasil Di tambahkan');
    document.location.href = 'data_kamar.php';
        </script>";
    } else {
        echo "<script>
    alert('Data Kamar Tidak Berhasil Di tambahkan');
    document.location.href = 'data_kamar.php';
    </script>";
    }
}
//fungsi menambahkan data barang
function create_kamar($post)
{
    global $conn;

    //nama ini di ambil dari name di form    
    $id_kamar = strip_tags($post['no_kamar']);
    $tipe_kamar = strip_tags($post['Tipe']);
    $harga = strip_tags($post['Harga']);
    $lantai_kamar = strip_tags($post['lantai']);
    $maxDewasa = strip_tags($post['maxDewasa']);
    $maxAnak = strip_tags($post['maxAnak']);
    $foto = upload_file();

    //check upload foto
    if (!$foto) {
        return false;
    }

    //query tambah data
    $query = "INSERT INTO data_kamar VALUES ('$id_kamar' , '$tipe_kamar' , '$harga' , '$lantai_kamar', '$maxDewasa' , '$maxAnak' , '$foto')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
function upload_file()
{
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];
    //cek file yang di upload
    $extensifileValid   = ['jpg', 'jpeg', 'png'];
    $extensifile        = explode('.', $namaFile); //ambil extensi file dari yang di gambar upload  //fungsi expload :untuk memecah sebuah sring jadi array
    $extensifile        = strtolower(end($extensifile));

    // cek format/extensi file
    if (!in_array($extensifile, $extensifileValid)) {
        //pesan gagal
        echo "<script>
                   alert('Format File Tidak Valid');
                   document.location.href = ubah_kamar.php';
               </script>";
        die();
    }

    // cek ukuran file 2 MB
    if ($ukuranFile > 2048000) {
        //pesan gagal
        echo "<script>
                   alert('Ukuran File Max 2 MB');
                   document.location.href = 'tambah_siswa.php';
               </script>";
        die();
    }

    // generate nama file baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensifile;

    // pindahkan ke Folder local
    move_uploaded_file($tmpName, 'assets/img/' . $namaFileBaru);
    return $namaFileBaru;
}



//cek apakah tombol ubah di tekan
if (isset($_POST['ubah'])) {
    if (update_kamar($_POST)) {
        echo "<script>
    alert('Data kamar Berhasil Di ubah');
    document.location.href = 'data_kamar.php';
        </script>";
    } else {

        echo "<script>
  console.log('" . $_POST['harga'] . "');
    </script>";
    }
}

// fungsi mengubah data mahasiswa
function update_kamar($post)
{
    global $conn;

    $id_kamar           = strip_tags($post['id_kamar']);
    $tipe_kamar        = strip_tags($post['Tipe']);
    $harga             = strip_tags($post['harga']);
    $lantai_kamar       = strip_tags($post['lantai']);
    $maxDewasa           = strip_tags($post['maxDewasa']);
    $maxAnak          = strip_tags($post['maxAnak']);
    $fotoLama         = strip_tags($post['fotoLama']);
    $query = '';
    $file_foto = (object) @$_FILES['foto'];

    // check upload foto baru atau tidak
    if (!@$file_foto->name) {
        $query = "UPDATE data_kamar SET tipe_kamar =  '$tipe_kamar'  , harga = '$harga', lantai_kamar = '$lantai_kamar' , max_dewasa = '$maxDewasa'  , max_anak = '$maxAnak' ,  WHERE  no_kamar = '$id_kamar' ";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    } else {
        $foto = upload_file();
        $query = "UPDATE data_kamar SET tipe_kamar =  '$tipe_kamar'  , harga = '$harga', lantai_kamar = '$lantai_kamar' , max_dewasa = '$maxDewasa'  , max_anak = '$maxAnak' , foto = '$foto'  WHERE  no_kamar = '$id_kamar' ";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }



}


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Kamar</h1>
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
                                        <h3 class="card-title">Data kamar</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <a href="" class="btn btn-primary mb-1" data-toggle="modal" data-target="#modaltambah"><i class="fas fa-plus"></i>Tambah</a>
                                        <table id="example2" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No kamar</th>
                                                    <th>Tipe Kamar</th>
                                                    <th>Harga</th>
                                                    <th>lantai kamar</th>
                                                    <th>Max Dewasa</th>
                                                    <th>Max anak-anak</th>
                                                    <th>Foto</th>
                                                    <th>Aksi</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($data_kamar as $kamar) : ?>

                                                    <td><?= $kamar['no_kamar']; ?></td>
                                                    <td><?= $kamar['tipe_kamar']; ?></td>
                                                    <td>Rp. <?= number_format($kamar['harga'], 0, ',', '.'); ?></td>
                                                    <td><?= $kamar['lantai_kamar']; ?></td>
                                                    <td><?= $kamar['max_dewasa']; ?></td>
                                                    <td><?= $kamar['max_anak']; ?></td>
                                                    <td> <a href="assets/img/<?= $kamar['foto'] ?>">
                                                            <img src="assets/img/<?= $kamar['foto'] ?>" width="50%">
                                                        </a>
                                                    </td>

                                                    <td width="20%" class="text-center">
                                                        <a href="admin.php?no_kamar=<?= $kamar['no_kamar']; ?>" data-toggle="modal" data-target="#modalubah<?= $kamar['no_kamar']; ?>" class="btn btn-success"> Ubah</a>
                                                        <a href="admin.php?no_kamar=<?= $kamar['no_kamar']; ?>" data-toggle="modal" data-target="#modalhapus<?= $kamar['no_kamar']; ?>" class="btn btn-danger">Hapus</a>
                                                        <a href="admin.php?no_kamar=<?= $kamar['no_kamar']; ?>" data-toggle="modal" data-target="#modaldetail<?= $kamar['no_kamar']; ?>" class="btn btn-primary">Detail</a>
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
                                                        <h4 class="modal-title">Tambah Data Kamar</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="" method="post" enctype="multipart/form-data">

                                                            <div class="mb-2">
                                                                <label for="no_kamar" class="form-label">No kamar</label>
                                                                <input type="number" class="form-control" id="no_kamar" name="no_kamar" placeholder="no kamar" required>
                                                            </div>

                                                            <div class="md-2">
                                                                <label for="Tipe">Tipe kamar</label>
                                                                <select id="Tipe" class="form-control" name="Tipe">
                                                                    <option selected>Pilih Tipe</option>
                                                                    <option value="Superior">Tipe Superior</option>
                                                                    <option value="Dulaxe">Tipe Delaxe</option>
                                                                </select>
                                                            </div>

                                                            <div class="mb-2 py-2">
                                                                <label for="harga" class="form-label">Harga</label>
                                                                <input type="number" class="form-control" name="Harga" id="Harga" placeholder="harga kamar">
                                                            </div>

                                                            <div class="mb-2 ">
                                                                <label for="lantai" class="form-label">Lantai Kamar</label>
                                                                <input type="number" class="form-control" name="lantai" id="lantai" placeholder="Lantai kamar">
                                                            </div>

                                                            <div class="mb-2">
                                                                <label for="maxDewasa" class="form-label">Maximal Dewasa</label>
                                                                <input type="number" class="form-control" name="maxDewasa" id="maxDewasa" placeholder="Maximal Dewasa">
                                                            </div>
                                                            <div class="mb-3 py-2">
                                                                <label for="maxAnak" class="form-label">Maximal Anak-Anak</label>
                                                                <input type="number" class="form-control" name="maxAnak" id="maxAnak" placeholder="Maximal anak anak">
                                                            </div>
                                                            <div class="mb-1">
                                                                <label for="foto" class="form-label">Foto</label>
                                                                <input type="file" class="form-control" name="foto" id="foto" placeholder="Foto..." onchange="previewImg()">
                                                                <img src="" alt="" class="img-thumbnail img-preview mt-2" width="200px">
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
                                        <?php foreach ($data_kamar as $kamar) : ?>
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
                                                                <input type="hidden" name="fotoLama" value="<?= $kamar['foto']; ?>">
                                                                <div class="mb-3">
                                                                    <label for="Tipe" class="form-label">Tipe Kamar</label>
                                                                    <select name="Tipe" id="Tipe" class="form-control" required>
                                                                        <?php $tipe = $kamar['tipe_kamar']; ?>
                                                                        <option value="Superior" <?= $tipe == 'Superior' ? 'selected' : null; ?>>Tipe Superior</option>
                                                                        <option value="Dulaxe" <?= $tipe == 'Dulaxe' ? 'selected' : null; ?>>Tipe Dulaxe</option>
                                                                    </select>

                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="harga" class="form-label">Harga</label>
                                                                    <input type="number" class="form-control" name="harga" id="harga" value="<?= $kamar['harga']; ?>" required>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="lantai" class="form-label">Lantai kamar</label>
                                                                    <input type="number" class="form-control" name="lantai" id="lantai" value="<?= $kamar['lantai_kamar']; ?>" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="maxDewasa" class="form-label">Maximal Dewasa</label>
                                                                    <input type="number" class="form-control" name="maxDewasa" id="maxDewasa" value="<?= $kamar['max_dewasa']; ?>" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="maxAnak" class="form-label">Maximal Anak-Anak</label>
                                                                    <input type="number" class="form-control" name="maxAnak" id="maxAnak" value="<?= $kamar['max_anak']; ?>" required>
                                                                </div>
                                                                <div>
                                                                    <label for="foto" class="form-label">Foto</label>
                                                                    <input type="file" class="form-control" name="foto" id="foto" onchange="previewImg()">

                                                                    <img src="assets/img/<?= $kamar['foto'] ?>" class="img-thumbnail img-preview mt-2" width="200px">
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
                                        <?php foreach ($data_kamar as $kamar) : ?>
                                            <div class="modal fade" id="modalhapus<?= $kamar['no_kamar']; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger">
                                                            <h4 class="modal-title">Hapus data kamar??</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Yakin ingin menghapus data kamar ini???</p>
                                                            <a href="hapus_kamar.php?no_kamar=<?= $kamar['no_kamar'] ?>" type="submit" class="btn btn-primary" style="float: right;">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>


                                        <!-- modal detail -->
                                        <?php foreach ($data_kamar as $kamar) : ?>
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
                                                                    <td> : <?= $kamar['no_kamar'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Tipe kamar</td>
                                                                    <td> : <?= $kamar['tipe_kamar'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Harga kamar </td>
                                                                    <td> : <?= $kamar['harga'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Lantai kamar</td>
                                                                    <td> : <?= $kamar['lantai_kamar'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Max Dewasa</td>
                                                                    <td> : <?= $kamar['max_dewasa'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Max Anak-anak</td>
                                                                    <td> : <?= $kamar['max_anak'] ?></td>
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