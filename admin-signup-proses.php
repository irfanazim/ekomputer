<?php
# Memanggil fungsi SESSION
session_start();

# Memanggil fail header.php dan guard-admin.php
include('header.php');
include('guard-admin.php');

# Menyemak kewujudan data POST
if(!empty($_POST)) {
    # Memanggil fail connection.php
    include ('connection.php');

    # Data validation : had atas had bawah
    # NOKP yang dimasukkan hendaklah (jumlah) digit dan tidak mempunyai huruf atau simbol
    if(strlen($_POST['nokp']) != 4 || !is_numeric($_POST['nokp'])) {
        die ("<script>alert ('Ralat pada No Kad Pengenalan');
        window.location.href='admin-signup-borang.php'; </script>");
    }

    # Arahan SQL (query) untuk menyimpan data admin baru
    $sql_simpan = "INSERT INTO jualan (nama_admin, nokp_admin) VALUES ('".$_POST['nama']."', '".$_POST['nokp']."')";

    # Melaksanakan arahan SQL menyimpan data admin baru
    $laksana_query = mysqli_query($condb, $sql_simpan);

    # Menguji jika proses menyimpan data berjaya atau tidak
    if($laksana_query) {
        # jika data berjaya disimpan. Papar popup dan buka fail senarai-admin.php
        echo "<script>alert('Pendaftaran Berjaya.');
        window.location.href='senarai-admin.php'; </script>";
    } else {
        # jika data tidak berjaya disimpan. Papar popup dan buka fail admin-signup-borang.php
        echo "<script>alert('Pendaftaran Gagal.');
        window.location.href='admin-signup-borang.php'; </script>";
    }
}
else
{
    # jika pengguna buka fail ini tanpa mengisi data.
    # papar popup dan buka fail admin-signup-borang.php 
    echo"<script>alert('Sila lengkapkan maklumat');
    window.location.href='admin-signup-borang.php'; </script>";
}
?>
