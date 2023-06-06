<?php
# memulakan fungsi session
session_start();

# memanggil fail guard-admin.php 
include('guard-admin.php');

# menyemak kewujudan data post
if(!empty($_POST))
{
    # memanggil fail connection.php
    include('connection.php');

    # pengesahan data (validation) nokp admin
    if(strlen($_POST['nokp']) !=12 or !is_numeric($_POST['nokp']))
    {
        die("<script>alert('Ralat nokp');
        window.history.back();</script");
    }
    # arahan SQL (query) untuk kemaskini maklumat staff
    $arahan = "update admin set
    nama_admin = '".$_POST['nama']."',
    nokp_admin = '".$_POST['nokp']."'
    where
    nokp_admin = '".$_GET['nokp_lama']."' ";

    # melaksana dan menyemak proses kemaskini
    if(mysqli_query($condb,$arahan))
    {
        # kemaskini berjaya 
        echo"<script>alert('Kemaskini Berjaya');
        window.location.href='senarai-admin.php';</script>";
    }
    else
    {
        # kemaskini gagal
        echo"<script>alert('Kemaskini Gagal');
        window.history.back();</script>";
    }
}
else
{
    # jika data GET tidak wujud. kembali ke fail senarai-admin.php 
    die("<script>alert('sila lengkapkan data');
    window.location.href='senarai-admin.php';</script>");
}