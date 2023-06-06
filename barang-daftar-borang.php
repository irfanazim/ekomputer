<?php
# memulakan fungsi SESSION
session_start();

# memanggil fail  header.php 
include('header.php');
include('connection.php');
include('guard-admin.php');
?>
<div class="middle">
        <!--Tajuk antaramuka-->
<h3> Pendaftaran Barangan Baru </h3>
</div>
<div class="login-container">
     <!-- Borang Pendaftaran Barang Baru --> 
<form action = 'barang-daftar-proses.php' method = 'POST'
enctype='multipart/form-data'>

        Nama Barang <input type ='text' name = 'nama' required> <br>
        Jenama      <select name='kod_jenama' required>
                        <option selected disabled>Sila pilih jenama</option>

<?php
$sql_jenama = "select * from jenamakomputer order by nama_jenama";
$laksana_carian = mysqli_query($condb,$sql_jenama);
while($m=mysqli_fetch_array($laksana_carian))
{
echo "<option value='".$m['kod_jenama']."'>".$m['nama_jenama']."</option>";
}

?>
            </select>
            <a href='barang-jenama-borang.php'>[+]Jenama</a><br>
    Harga  <input type ='text' name ='harga' required> <br>
    Spesifikasi    <input type ='text' name ='spesifikasi' required> <br>
    Gambar  <input type ='file' name ='gambar' required> <br>
            <input type ='submit' value='Daftar'>

</form>

</div>
<?php include ('footer.php');?>   

