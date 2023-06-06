<?php
# memulakan fungsi SESSION
session_start();

# memanggil fail header.php 
include('header.php');
include('guard-admin.php');
?>

<div class="middle">
<!-- Tajuk antaramuka --> 
<h3> Pendaftaran Jenama Baru </h3>
</div>


<div class="login-container">
        <!-- Borang Pendaftaran Jenama Baru -->
<form action = 'barang-jenama-proses.php' method = 'POST'>
    
        Kod Jenama      <input type='text' name='kod_jenama' required> <br>
        Jenama Barang   <input type='text' name='nama_jenama' required> <br>
                        <input type='submit' value='DAFTAR' >

</form>
<?php include ('footer.php'); ?> 
</div>
