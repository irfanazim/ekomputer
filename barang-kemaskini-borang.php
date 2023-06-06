<?php
# memulakan fungssi session
session_start();

# memanggil fail header
include('header.php');
include('connection.php');
include('guard-admin.php');

# menyemak kewujudan data GET. Jika data GET empty, buka fail senarai-barang
if(empty($_GET)) {
    die("<script>window.location.href='senarai-barang.php';</script>");
}
?>

<div class="middle">
    <h3>Kemaskini Harga Barang</h3>
</div>
<!--
    Borang yang akan digunakan untuk menukar harga barang.
    Pada setiap input pengguna akan diumpukkan kepada value 
    yang akan diambil dari data GET yang telah dihantar dari
    fail senarai-barang.php
-->

<div class="login-container">
     <form action='barang-kemaskini-proses.php?kod_barang_lama=
<?=$_GET['kod_barang'] ?> 'method='POST'>

<img src='img/<?=$_GET['gambar'] ?>' width='10%'> <br>
Jenama Barang       : <?= $_GET['jenama_barang'] ?> <br>
Nama Barang         : <?= $_GET['nama_barang'] ?> <br> 
Spesifikasi         : <?= $_GET['spesifikasi'] ?> <br>

Harga
<input type='text'  name='harga' value='<?=$_GET['harga'] ?>' required><br>

<input type='submit' value='Kemaskini'>

</form>
<?php include ('footer.php'); ?>   
</div>
