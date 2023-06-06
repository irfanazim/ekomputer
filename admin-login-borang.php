<?php

# Memulakan fungsi session
session_start();

# Memanggil fail header.php 
include('header.php');
?>
<div class="middle">
    <div class="pt-2">
    <!-- Tajuk antaramuka log masuk admin -->
<h3>Login Admin</h3>
</div>


<!-- borang daftar masuk (log in/sign in) admin --> 
<div class="login-container">
    <form action='admin-login-proses.php' method='POST'>

        NOKP ADMIN (xxxx)     <input type='password'      name='nokp'><br>
        NAMA ADMIN      <input type='text'      name='nama'><br>
                        <input type='submit'    value='LOGIN'>
    </form>
</div>

<?php include ('footer.php'); ?>
</div>

