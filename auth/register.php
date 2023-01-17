<!DOCTYPE html>
<html lang="en">

<head>
    <title>Aplikasi Swalayan | Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--icon gambar web-->
    <link rel="icon" type="image/png" href="../authstyle/images/icons/user.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../authstyle/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../authstyle/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../authstyle/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../authstyle/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../authstyle/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../authstyle/css/util.css">
    <link rel="stylesheet" type="text/css" href="../authstyle/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="../authstyle/images/img-01.png" alt="IMG">
                </div>

                <form class="login100-form validate-form" action="simpan_registrasi.php" method="post">
                    <span class="login100-form-title">
                        Member Register
                    </span>

                    <?php
                    include '../koneksi.php';
                    // mengambil data user dengan kode paling besar
                    $querykode = mysqli_query($koneksi, "SELECT max(id_user) as idterbesar FROM user");
                    $data = mysqli_fetch_array($querykode);
                    $id_user = $data['idterbesar'];
                    // mengambil angka dari kode user terbesar, menggunakan fungsi substr
                    // dan diubah ke integer dengan (int)
                    $urutan = (int) substr($id_user, 3, 3);
                    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
                    $urutan++;
                    // membentuk kode user baru
                    // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
                    // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
                    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG
                    $huruf = "USR";
                    $iduser = $huruf . sprintf("%03s", $urutan);

                    ?>


                    <div class="wrap-input100 validate-input" data-validate=" id_user is required">
                        <input class="input100" type="text" class="form-control" name="id_user" value="<?php echo $iduser ?>" readonly>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-id-badge" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate=" Nama user is required">
                        <input class="input100" type="text" name="nama_user" placeholder="Nama User">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate=" username is required">
                        <input class="input100" type="text" name="username" placeholder="username">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user-secret" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate=" username is required">
                        <select class="form-control select2 input100" name="jenis_kelamin">
                            <option value="">Jenis Kelamin </option>
                            <option value="Laki-laki">Laki - Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-male" aria-hidden="true"></i>
                        </span>
                    </div>


                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="text" name="no_hp" placeholder="Nomor hp">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </span>
                    </div>


                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Register
                        </button>
                    </div>


                    <div class="text-center p-t-136">
                        <a class="txt2" href="/swalayan_">
                            Sudah punya akun ?
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="../authstyle/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="../authstyle/vendor/bootstrap/js/popper.js"></script>
    <script src="../authstyle/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="../authstyle/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="../authstyle/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="../authstyle/js/main.js"></script>

</body>

</html>