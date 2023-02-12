<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Laporan</h3>
    </div>

    <div class="card-body">
        <form action="" method="post" class="form-horizontal">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-2">
                    <input type="datetime-local" name="tanggal_awal" step="1" class=" form-control">
                </div>
                <div class="col-sm-2">
                    <input type="datetime-local" name="tanggal_akhir" step="1" class=" form-control">
                </div>
                <div class="col-sm-2">
                    <button type="submit" name="tampilkan" value="Tampilkan" class="btn btn-info">Tampilkan</button>
                </div>
            </div>
        </form>

        <table class="table table-striped mt-5">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">ID Transaksi</th>
                    <th scope="col">ID Pelanggan</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">id_barang</th>
                    <th scope="col">jumlah</th>
                    <th scope="col">Total</th>
                    <th scope="col">User</th>
                    <th scope="col">Aksi</th>


                </tr>
            </thead>
            <tbody>
                <?php

                require_once 'koneksi.php';
                if (isset($_POST["tampilkan"])) {
                    $tanggal_awal = $_POST['tanggal_awal'];
                    $tanggal_akhir = $_POST['tanggal_akhir'];
                    $query = mysqli_query($koneksi, "SELECT * FROM `V_transaksi` WHERE tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ");
                } else {


                    $query = mysqli_query($koneksi, "SELECT * FROM `V_transaksi` ORDER BY `V_transaksi`.`id_transaksi` DESC");
                }
                // $query = mysqli_query($koneksi, $sql);

                $no = 0; //variabel no


                while ($d = mysqli_fetch_array($query)) {

                    $no++
                ?>

                    <tr>
                        <th scope='row'><?php echo $no ?></th>

                        <td><?php echo $d['id_transaksi'] ?></td>
                        <td><?php echo $d['nama_pelanggan'] ?></td>
                        <td><?php echo $d['tanggal'] ?></td>
                        <td><?php echo $d['nama_barang'] ?></td>
                        <td><?php echo $d['jumlah'] ?></td>
                        <td><?php echo $d['total'] ?></td>
                        <td><?php echo $d['nama_user'] ?></td>
                        <td>
                            <a href="struk.php?id_transaksi=<?php echo $d['id_transaksi'] ?>" class="badge bg-success text-decoration-none"><span data-feather='printer'></span></a>
                        </td>

                    </tr>
                <?php } ?>
        </table>


    </div>
</div>