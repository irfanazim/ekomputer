<?php
# Memulakan fungsi session
session_start();

# Memanggil fail header dan fail guard-admin.php 
include('header.php');
include('guard-admin.php');

# Menyemak kewujudan data GET. Jika data GET empty, buka fail senarai-admin
if(empty($_GET)) {
    die("<script>window.location.href='senarai-admin.php';</script>");
}
?>

<div class="middle">
    <h3>Kemaskini admin baru</h3>
</div>

<!--
    Borang yang akan digunakan untuk menukar maklumat admin.
    Pada stiap input pengguna akan diumpukkan dengan value
    yang akan diambil dari data GET yang telah dihantar dari
    fail senarai-admin.php
-->

<div class="login-container">
    <form action='admin-kemaskini-proses.php?nokp_lama=<?= $_GET['nokp'] ?>' method='POST'>
nama 
<input type='text' name='nama' value='<?=$_GET['nama'] ?>' required><br>

nokp 
<input type='text' name='nokp' value='<?=$_GET['nokp'] ?>' required><br>

<input type='submit' value='Kemaskini'>

</form>
<?php include ('footer.php'); ?>
</div>
