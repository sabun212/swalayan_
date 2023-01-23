<?php
ob_start();
include("../../koneksi.php");

if (isset($_GET['id_user'])) {
    // ambil id dari query string
    $id = $_GET['id_user'];

    // buat query hapus
    $query = "DELETE FROM user WHERE id_user = '$id' ";
    $hasil = mysqli_query($koneksi, $query);


    header("location:../../admin.php?page=user");
}
ob_end_flush();
