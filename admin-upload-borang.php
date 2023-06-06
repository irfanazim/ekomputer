<?php
# memulakan fungsi session
session_start();

# memanggil fail header, guard-admin
include('header.php');
include('guard-admin.php');
?>

<div class="middle">
    <!-- Tajuk Laman --> 
<h3>Muat Naik Data Admin (*.txt)</h3>

</div>

<div class="login-container">
    <!-- Borang untuk memuat naik fail --> 
<form action='admin-upload-proses.php' method='POST' enctype='multipart/form-data'>

    <h3><b>Sila Pilih Fail txt yang ingin diupload</b></h3>
    <input      type='file'     name='data_admin'>
    <button     type='submit'   name='btn-upload'>Muat Naik</button>

</form>
</div>

<?php include ('footer.php'); ?>