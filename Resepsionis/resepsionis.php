<?php include 'headerR.php';
include '../config/database.php';

$pesan_kamar = SELECT("SELECT * FROM pesan");



//cek apakah tombol ubah di tekan
if (isset($_POST['konfirmasi'])) {
     if (update_kf($_POST) > 0) {
          echo "<script>
     
     alert('pesanan Berhasil di konfirmasi');
         </script>";
     } else {
          echo "<script>
       
         alert('pesanan gagal di konfirmasi');
             </script>";
     }
}

// fungsi mengubah data mahasiswa
function update_kf($post)
{
     global $conn;

     $tanggal_ci = $post['in'];
     $status = $post['status'];

     $query = "UPDATE pesan set  tanggal_ci = '$tanggal_ci' , status = '$status'  WHERE tanggal_ci = '$tanggal_ci' ";

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
                         <h1 class="m-0">Data Pesanan</h1>
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
                                                  <h3 class="card-title">Data Pesanan</h3>
                                             </div>
                                             <!-- /.card-header -->
                                             <div class="card-body">

                                                  <table id="example2" class="table table-bordered table-hover">
                                                       <thead>
                                                            <tr>
                                                                 <th>Tanggal checkin </th>
                                                                 <th>Tanggal Checkout</th>
                                                                 <th>Jumlah Kamar</th>
                                                                 <th>Nama Pesanan</th>
                                                                 <th>Email</th>
                                                                 <th>No handphone</th>
                                                                 <th>Nama Tamu</th>
                                                                 <th>Tipe Kamar</th>
                                                                 <th>Status</th>
                                                                 <th>Aksi</th>

                                                            </tr>
                                                       </thead>
                                                       <tbody>
                                                            <?php foreach ($pesan_kamar as $pesan) : ?>

                                                                 <td> <?= $pesan['tanggal_ci']; ?></td>
                                                                 <td> <?= $pesan['tanggal_co']; ?></td>
                                                                 <td> <?= $pesan['jumlah_kmr']; ?></td>
                                                                 <td> <?= $pesan['nama_pemesan']; ?></td>
                                                                 <td> <?= $pesan['email']; ?></td>
                                                                 <td> <?= $pesan['no_hp']; ?></td>
                                                                 <td> <?= $pesan['nama_tamu']; ?></td>
                                                                 <td> <?= $pesan['tipe_kamar']; ?></td>


                                                                 <td>


                                                                      <?php
                                                                      if ($pesan['status'] == 1) { ?>
                                                                           <span class="badge bg-warning">Belum di konfirmasi</span>
                                                                      <?php  } else { ?>
                                                                           <span class="badge bg-success">Sudah di konfirmasi</span>
                                                                      <?php } ?>
                                                                 </td>


                                                                 </td>

                                                                 <td>
                                                                      <form action="resepsionis.php" method="post">
                                                                           <input type="hidden" name="in" value=" <?php echo $pesan['tanggal_ci']; ?>">
                                                                           <input type="hidden" name="status" value="<?php echo $pesan['status']; ?>">
                                                                           <button name="konfirmasi" class="btn btn-warning btn-sm">Konfirmasi</button>
                                                                      </form>
                                                                      <a href="hapus_res.php?tanggal_ci=<?= $pesan['tanggal_ci']; ?>" onclick="alert('APUS')" class="btn btn-danger btn-sm">Hapus</a>
                                                                 </td>
                                                                 </tr>
                                                            <?php endforeach; ?>
                                                       </tbody>
                                                  </table>

                                                  <!-- Modal -->
                                                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                       <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                 <div class="modal-header">
                                                                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                 </div>
                                                                 <div class="modal-body">
                                                                      ...
                                                                 </div>
                                                                 <div class="modal-footer">
                                                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                      <button type="button" class="btn btn-primary">Save changes</button>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                         </section>
                    </div>
               </div>
     </section>
</div>


<?php include 'footerR.php'; ?>