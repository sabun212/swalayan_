<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

$username = $_SESSION['username'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swalayan | Admin</title>

    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">
    <link rel="stylesheet" href="assets/extensions/simple-datatables/style.css">
    <link rel="stylesheet" href="assets/css/pages/simple-datatables.css">

    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">

    <link rel="stylesheet" href="assets/css/shared/iconly.css">






    <!-- toastify -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">



</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <img src="assets/images/4853433.png" alt="Logo" srcset="">
                        </div>
                        <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2" opacity=".3"></path>
                                    <g transform="translate(-210 -1)">
                                        <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                        <circle cx="220.5" cy="11.5" r="4"></circle>
                                        <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                                    </g>
                                </g>
                            </svg>
                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input  me-0" type="checkbox" id="toggle-dark">
                                <label class="form-check-label"></label>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path fill="currentColor" d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z"></path>
                            </svg>
                        </div>
                        <div class="sidebar-toggler  x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item <?php if ("asdasd") {
                                                    # code...
                                                } else {
                                                    # code...
                                                }
                                                ?>">
                            <a href="admin.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill "></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item 
                                    <?php
                                    if (strpos($_SERVER['REQUEST_URI'], 'admin.php?page=user') !== false)
                                        echo "active"

                                    ?>">
                            <a href="admin.php?page=user" class='sidebar-link'>
                                <i class="bi bi-person"></i>
                                <span>User</span>
                            </a>
                        </li>
                        <li class="sidebar-item <?php
                                                if (strpos($_SERVER['REQUEST_URI'], 'admin.php?page=transaksi') !== false)
                                                    echo "active";
                                                ?>">
                            <a href="admin.php?page=transaksi" class='sidebar-link'>
                                <i class="bi bi-bag-fill"></i>
                                <span>Transaksi</span>
                            </a>
                        </li>
                        <li class="sidebar-item <?php
                                                if (strpos($_SERVER['REQUEST_URI'], 'admin.php?page=pelanggan') !== false)
                                                    echo "active";
                                                ?>">
                            <a href="admin.php?page=pelanggan" class='sidebar-link'>
                                <i class="bi bi-person-lines-fill"></i>
                                <span>Pelanggan</span>
                            </a>
                        </li>
                        <li class="sidebar-item <?php
                                                if (strpos($_SERVER['REQUEST_URI'], 'admin.php?page=barang') !== false)
                                                    echo "active";
                                                ?>">
                            <a href="admin.php?page=barang" class='sidebar-link'>
                                <i class="bi bi-box-seam-fill"></i>
                                <span>Barang</span>
                            </a>
                        </li>
                        <li class="sidebar-item <?php
                                                if (strpos($_SERVER['REQUEST_URI'], 'admin.php?page=laporan') !== false)
                                                    echo "active";
                                                ?>">
                            <a href="admin.php?page=laporan" class='sidebar-link'>
                                <i class="bi bi-list"></i>
                                <span>Laporan</span>
                            </a>
                        </li>

                        <li class="sidebar-title">User </li>

                        <li class="sidebar-item  ">
                            <a href="logout.php" class='sidebar-link text-danger' id="logout">
                                <i class="bi bi-box-arrow-left text-danger"></i>
                                <span>logout</span>
                                <script>
                                    document.getElementById("logout").addEventListener("click", function(event) {
                                        event.preventDefault(); //mencegah link dijalankan
                                        Swal.fire({
                                            title: 'Apakah Anda yakin ingin logout?',
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Ya, Logout!  ',
                                            cancelButtonText: 'Tidak, batalkan!'
                                        }).then((result) => {
                                            if (result.value) {
                                                // Apabila tombol 'Ya' diklik, redirect ke halaman logout
                                                window.location.href = "logout.php";
                                            }
                                        });
                                    });
                                </script>
                            </a>
                        </li>


                    </ul>
                </div>

            </div>
        </div>
        <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light navbar-top bg">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-lg-0">


                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600"><?= $username ?></h6>
                                            <p class="mb-0 text-sm text-gray-600">Administrator</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="assets/images/faces/1.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                                    <li>
                                        <h6 class="dropdown-header">Hello, <?= $username ?> !</h6>
                                    </li>
                                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#show<?php echo $_SESSION['id_user']; ?>"><i class="icon-mid bi bi-person me-2"></i> My
                                            Profile</a></li>
                                    <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item bg-danger" href="#"><i class="icon-mid bi bi-box-arrow-left me-2 text-white"></i>
                                            <span class="text-white"> Logout</span>
                                        </a></li>
                                </ul>


                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="main-content">

                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">

                            <div class="page-heading">
                                <div class="page-title">
                                    <div class="row">
                                        <div class="col-12 col-md-6 order-md-1 order-last">
                                            <h3>Halaman Admin</h3>
                                            <p class="text-subtitle text-muted"></p>
                                        </div>
                                        <div class="col-12 col-md-6 order-md-2 order-first">
                                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
                                                </ol>
                                            </nav>
                                        </div>
                                    </div>
                                </div>

                                <?php

                                if (isset($_GET['page'])) {
                                    $page = $_GET['page'];
                                    switch ($page) {
                                        case 'user':
                                            include 'page/user.php';
                                            break;
                                        case 'pelanggan':
                                            include 'page/pelanggan.php';
                                            break;
                                        case 'barang':
                                            include 'page/barang.php';
                                            break;
                                        case 'transaksi':
                                            include 'page/transaksi.php';
                                            break;
                                        case 'transaksi1':
                                            include 'page/transaksi1.php';
                                            break;
                                        case 'barang1':
                                            include 'page/barang1.php';
                                            break;
                                        case 'dashboard':
                                            include 'dashboard.php';
                                            break;
                                        case 'laporan':
                                            include 'page/laporan.php';
                                            break;
                                        case 'cetak':
                                            include 'page/cetak.php';
                                            break;
                                        default:
                                            echo "<script>window.location.href='404.php'</script>";
                                    }
                                } else {
                                    include 'dashboard.php';
                                }

                                ?>
                            </div>





                        </div>

                    </div>
                    <div>

                    </div>
                </div>
            </div>

            <div id="main">
                <header class="mb-3">
                    <a href="#" class="burger-btn d-block d-xl-none">
                        <i class="bi bi-justify fs-3"></i>
                    </a>
                </header>

                <footer>
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>2023 &copy; lup lup</p>
                        </div>
                        <div class="float-end">
                            <p>Crafted with <span class="text-danger "><i class="bi bi-heart"></i></span> lup lup
                        </div>
                    </div>
                </footer>








            </div>

        </div>

        <script src="assets/js/bootstrap.js"></script>
        <script src="assets/js/app.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
        <script src="assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
        <script src="assets/js/pages/simple-datatables.js"></script>

        <script>
            function swalDelete(link) {
                Swal.fire({
                    title: "Hapus",
                    text: "Apakah Kamu Yakin Ingin Menghapus Data Ini?",
                    icon: "warning",
                    showConfirmButton: true,
                    confirmButtonText: "Hapus",
                    confirmButtonColor: '#42ba96',
                    showCancelButton: true,
                    cancelButtonText: "Batal",
                    cancelButtonColor: '#DC3545',
                }).then((response) => {
                    if (response.value) {
                        window.location.href = link
                        Swal.fire('Saved!', '', 'success')
                    }
                })
            }

            function removeRupiah(value) {
                value.replace(/[0-9]/, "")
            }

            const rupiah = (number) => {
                return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR"
                }).format(number);
            }
            $(".btn-collapse").click(function() {
                const collapseId = $(this).attr("href")
                if ($(this).children("span").html() == 'Open Form') {
                    $(this).children("span").html('Close Form');
                } else {
                    $(this).children("span").html('Open Form');
                }
            });
            $("[type='number']").keypress(function(evt) {
                evt.preventDefault();
            });
        </script>

        <?php
        include 'koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi, "select * from user");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <div class="modal-primary me-1 mb-1 d-inline-block">

                <!--primary theme Modal -->
                <div class="modal fade text-left" id="show<?php echo $d['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class=" modal-header bg-primary">
                                <h5 class="modal-title white" id="myModalLabel133">
                                    Profile
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
                                                    <input type="text" class="form-control" readonly placeholder="username" id="first-name-icon" name="username" value="<?php echo $d['username'] ?>" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-file-person"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Nama</label>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" readonly placeholder="Name" id="first-name-icon" name="nama_user" value="<?php echo $d['nama_user'] ?>" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person-fill"></i>
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
                                                    <input type="text" class="form-control" readonly id="first-name-icon" name="jenis_kelamin" value="<?php echo $d['jenis_kelamin'] ?>" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-gender-ambiguous"></i>
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
                                                    <input type="number" class="form-control" readonly placeholder="NO HP" name="no_hp" value="<?php echo $d['no_hp'] ?>" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-phone"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-8 offset-md-4">
                                        </div>




                                    </div>

                            </div>

                        </div>
                    </div>
                </div>
                </form>
            </div>
        <?php } ?>






</body>

</html>