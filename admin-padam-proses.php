<?php
# memulakan fungsi session
session_start();

# memanggil fail guard-admin.php 
include('guard-admin.php');

# menyemak kewujudan data GET nokp admin
if(!empty($_GET))
{
    # memanggil fail connection
    include('connection.php');

    # arahan SQL untuk memadam data admin berdsarkan nokp yang dihantar
    $arahan = "delete from jualan where nokp_admin='".$_GET['nokp']."'";

    # melaksanakan arahan SQL padam data dan menguji proses padam data
    if(mysqli_query($condb,$arahan))
    {
        # jika data berjaya dipadam
        echo"<script>alert('Padam data berjaya');
        window.location.href='senarai-admin.php';</script>";
    }
    else
    {
        # jika data gagal dipadam
        echo "<script>alert('Padam data gagal');
        window.location.href-'senarai-admin.php';</script>";
    }
}
else
{
    # jika data GET tidak wujud (empty)
    die("<script>alert('Ralat! akses secara terus');
    window.location.href='seranai-admin.php';</script>");
}
?>