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
                            <h4 class="modal-title" id="myModalLabel33">Login Form </h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
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
                                                    <option value="Laki-laki">Laki - Laki </option>
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
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID User</th>
                        <th scope="col">Nama User</th>
                        <th scope="col">Username</th>
                        <th scope="col">Action</th>
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
                            <td>
                                <button type="button" class="btn badge bg-warning text-decoration-none" data-bs-toggle="modal" data-bs-target="#edit<?php echo $d['id_user'] ?>">
                                    <span data-feather='edit'></span>
                                </button>
                                <a href='' class='badge bg-warning text-decoration-none' data-bs-toggle="modal" data-bs-target="#edit<?php echo $d['id_user'] ?>"><span data-feather='edit'></span></a> |
                                <a href="function/proses_user.php?aksi=delete&id_user=<?php echo $d['id_user'] ?>" class='badge bg-danger text-decoration-none' data-bs-toggle="modal" d data-bs-target="#edit<?php echo $d['id_user'] ?>">
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
                                        Form Edit
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
                                                        <input type="text" class="form-control" placeholder="username" id="first-name-icon" name="username" value="<?php echo $d['id_user'] ?>" readonly>
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
                                                            <i class="bi bi-person"></i>
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
                                                        <select class="form-control select2 input100" name="jenis_kelamin" value="<?php echo $d['jenis_kelamin'] ?>" required>
                                                            <option value="">Jenis Kelamin </option>
                                                            <option value="Laki-laki">Laki - Laki </option>
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
                                                <button id="insert-button" class="btn btn-primary me-1 mb-1" type="button">Submit</button>
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



<!-- <script>
    function confirmDelete(e) {
        e.preventDefault();
        const href = e.target.getAttribute(' ');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                window.location.href = href;
            }
        })
    }
</script> -->