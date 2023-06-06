<?php
# memulakan fungsi SESSION
session_start();

# menyemak kewujudan data post
if(!empty($_POST))
{
    # memanggil fail connection
    include ('connection.php');

    # data validation : harga barang tidak boleh kurang atau sama dengan rm0
    if($_POST['harga']<= 0)
    {
        die("<script>alert ('Ralat pada harga');
        window.history.back(); </script>");
    }

    # memproses maklumat gambar yang di upload
    # proses ini lebih kepada menukar nama fail gambar
    $timestmp               = date("Y-m-d-His");
    $nama_fail              = basename($_FILES["gambar"]["name"]);
    $format_baharu          = pathinfo($nama_fail,PATHINFO_EXTENSION);
    $lokasi                 = $_FILES['gambar']['tmp_name'];
    $nama_baru              = $timestmp.".".$format_baharu;

    # arahan query untuk menyimpan data barang baru
    $sql_simpan = "insert into barang (nama_barang, kod_jenama, harga, spesifikasi, gambar) values
    ('".$_POST['nama']."', '".$_POST['kod_jenama']."', '".$_POST['harga']."',
    '" .$_POST['spesifikasi']."', '$nama_baru') ";

    # melaksanakan arahan SQL menyimpan barang baru
    $laksana_sql =mysqli_query($condb,$sql_simpan);

    # menyemak proses melaksanakan berjaya atau tidak
    if($laksana_sql)
    {
        # muat naik gambar
        move_uploaded_file($lokasi,"img/".$nama_baru);

        # jika berjaya kembali ke fail senarai-borang.php
        die("<script>alert('Pendaftaran berjaya.');
        window.location.href='senarai-barang.php'; </script>");
    }
    else
    {
        # jika gagal
        die("<script>alert('Pendaftaran gagal.');
        window.history.back(); </script>");
    }
}
else
{
    # jika maklumat barang di isi tidak lengkap
    die("<script>alert('Sila lengkapkan maklumat');
    window.location.href='barang-signup-borang.php'; </script>"); 
}
?>