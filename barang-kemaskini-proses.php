<?php
# memulakan fungsi session
session_start();

# memanggil fail guard-admin.php 
include('guard-admin.php');

# menyemak kewujudan data POST
if(!empty($_POST))
{
    # memanggil fail connection.php
    include('connection.php');

    # pengesahan data (validation)
    if($_POST['harga']<=0)
    {
        die("<script>alert('Ralat maklumat');
        window.history.back();</script>");
    }

    # arahan SQL (query) untuk kemaskini maklumat barang
    $arahan     = "update barang set
    harga       = '".$_POST['harga']."'
    nokp_admin  = '".$_SESSION['nokp']."'
    where
    kod_barang  = '".$_GET['kod_barang_lama']."'";
    
    # melaksanakan dan menyemak proses kemaskini
    if(mysqli_query($condb,$arahan))
    {
        # kemaskini berjaya
        echo"<script>alert('Kemaskini Berjaya.');
        window.location.href='senarai-barang.php';</script>";
    }
    else
    {
        # kemaskini gagal
        echo "<script>alert('Kemaskini Gagal.');
        window.history.back();</script>";
    }
}
else
{
    # data POST empty
    die("<script>alert('Sila lengkapkan data');
    window.location.href='senarai-barang.php';</script>");
}
?>