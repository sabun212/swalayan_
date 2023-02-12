<?php
include '../koneksi.php';

$aksi = $_GET['aksi'];
switch ($aksi) {

    case 'simpan':
        $id_transaksi = $_POST['id_transaksi'];
        $id_pelanggan = $_POST['id_pelanggan'];
        $tanggal = $_POST['tanggal'];
        $id_barang = $_POST['id_barang'];
        $jumlah = $_POST['jumlah'];
        $total = $_POST['total'];
        $id_user = $_POST['id_user'];
        $query = mysqli_query($koneksi, "INSERT INTO transaksi
    VALUES('$id_transaksi','$id_pelanggan','$tanggal','$id_barang','$jumlah','$total','$id_user')");
        if ($query) {
            session_start();
            $_SESSION['simpan_transaksi'] = "sukses";
            echo '
            <script>
            window.location.href = "../admin.php?page=transaksi";
            </script>';
        } else {
            session_start();
            $_SESSION['simpan_transaksi'] = "gagal";
            echo '
            <script>
            window.location.href = "../admin.php?page=transaksi";
            </script>';
        };
        break;

    case 'delete':
        $id_transaksi = $_GET['id_transaksi'];
        $query = mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_transaksi = '$id_transaksi'");
        if ($query) {
            session_start();
            $_SESSION['delete_transaksi'] = "sukses";
            echo '
            <script>
            window.location.href = "../admin.php?page=transaksi";
            </script>';
        } else {
            session_start();
            $_SESSION['delete_transaksi'] = "gagal";
            echo '
            <script>
            window.location.href = "../admin.php?page=transaksi";
            </script>';
        };
        break;
}
