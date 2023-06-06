<?php
# memulakan fungsi session
session_start();

# memanggil fail header.php, connection.php dan guard-admin.php 
include('header.php');
include('connection.php');
include('guard-admin.php');
?>
<div class="middle">
<h3>Senarai Pengguna</h3>
<!-- Borang carian nama pembeli -->
<div class="form-links">
  <form action=' ' method='POST' >
<label for="nama">Carian pengguna</label>
        <input type="text" name="nama" id="nama">
        <input type="submit" value="Cari">
</form>
<?php include('butang-saiz.php'); ?>
</div>

</div>


<div class="container pt-5">
  <div class="table-responsive">
    <div class="table-wrapper">
      <div class="table table-striped table-hover">
        <!-- Header bagi jadual untuk memaparkan senarai pembeli --> 
<table width='100%' border='1' id='saiz'>
    <tr>
        <th>Nama</th>
        <th>NoKP</th>
        <th>Tindakan</th>
    </tr>
      </div>
    </div>
  </div>
</div>


<?php 

# syarat tambahan yang akan dimasukkan dalam arahan (query) senarai pembeli
$tambahan="";
if(!empty($_POST['nama']))
{
    $tambahan= "where nama_pembeli like '%".$_POST['nama']."%'";
}

# arahan query untuk mencari senarai nama pembeli
$arahan_papar="SELECT * from pembeli $tambahan ";

# laksanakan arahan mencari data pembeli
$laksana = mysqli_query($condb,$arahan_papar);

# Mengambil data yang ditemui
    while($m = mysqli_fetch_array($laksana))
    {
        # Memaparkan senarai nama dalam jadual
        echo"<tr>
        <td>".$m['nama_pembeli']."</td>
        <td>".$m['nokp_pembeli']."</td>";

        # memaparkan navigasi untuk hapus data pembeli
        echo"<td>

        |<a href='pembeli-padam-proses.php?nokp=".$m['nokp_pembeli']."'
        onClick=\"return confirm('Anda pasti anda ingin memadam data ini.')\">
        Hapus</a>|

        </td>
        </tr>";
    }
?>
</table>
<?php include ('footer.php'); ?>
