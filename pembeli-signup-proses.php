<?php
# memulakan fungsi session
session_start();

# menyemak kewujudan data post
if(!empty($_POST))
{
    include('connection.php');

    # data validation: had atas had bawah
    if(strlen($_POST['nokp']) !=5 or !is_numeric($_POST['nokp']))
    {
        die ("<script>alert ('Ralat Pada No Kad Pengenalan');
        window.location.href='pembeli-signup-borang.php'; </script>");
    }

    # arahan sql untuk menyimpan data pembeli baru
    $sql_simpan ="insert into pembeli
    (nama_pembeli, nokp_pembeli)
    values
    ('".$_POST['nama']."','".$_POST['nokp']."')";

    # melaksanakan arahan simpan data pembeli baru
    $laksana_query = mysqli_query($condb,$sql_simpan);

    # menyemak jika proses menyimpan data berjaya atau tidak
    if($laksana_query)
    {
        # jika berjaya papar popup dan buka fail index.php
        echo "<script>alert('Pendaftaran Berjaya.');
        window.location.href='index.php';</script>";
    }
    else
    {
        # jika gagal papar popup dan buka fail pembeli-signup-borang.php
        echo"<script>alert('Pendaftaran Gagal');
        window.location.href='pembeli-signup-borang.php'; </script>";
    }
}
else
{
    # jika pengguna membuka fail ini tanpa mengisi data
    # minta pengguna isi data terlebih dahulu
    echo"<script>alert('Sila lengkapkan maklumat');
    window.location.href='pembeli-signup-borang.php'; </script>";
}
?>