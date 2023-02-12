<?php require_once "koneksi.php"; ?>

<section class="row">
    <div class="col-12 col-lg-9">
        <div class="row">

            <!-- admin -->

            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon blue mb-2">
                                    <a href="admin.php?page=user"><i class="iconly-boldProfile"></i></a>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold"> Admin</h6>
                                <h6 class="font-extrabold mb-0"><?php

                                                                $sqlU = "SELECT COUNT(*) FROM user";
                                                                $resultU = mysqli_query($koneksi, $sqlU);
                                                                $user = mysqli_fetch_assoc($resultU);

                                                                echo $user["COUNT(*)"];


                                                                ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- pelanggan -->


            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon red mb-2">
                                    <a href="admin.php?page=pelanggan"> <i class="bi bi-people-fill stats-icon green"></i></a>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Pelanggan</h6>
                                <h6 class="font-extrabold mb-0"><?php

                                                                $sqlP = "SELECT COUNT(*) FROM pelanggan";
                                                                $resultP = mysqli_query($koneksi, $sqlP);
                                                                $pelanggan = mysqli_fetch_assoc($resultP);

                                                                echo $pelanggan["COUNT(*)"];


                                                                ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- transaksi -->
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon purple mb-2">
                                    <a href="admin.php?page=transaksi"> <i class="bi bi-list stats-icon purple"></i></a>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Jumlah Tranksi</h6>
                                <h6 class="font-extrabold mb-0"><?php

                                                                $sqlT = "SELECT COUNT(*) FROM transaksi";
                                                                $resultT = mysqli_query($koneksi, $sqlT);
                                                                $transaksi = mysqli_fetch_assoc($resultT);

                                                                echo $transaksi["COUNT(*)"];


                                                                ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <!-- barang -->
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon red mb-2">
                                    <a href="admin.php?page=barang"> <i class="bi bi-box-seam-fill stats-icon green"></i></a>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Barang</h6>
                                <h6 class="font-extrabold mb-0"><?php

                                                                $sqlB = "SELECT COUNT(*) FROM barang";
                                                                $resultB = mysqli_query($koneksi, $sqlB);
                                                                $barang = mysqli_fetch_assoc($resultB);

                                                                echo $barang["COUNT(*)"];


                                                                ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>


    </div>
    <div class="col-12 col-lg-3">
        <div class="card">
            <div class="card-body py-4 px-4">
                <div class="d-flex align-items-center">
                    <div class="avatar avatar-xl">
                        <img src="assets/images/faces/1.jpg" alt="Face 1">
                    </div>
                    <div class="ms-3 name">
                        <h5 class="font-bold"><?php
                                                $username = $_SESSION['username'];
                                                echo $username; ?></h5>
                        <h6 class="text-muted mb-0">@Admin</h6>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


</div>