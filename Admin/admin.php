<?php include 'header1.php';
include '../config/database.php';




// menampilkan jumlah kamar
$datas_kamar = mysqli_query($conn, "SELECT*FROM data_kamar");
$jumlah_kamar = mysqli_num_rows($datas_kamar);

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard Admin</h1>
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
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>
                <?php echo $jumlah_kamar; ?>
              </h3>

              <p>Kamar Tersedia</p>
            </div>
            <div class="icon">
              <i class="fas fa-bed"></i>
            </div>
            <a href="data_kamar.php" class="small-box-footer">Lihat Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

      </div>
    </div>
  </section>
</div>
<!-- /.content-wrapper -->
<?php include 'layout/footer1.php'; ?>