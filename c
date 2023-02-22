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
                    <span class="bagde bg-primary">Belum di konfirmasi</span>
                <?php  } else { ?>
                    <span class="bagde bg-success">Sudah di konfirmasi</span>
                <?php } ?>
            </td>

            <td>
                <a href="ubah.php?tanggal_ci=<?= $pesan['tanggal_ci'] ?>" class="btn btn-primary">Ubah</a>
                <a href="hapus.php?tanggal_ci=<?= $pesan['tanggal_ci'] ?>" class="btn btn-primary">Hapus</a>
            </td>
        <?php endforeach; ?>
    </tbody>



    <?php

    if ($pesan['status'] == 1) { ?>
        <span class="badge bg-warning">Belum Di Konfirmasi</span>
    <?php  } else { ?>
        <span class="badge bg-success">Sudah Di Konfirmasi</span>
    <?php } ?> -->

    <?php
    ?>