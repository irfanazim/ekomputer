<?php
# Memanggil fungsi SESSION
session_start();

# Memanggil fail header.php dan guard-admin.php
include('header.php');
include('guard-admin.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Pendaftaran admin baru</title>
  </head>
  <body style="background-image: linear-gradient(rgb(74, 74, 110), rgb(98, 92, 119));">
    <div class="container background">
      <div class="middle">
        <!-- Tajuk antarmuka-->
      <h3> Pendaftaran admin baru </h3>
      </div>
      
      <div class="login-container">
        <!--Borang pendaftaran admin baru-->
      <form action='admin-signup-proses.php' method='POST'>
        <label for='nama'>NAMA ADMIN</label>
        <input type='text' name='nama' required>
        <br>
        <label for='nokp'>NOKP ADMIN (xxxx)</label>
        <input type='text' name='nokp' required>
        <br>
        <input type='submit' value='DAFTAR'>
      </form><?php include('footer.php'); ?>
      </div>
      
    </div>
</body>
    
  
</html>