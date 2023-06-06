<?php
# memulakan fungsi session
session_start();

# memanggil fail header
include('header.php');
include('connection.php');
include('guard-pembeli.php');

# menyemak kewujudan data GET. Jika data GET empty, buka fail senarai-barang
if(empty($_GET)) {
    die("<script>window.location.href='senarai-barang.php';</script>");
}
?>

<div class="middle">
    <h3>Pembelian Komputer</h3>
<!--
    Borang yang akan digunakan untuk transaksi pembelian.
    Pada setiap input pengguna akan diumpukkan kepada value
    yang akan diambil dari data GET yang telah dihantar dari 
    fail pembeli-pilih.php
-->

<img src='img\<?=$_GET['gambar'] ?>' width='100%'> <br>
Jenama Barang   : <?= $_GET['nama_jenama']?> <br>
Nama Barang   : <?= $_GET['nama_barang']?> <br>
Spesifikasi   : <?= $_GET['spesifikasi']?> <br>
Harga   : <?= $_GET['harga']?> <br>

<hr>
<!-- borang pembayaran -->
<h3>Pembayaran meggunakan kad kredit (tipu2)</h3>
<form action='pembeli-beli-proses.php' method='POST'>

Nama Pemilik Kad <input type='text' name='nama' ><br>
No Kad Kredit <input type='text' name='nokad' ><br>
Tarikh Luput Kad <input type='text' name='tarikh' ><br>
Kod Keselamatan Kad <input type='text' name='nokod' ><br>

            <!-- data kod barang ini penting -->
            <input type='hidden' name='kod_barang' value ='<?=
    $_GET['kod_barang']?>'>
                          <input type='submit' value='BAYAR'>
</form>
<?php include ('footer.php'); ?>
</div>

