<?php
# memulakan fungsi session
session_start();

# memanggil fail header.php
include('header.php');
?>

<div class="middle">
    <div class="pt-2">
    <!-- Tajuk antaramuka log masuk pembeli -->
<h3>Login Pengguna</h3>
</div>


<!--Borang daftar masuk (log in/sign in) pembeli -->
<div class="login-container">
    <form action='pembeli-login-proses.php' method='POST'>

    NOKP PENGGUNA (xxxxx) <input type='password' name='nokp' required><br>
    NAMA PENGGUNA <input type='text' name='nama' required><br>
                <input type='submit' value='LOGIN'>

    </form>
</div>

<?php include ('footer.php'); ?>
</div>
