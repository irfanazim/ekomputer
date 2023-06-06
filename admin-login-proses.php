<?php
# memulakan fungsi session
session_start();

# menyemak kewujudan data post yang dihantar dari admin-login-borang.php 
if(!empty($_POST['nokp']) and !empty($_POST['nama']))
{
    # memanggil fail connection.php
    include ('connection.php');

    # arahan SQL (query) untuk mebandingkan data yang dimasukkan 
    # wujud di pangkalan data atau tidak
    $query_login = "select * from jualan
where
           nokp_admin            = '".$_POST['nokp']."'
and        nama_admin            ='".$_POST['nama']."' ";

# melaksanakan arahan membandingkan data
$laksana_query = mysqli_query($condb,$query_login);

# jika terdapat 1 data yang sepadan, login berjaya
if(mysqli_num_rows($laksana_query)==1)
{

    # mengambil data yang ditemui
    $m = mysqli_fetch_array($laksana_query);

    # mengumpukkan kepada pemboleh ubah session
    $_SESSION['nokp'] = $m['nokp_admin'];
    $_SESSION['tahap'] = "admin";

    # membuka laman index.php
    echo "<script>window.location.href='index.php';</script>";
}
else
{
    # login gagal. kembali ke laman admin-login-borang.php
    die("<script>alert('login gagal');
    window.location.href='admin-login-borang.php';</script>");
}
}
else
{
    # data yang dihantar dari lama -admin-login-borang.php kosong
    die("<script>alert('sila masukkan nokp dan nama');
    window.location.href='admin-login-borang.php';</script");
 }
 ?>


