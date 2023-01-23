<?php
include 'koneksi.php';
?>
<section class="section">
    <div class="card">
        <div class="card-header">
            <!-- Button trigger for login form modal -->
            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#inlineForm">
                Launch Modal
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
                        <form action="function/daftaruser.php" method="post">
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
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID User</th>
                        <th scope="col">Nama User</th>
                        <th scope="col">Username</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Password</th>
                        <th scope="col">NO. HP</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `user` ORDER BY `user`.`id_user` DESC";
                    $query = mysqli_query($koneksi, $sql);

                    $no = 0; //variabel no


                    while ($user = mysqli_fetch_array($query)) {

                        $no++;

                        echo "<tr>";
                        echo "<th scope='row'>$no</th>";

                        echo "<td>" . $user['id_user'] . "</td>";
                        echo "<td>" . $user['nama_user'] . "</td>";
                        echo "<td>" . $user['username'] . "</td>";
                        echo "<td>" . $user['jenis_kelamin'] . "</td>";
                        echo "<td>" . $user['password'] . "</td>";
                        echo "<td>" . $user['no_hp'] . "</td>";

                        echo "<td>";
                        echo " <a href='' class='badge bg-warning text-decoration-none'><span data-feather='edit'></span></a> | ";
                        echo "<a href=function/user/delete.php?id_user=" . $user['id_user'] . " class='badge bg-danger text-decoration-none'><span data-feather='trash-2'></span></a>";
                        echo "</td>";

                        echo "</tr>";
                    }
                    ?>
            </table>

        </div>
    </div>

</section>