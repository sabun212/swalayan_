<?php

// mengaktifkan session php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data admin dengan username dan password yang sesuai
$query = mysqli_query($koneksi, "select * from user where username='$username' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($query);

if ($cek > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location:dashboard.php");
} else {
    header("location:index.php?pesan=gagal");
}