<?php
# memulakan fungsi session
session_start();

# memanggil fail header, connection
include('header.php');
include('connection.php');
include('guard-admin.php');
?>

<div class="middle">
    <h3>Senarai Jualan</h3>
    <div class="form-links">
        <!--Borang carian nama pembeli--> 
<form action=' ' method='POST'>
    Carian pembeli <br>
    Nama Pembeli <input type='text' name='nama'>
                 <nput type='submit' value='CARI'>
</form>

<!--Memanggil fail butang-saiz bagi membolehkan pengguna mengubah saiz tulisan -->
<?php include ('butang-saiz.php'); ?>
    </div>

</div>

<div class="container pt-5" style="margin-top: 10px;">
  <div class="table-responsive">
    <div class="table-wrapper">
      <div class="table table-striped table-hover">
        <table width='100%' border='1' id='saiz'>
    <tr>
        <th>Nama Pembeli</th>
        <th>NOKP Pembeli</th>
        <th>Model Komputer</th>
        <th>Jenama</th>
        <th>Harga</th>
        <th>Tarikh Beli</th>
    </tr>
      </div>
    </div>
  </div>
<!--Header bagi jadual untuk memaparkan senarai pembeli -->

<?php
# syarat tambahan yang akan dimasukkan dalam arahan (query) senarai pembeli
$tambahan="";
if(!empty($_POST['nama']))
{
    $tambahan= "and nama_pembeli like '%".$_POST['nama']."%'";
}

# arahan query untuk mencari senarai nama pembeli
$arahan_papar="SELECT * FROM
jualan,pembeli,barang,jenamakomputer
WHERE
        jualan.nokp_pembeli = pembeli.nokp_pembeli
AND     jualan.kod_barang   = barang.kod_barang
AND     barang.kod_jenama   = jenamakomputer.kod_jenama
$tambahan ";

# laksanakan arahan mencari data pembeli
$laksana = mysqli_query($condb,$arahan_papar);

# mengambil data yang ditemui
    while($m = mysqli_fetch_array($laksana))
    {
        # memaparkan senarai nama dalam jadual
        echo"<tr>
        <td>".$m['nama_pembeli']."</td>
        <td>".$m['nokp_pembeli']."</td>
        <td>".$m['nama_barang']."</td>
        <td>".$m['nama_jenama']."</td>
        <td>".$m['harga']."</td>
        <td>".$m['tarikh']."</td>
        </tr>";
    }
?>
</table>
</div>
<?php include ('footer.php'); ?>
                