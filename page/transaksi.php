<?php

include 'koneksi.php';

$toastify = '<script src="assets/extensions/toastify-js/src/toastify.js"></script>';
if (isset($_SESSION['simpan_transaksi'])) {
    if ($_SESSION['simpan_transaksi'] === "sukses") {
        echo '
        ' . $toastify . '
        <script>
        Toastify({
            text: "Transaksi berhasil!!",
            duration: 3000,
            close: true,
            style: {
                background: "#5cb85c",
            }
        }).showToast();
        </script>';
        unset($_SESSION['simpan_transaksi']);
    } else if ($_SESSION['simpan_transaksi'] === "gagal") {
        echo '
        ' . $toastify . '
        <script>
        Toastify({
            text: "Data Gagal Disimpan!!",
            duration: 3000,
            close: true,
            style: {
                background: "#d9534f",
            }
        }).showToast();
        </script>';
        unset($_SESSION['simpan_transaksi']);
    }
}
if (isset($_SESSION['update_transaksi'])) {
    if ($_SESSION['update_transaksi'] === "sukses") {
        echo '
        ' . $toastify . '
        <script>
        Toastify({
            text: "Data Berhasil Diupdate!!",
            duration: 3000,
            close: true,
            style: {
                background: "#5cb85c",
            }
        }).showToast();
        </script>';
        unset($_SESSION['update_transaksi']);
    } else if ($_SESSION['update_transaksi'] === "gagal") {
        echo '
        ' . $toastify . '
        <script>
        Toastify({
            text: "Data Gagal Diupdate!!",
            duration: 3000,
            close: true,
            style: {
                background: "#d9534f",
            }
        }).showToast();
        </script>';
        unset($_SESSION['update_transaksi']);
    }
}
if (isset($_SESSION['delete_transaksi'])) {
    if ($_SESSION['delete_transaksi'] === "sukses") {
        echo '
        ' . $toastify . '
        <script>
        Toastify({
            text: "Data Berhasil Dihapus!!",
            duration: 3000,
            close: true,
            style: {
                background: "#5cb85c",
            }
        }).showToast();
        </script>';
        unset($_SESSION['delete_transaksi']);
    } else if ($_SESSION['delete_transaksi'] === "gagal") {
        echo '
        ' . $toastify . '
        <script>
        Toastify({
            text: "Data Gagal Dihapus!!",
            duration: 3000,
            close: true,
            style: {
                background: "#d9534f",
            }
        }).showToast();
        </script>';
        unset($_SESSION['delete_transaksi']);
    }
}

?>
<p>
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        Tambah Transaksi <i class="bi bi-folder-plus"></i>
    </button>
</p>
<section class="section">
    <div class="collapse" id="collapseExample">
        <div class="card card-body shadow p-3 mb-5 bg-body-tertiary rounded">
            <form class="form form-horizontal" action="function/proses_transaksi.php?aksi=simpan" method="post" enctype="multipart/form-data">
                <?php
                include 'koneksi.php';
                $querykode = mysqli_query(
                    $koneksi,
                    "SELECT max(id_transaksi) as idterbesar FROM transaksi"
                );
                $data = mysqli_fetch_array($querykode);
                $id_transaksi = $data['idterbesar'];
                $urutan = (int) substr($id_transaksi, 3, 3);
                $urutan++;
                $huruf = "INV";
                $idtransaksi = $huruf . sprintf("%03s", $urutan);
                ?>
                <input type="text" id="id_transaksi" class="form-control" value="<?= $idtransaksi ?>" name="id_transaksi" hidden />
                <div class="">
                    <div class="col-md-6">

                        <div class="form-group ">
                            <label class="col-sm-2 col-form-label">Pelanggan</label>
                            <div class="col-sm-10">
                                <select name="id_pelanggan" class="form-control" required>
                                    <option value="">Pilih Pelanggan</option>
                                    <?php
                                    $query = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                                    while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                        <option value="<?php echo $data['id_pelanggan'] ?>">
                                            <?php echo $data['nama_pelanggan'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group ">
                            <!-- <label class="col-sm-2 col-form-label">Tanggal</label> -->
                            <div class="col-sm-10">
                                <input type="hidden" name="tanggal" readonly <?php $Now = new DateTime('now', new DateTimeZone('Asia/Jakarta')); ?> value="<?php echo $Now->format('Y-m-d H:i:s'); ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group ">
                            <!-- <label class="col-sm-2 col-form-label">Admin</label> -->
                            <div class="col-sm-10">
                                <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>" readonly class="form-control">
                                <!-- <input type="text" value="<?php echo $_SESSION['username']; ?>" readonly class="form-control"> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label class="col-sm-2 col-form-label">Barang</label>
                            <div class="col-sm-10">
                                <select name="id_barang" id="id_barang" onchange="changeValueBarang(this.value)" class="form-control">
                                    <option disabled="" selected="">Pilih Barang</option>
                                    <?php
                                    $query = mysqli_query($koneksi, "SELECT * FROM barang");
                                    $jsBarang = "var dtBarang = new Array();\n";
                                    while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                        <option value="<?php echo $data['id_barang'] ?>">
                                            <?php echo $data['nama_barang'] ?></option>
                                        <?php $jsBarang .= "dtBarang['" . $data['id_barang'] . "'] = {harga:'" . addslashes($data['harga']) . "'};\n" ?>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-10">
                                <input type="number" name="harga" id="harga" readonly class="form-control">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2 col-form-label">Jumlah</label>
                            <div class="col-sm-10">
                                <input type="number" name="jumlah" id="jumlah" onkeyup="hitung()" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2 col-form-label">Total</label>
                            <div class="col-sm-10">
                                <input type="number" name="total" id="total" readonly class="form-control" required>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="reset" class="btn btn-info">Reset</button></button>
                    <button type="submit" class="btn btn-primary  float-right">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">

        <div class="card-body">
            <table class="table table-striped" id="table1">
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

                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `V_transaksi` ORDER BY `V_transaksi`.`id_transaksi` DESC";
                    $query = mysqli_query($koneksi, $sql);

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
                            <td class="text-center">
                                <a onclick="swalDelete('function/proses_transaksi.php?aksi=delete&id_transaksi=<?php echo $d['id_transaksi'] ?>')" class='badge bg-danger text-decoration-none'>
                                    <span data-feather='trash-2'></span>
                                </a>
                                <a href="struk.php?id_transaksi=<?php echo $d['id_transaksi'] ?>" class="badge bg-success text-decoration-none"><span data-feather='printer'></span></a>
                            </td>

                        </tr>
                    <?php } ?>
            </table>


        </div>
    </div>


    <script>
        function hitung() {
            var harga = document.getElementById('harga').value;
            var jumlah = document.getElementById('jumlah').value;
            var total = harga * jumlah;
            document.getElementById('total').value = total;
        }

        <?php echo $jsBarang; ?>

        function changeValueBarang(x) {
            document.getElementById('harga').value = dtBarang[x].harga;
        }
    </script>

</section>