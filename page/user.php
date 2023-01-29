<?php $active = "user"; ?>

<?php

include 'koneksi.php';

?>
<section class="section">
    <div class="card">
        <div class="card-header">
            <!-- Button trigger for login form modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inlineForm">
                Tambah Data
            </button>



            <!--login form Modal -->
            <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Tambah User</h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <?php
                        if (isset($_POST['submit'])) {
                            //save data
                            //show Toastify
                            echo '
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
    Toastify({
        text: "Data berhasil disimpan!",
        duration: 3000,
        newWindow: true,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "center", // `left`, `center` or `right`
        backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
    }).showToast();
    </script>';
                        }
                        ?>
                        <form action="function/proses_user.php?aksi=simpan" method="post">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>ID User</label>
                                    </div>
                                    <?php
                                    // include 'koneksi.php';

                                    $querykode = mysqli_query($koneksi, "SELECT max(id_user) as idterbesar FROM user");
                                    $data = mysqli_fetch_array($querykode);
                                    $id_user = $data['idterbesar'];

                                    $urutan = (int) substr($id_user, 3, 3);
                                    $urutan++;

                                    $huruf = "USR";
                                    $iduser = $huruf . sprintf("%03s", $urutan);

                                    ?>

                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="id_user" id="first-name-icon" name="id_user" value="<?php echo $iduser ?>" readonly>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person-badge-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <label>Username</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="username" id="first-name-icon" name="username" required>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-file-person"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Name" id="first-name-icon" name="nama_user" required>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
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
                                        <label>Password</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="password" class="form-control" placeholder="Password" name="password" required>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-lock"></i>
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
                                    <div class="form-group col-md-8 offset-md-4">
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button id="insert-button" class="btn btn-primary me-1 mb-1" type="submit">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">ID User</th>
                        <th scope="col">Nama User</th>
                        <th scope="col">Username</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Password</th>
                        <th scope="col">No HP</th>

                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `user` ORDER BY `user`.`id_user` DESC";
                    $query = mysqli_query($koneksi, $sql);

                    $no = 0; //variabel no


                    while ($d = mysqli_fetch_array($query)) {

                        $no++
                    ?>

                        <tr>
                            <th scope='row'><?php echo $no ?></th>

                            <td><?php echo $d['id_user'] ?></td>
                            <td><?php echo $d['nama_user'] ?></td>
                            <td><?php echo $d['username'] ?></td>
                            <td><?php echo $d['jenis_kelamin'] ?></td>
                            <td><?php echo $d['password'] ?></td>
                            <td><?php echo $d['no_hp'] ?></td>
                            <td class="text-center">

                                <a href='' class='badge bg-warning text-decoration-none' data-bs-toggle="modal" data-bs-target="#edit<?php echo $d['id_user'] ?>"><span data-feather='edit'></span></a> |

                                <a onclick="swalDelete('function/proses_user.php?aksi=delete&id_user=<?php echo $d['id_user'] ?>')" class='badge bg-danger text-decoration-none'>
                                    <span data-feather='trash-2'></span>
                                </a>

                            </td>

                        </tr>
                    <?php } ?>
            </table>


            <?php
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi, "select * from user");
            while ($d = mysqli_fetch_array($data)) {
            ?>
                <div class="modal-primary me-1 mb-1 d-inline-block">

                    <!--primary theme Modal -->
                    <div class="modal fade text-left" id="edit<?php echo $d['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title white" id="myModalLabel133">
                                        Edit User
                                    </h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="function/proses_user.php?aksi=update" method="post">
                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <div class="col-md-4">
                                                <label>ID User</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control" placeholder="username" id="first-name-icon" name="id_user" value="<?php echo $d['id_user'] ?>" readonly>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-file-person"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label>Username</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control" placeholder="username" id="first-name-icon" name="username" value="<?php echo $d['username'] ?>" required>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-file-person"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control" placeholder="Name" id="first-name-icon" name="nama_user" value="<?php echo $d['nama_user'] ?>" required>
                                                        <div class="form-control-icon">
                                                            <span data-feather='user'></span>
                                                        </div>
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
                                            <label>Password</label>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo $d['password'] ?>" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-lock"></i>
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

</section>