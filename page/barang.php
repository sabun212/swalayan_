<?php

include 'koneksi.php';

?>
<p>
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        Tambah Barang <i class="bi bi-folder-plus"></i>
    </button>
</p>
<section class="section">
    <div class="collapse" id="collapseExample">
        <div class="card card-body shadow p-3 mb-5 bg-body-tertiary rounded">
            <form class="form form-horizontal" action="function/proses_barang.php?aksi=simpan" method="post" enctype="multipart/form-data">
                <?php
                include 'koneksi.php';
                $querykode = mysqli_query(
                    $koneksi,
                    "SELECT max(id_barang) as idterbesar FROM barang"
                );
                $data = mysqli_fetch_array($querykode);
                $id_barang = $data['idterbesar'];
                $urutan = (int) substr($id_barang, 3, 3);
                $urutan++;
                $huruf = "BRG";
                $idbarang = $huruf . sprintf("%03s", $urutan);
                ?>
                <div class="form-body">
                    <div class="">

                        <div class="col-md-8">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="hidden" class="form-control" placeholder="ID Barang" id="first-name-icon" value="<?php echo $idbarang ?>" readonly name="id_barang">
                                    <div class="form-control-icon">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Nama Barang</label>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="text" class="form-control" placeholder="Nama Barang" id="first-name-icon" name="nama_barang">
                                    <div class="form-control-icon">
                                        <i class="bi bi-box-seam"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Harga</label>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="number" class="form-control" placeholder="Harga" id="first-name-icon" name="harga">
                                    <div class="form-control-icon">
                                        <i class="bi bi-envelope"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Stok</label>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="number" class="form-control" placeholder="Stok" name="stok">
                                    <div class="form-control-icon">
                                        <i class="bi bi-phone"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="mt-4">Gambar</label>
                        </div>
                        <div class="col-md-8">
                            <div class="position-relative">
                                <img class="img-preview img-fluid mb-3 col-sm-5">
                                <input class="form-control mb-10" type="file" id="image" name="gambar" onchange="previewImage()">
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
                        <th scope="col">ID Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Gambar</th>

                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `barang` ORDER BY `barang`.`id_barang` DESC";
                    $query = mysqli_query($koneksi, $sql);

                    $no = 0; //variabel no


                    while ($d = mysqli_fetch_array($query)) {

                        $no++
                    ?>

                        <tr>
                            <th scope='row'><?php echo $no ?></th>

                            <td><?php echo $d['id_barang'] ?></td>
                            <td><?php echo $d['nama_barang'] ?></td>
                            <td><?php echo $d['harga'] ?></td>
                            <td><?php echo $d['stok'] ?></td>
                            <td><img src="gambar/<?php echo $d['gambar'] ?>" width="100px" height="100px"></td>
                            <td class="text-center">

                                <a href='' class='badge bg-warning text-decoration-none' data-bs-toggle="modal" data-bs-target="#edit<?php echo $d['id_barang'] ?>"><span data-feather='edit'></span></a> |

                                <a href="function/proses_barang.php?aksi=delete&id_barang=<?php echo $d['id_barang'] ?>" class='badge bg-danger text-decoration-none'>
                                    <span data-feather='trash-2'></span>

                                </a>

                            </td>

                        </tr>
                    <?php } ?>
            </table>


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