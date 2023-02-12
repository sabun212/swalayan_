<?php

require_once 'koneksi.php';

$toastify = '<script src="assets/extensions/toastify-js/src/toastify.js"></script>';
if (isset($_SESSION['simpan_pelanggan'])) {
    if ($_SESSION['simpan_pelanggan'] === "sukses") {
        echo '
        ' . $toastify . '
        <script>
        Toastify({
            text: "Data Berhasil Disimpan!!",
            duration: 3000,
            close: true,
            style: {
                background: "#5cb85c",
            }
        }).showToast();
        </script>';
        unset($_SESSION['simpan_pelanggan']);
    } else if ($_SESSION['simpan_pelanggan'] === "gagal") {
        echo '
        ' . $toastify . '
        <script>
        Toastify({
            text: "Data Gagal Disimpan!!",
            duration: 3000,
            close: true,
        }).showToast();
        </script>';
        unset($_SESSION['simpan_pelanggan']);
    }
}
if (isset($_SESSION['update_pelanggan'])) {
    if ($_SESSION['update_pelanggan'] === "sukses") {
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
        unset($_SESSION['update_pelanggan']);
    } else if ($_SESSION['update_pelanggan'] === "gagal") {
        echo '
        ' . $toastify . '
        <script>
        Toastify({
            text: "Data Gagal Diupdate!!",
            duration: 3000,
            close: true,
        }).showToast();
        </script>';
        unset($_SESSION['update_pelanggan']);
    }
}
if (isset($_SESSION['delete_pelanggan'])) {
    if ($_SESSION['delete_pelanggan'] === "sukses") {
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
        unset($_SESSION['delete_pelanggan']);
    } else if ($_SESSION['delete_pelanggan'] === "gagal") {
        echo '
        ' . $toastify . '
        <script>
        Toastify({
            text: "Data Gagal Dihapus!!",
            duration: 3000,
            close: true,
        }).showToast();
        </script>';
        unset($_SESSION['delete_pelanggan']);
    }
}

?>
<p>
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        Tambah Pelanggan <i class="bi bi-folder-plus"></i>
    </button>
</p>
<section class="section">
    <div class="collapse" id="collapseExample">
        <div class="card card-body shadow p-3 mb-5 bg-body-tertiary rounded">
            <form class="form form-horizontal" action="function/proses_pelanggan.php?aksi=simpan" method="post" enctype="multipart/form-data">
                <?php
                include 'koneksi.php';
                $querykode = mysqli_query(
                    $koneksi,
                    "SELECT max(id_pelanggan) as idterbesar FROM pelanggan"
                );
                $data = mysqli_fetch_array($querykode);
                $id_pelanggan = $data['idterbesar'];
                $urutan = (int) substr($id_pelanggan, 3, 3);
                $urutan++;
                $huruf = "PEL";
                $idpelanggan = $huruf . sprintf("%03s", $urutan);
                ?>
                <div class="form-body">
                    <div class="">

                        <div class="col-md-8">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="hidden" class="form-control" placeholder="ID Pelanggan" id="first-name-icon" value="<?php echo $idpelanggan ?>" readonly name="id_pelanggan">
                                    <div class="form-control-icon">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Nama Pelanggan</label>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="text" class="form-control" placeholder="Nama Pelanggan" id="first-name-icon" name="nama_pelanggan">
                                    <div class="form-control-icon">
                                        <i class="bi bi-person-fill"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Jenis Kelamin</label>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <select class="form-control select2 input100" name="jenis_kelamin" required>
                                        <option value="">Jenis Kelamin </option>
                                        <option value="Laki-Laki">Laki - Laki </option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    <div class="form-control-icon">
                                        <i class="bi bi-gender-ambiguous"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Alamat</label>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="text" class="form-control" placeholder="Alamat" name="alamat">
                                    <div class="form-control-icon">
                                        <i class="bi bi-geo-alt-fill"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label>No HP</label>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="number" class="form-control" placeholder="NO HP" name="no_hp" required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-phone"></i>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-12 d-flex justify-content-center mt-5">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                        </div>
                    </div>
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
                        <th scope="col">ID Pelanggan</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Nomor HP</th>

                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `pelanggan` ORDER BY `pelanggan`.`id_pelanggan` DESC";
                    $query = mysqli_query($koneksi, $sql);

                    $no = 0; //variabel no


                    while ($d = mysqli_fetch_array($query)) {

                        $no++
                    ?>

                        <tr>
                            <th scope='row'><?php echo $no ?></th>

                            <td><?php echo $d['id_pelanggan'] ?></td>
                            <td><?php echo $d['nama_pelanggan'] ?></td>
                            <td><?php echo $d['jenis_kelamin'] ?></td>
                            <td><?php echo $d['alamat'] ?></td>
                            <td><?php echo $d['no_hp'] ?></td>
                            <td class="text-center">

                                <a href='' class='badge bg-warning text-decoration-none' data-bs-toggle="modal" data-bs-target="#edit<?php echo $d['id_pelanggan'] ?>"><span data-feather='edit'></span></a> |
                                <a onclick="swalDelete('function/proses_pelanggan.php?aksi=delete&id_pelanggan=<?php echo $d['id_pelanggan'] ?>')" class='badge bg-danger text-decoration-none'>
                                    <span data-feather='trash-2'></span>

                                </a>

                            </td>

                        </tr>
                    <?php } ?>
            </table>

            <?php
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi, "select * from pelanggan");
            while ($d = mysqli_fetch_array($data)) {
            ?>
                <div class="modal-primary me-1 mb-1 d-inline-block">

                    <!--primary theme Modal -->
                    <div class="modal fade text-left" id="edit<?php echo $d['id_pelanggan'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title white" id="myModalLabel133">
                                        Edit Pelanggan
                                    </h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="function/proses_pelanggan.php?aksi=update" method="post">
                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <div class="col-md-4">
                                                <label>ID Pelanggan</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control" placeholder="ID pelanggan" id="first-name-icon" name="id_pelanggan" value="<?php echo $d['id_pelanggan'] ?>" readonly>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-file-person"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label>Nama Pelanggan</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control" placeholder="nama_pelanggan" id="first-name-icon" name="nama_pelanggan" value="<?php echo $d['nama_pelanggan'] ?>" required>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-file-person"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label>Jenis Kelamin</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <select class="form-control select2 input100" name="jenis_kelamin" required>
                                                            <?php
                                                            if ($d['jenis_kelamin'] == 'Laki-Laki') {
                                                                echo "<option value='Laki-Laki' selected>Laki-Laki</option>";
                                                                echo "<option value='Perempuan'>Perempuan</option>";
                                                            } else if ($d['jenis_kelamin'] == 'Perempuan') {
                                                                echo "<option value='Laki-Laki'>Laki-Laki</option>";
                                                                echo "<option value='Perempuan' selected>Perempuan</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-gender-ambiguous"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-4">
                                                <label>Alamat</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control" placeholder="alamat" name="alamat" value="<?php echo $d['alamat'] ?>" required>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-geo-alt-fill"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label>No HP</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="number" class="form-control" placeholder="NO HP" name="no_hp" value="<?php echo $d['no_hp'] ?>" required>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-phone"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group col-md-8 offset-md-4">
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <button id="insert-button" class="btn btn-primary me-1 mb-1" type="submit">Submit</button>
                                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>

                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                <?php } ?>


                </div>
        </div>

        <script>
            function previewImage() {
                const image = document.querySelector('#image');
                const imgPreview = document.querySelector('.img-preview');

                imgPreview.style.display = 'block';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }

            }
        </script>

</section>