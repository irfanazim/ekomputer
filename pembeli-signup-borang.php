<?php
# memulakan fungsi session
session_start();

# memanggil fail header.php
include('header.php');

?>
<div class="middle">
    <div class="pt-2">
    <!--Tajuk antaramuka-->
<h3>Pendaftaran Pengguna Baru</h3>
</div>


<!-- Borang Pendaftaran Pembeli Baru-->
<div class="login-container">
    <form action ='pembeli-signup-proses.php' method = 'POST'>

        NOKP PENGGUNA (xxxxx) <input type='password' name='nokp' required> <br>
        NAMA PENGGUNA <input type='text' name='nama' required> <br>
                    <input type='submit' value='DAFTAR'>

    </form>
</div>

<?php include ('footer.php');?>
</div>

