<?php
include 'layout/header.php';

if (isset($_POST['pesan'])) {
  if (create_pesan($_POST) > 0) {
    echo "<script>
  alert('Permintaan pesan kamar di proses');
  document.location.href = 'index.php';
      </script>";
  } else {
    echo "<script>
  alert('Permintaan pesan kamar gagal di proses');
  document.location.href = 'index.php';
  </script>";
  }
}

function create_pesan($post)
{

  global $conn;

  $checkin   = $post['out'];
  $checkout  = $post['in'];
  $jumlah    = $post['jmlh'];
  $nama      = $post['nama'];
  $email      = $post['email'];
  $nohp      = $post['no'];
  $nama_tamu = $post['nama_tamu'];
  $tipe      = $post['Tipe'];

  $query = "INSERT INTO pesan VALUES ('$checkin' , '$checkout' , '$jumlah' , '$nama', '$email' , '$nohp' , '$nama_tamu' , '$tipe')";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}



?>

<style>
  .card {
    flex-direction: row;
  }

  .card img {
    width: 100%;
    height: 100%;

  }
</style>

<img src="assets/img/p.jpg" width="100%" style="filter: brightness(70%)" />



<div class="container">
  <form action="" method="post" class="row justify-content-center py-1">
    <div class="col-md-3">
      <label for="ci" class="mt-3">Check in</label>
      <input type="date" class="form-control" name="in" id="out" />
    </div>
    <div class="col-md-3">
      <label for="co" class="mt-3">Check out</label>
      <input type="date" class="form-control" name="out" id="out" />
    </div>
    <div class="col-md-3">
      <label for="jmlh" class="mt-3">Jumlah kamar</label>
      <input type="number" class="form-control" name="jmlh" id="jmlh">
    </div>
    <div class="col-md-3">
      <label for="pesan" class="form-label">ㅤ</label>
      <a href="" class="btn btn-primary mt-2 form-control" data-bs-target="#modalpesan" data-bs-toggle="modal">Pesan</a>
    </div>
  </form>
</div>

<!-- modal -->
<div class="modal fade" id="modalpesan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Isi form dengan benar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="mb-2">
            <label for="ci">Check in</label>
            <input type="date" class="form-control" name="in" id="co">
          </div>
          <div class="mb-2">
            <label for="co">Check out</label>
            <input type="date" class="form-control" name="out" id="co">
          </div>
          <div class="mb-2">
            <label for="jmlh">Jumlah kamar</label>
            <input type="number" class="form-control" name="jmlh" id="jmlh">
          </div>
          <div class="mb-2">
            <label for="nama">Nama pemesan</label>
            <input type="text" class="form-control" name="nama" id="nama">
          </div>
          <div class="mb-2">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email">
          </div>
          <div class="mb-2">
            <label for="no_hp">No Handphone</label>
            <input type="number" class="form-control" name="no" id="no_hp">
          </div>
          <div class="mb-2">
            <label for="nama_tamu">Nama Tamu</label>
            <input type="text" class="form-control" name="nama_tamu" id="nama_tamu">
          </div>
          <div class="mb-2">
            <label for="Tipe">Tipe kamar</label>
            <select id="Tipe" class="form-control" name="Tipe">
              <option selected>Pilih Tipe</option>
              <option value="Superior">Tipe Superior</option>
              <option value="Dulaxe">Tipe Delaxe</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="pesan" class="btn btn-primary">Pesan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Tentang kami -->
<div class="container py-5">
  <h2 style="margin-left: 34rem;">Tentang Kami</h2>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis cum hic, distinctio amet accusantium commodi quod, doloribus ipsam quia nisi quam. Molestias deleniti perferendis, incidunt ullam odit sit cupiditate voluptates fugit? Sit ducimus doloribus exercitationem, qui reprehenderit harum pariatur! Unde saepe rerum commodi adipisci repellat? Hic iure facere dignissimos iusto?
  </p>
</div>


<!-- kamar -->
<div class="container">
  <h2 style="margin-left: 37rem;">Kamar</h2>
</div>
<div class="container">
  <div class="row justify-content-center py-5">
    <div class="col-5">
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="assets/img/63ec3ffe6105d.jpg" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"></h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-5">
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="assets/img/63ec3ffe6105d.jpg" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include 'layout/footer.php';
?>