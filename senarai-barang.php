<?php
#memulakan fungsi session 
session_start();

#memanggil fail header, guard-admin, connection
include('header.php');
include('guard-admin.php');
include('connection.php');

?>
<div class="middle">
    <h3>Senarai Komputer dalam Stok</h3>
    <div class="form-links">
        <a href='barang-daftar-borang.php'>Daftar Barang Baru</a>
        <form action='' method="POST">
            <select name='jenamakomputer'>
                <option selected disabled>Sila pilih jenama</option>
                <?php
                    $sql_jenama = "select * from jenamakomputer order by nama_jenama"; 
                    $laksana_carian = mysqli_query($condb, $sql_jenama); 
                    while($m=mysqli_fetch_array($laksana_carian))
                    {
                        echo "<option value='".$m['nama_jenama']."'>".$m['nama_jenama']."</option>";
                    }
                ?> 
            </select>
            <input type='submit' value='Papar'>
        </form>
    </div>
    <?php
    if(isset($_POST['jenamakomputer']))
    {
        $selected_val = $_POST['jenamakomputer'];
        echo "You have selected : " .$selected_val;
    }
    ?>
    <?php include('butang-saiz.php'); ?>
    <!-- Memanggil fail butang-saiz bagi membolehkan pengguna mengubah saiz tulisan --> 
</div>

<!-- Header bagi jadual untuk memaparkan senarai barang --> 
<div class="container container-box p-5 mt-5">
  <div class="table-responsive">
    <div class="table-wrapper">
      <div class="table table-striped table-hover">
        <table border='1' id='saiz'> 
      </div>
    </div>
  </div>

<?php

# syarat tambahan yang akan dimasukkan dalam arahan (query) senarai barang
$tambahan="";
if(!empty($_POST['jenamakomputer']))
{
    $tambahan= "where jenamakomputer.nama_jenama = '".$_POST['jenamakomputer']."'";
}

# arahan query untuk mencari senarai nama barang dan susun menaik mengikut harga
$arahan_papar="SELECT barang.nama_barang, jenamakomputer.nama_jenama as nama_jenama, barang.harga, barang.spesifikasi, barang.gambar, barang.kod_barang, jualan.nama_admin 
FROM barang 
LEFT JOIN jenamakomputer on barang.kod_jenama = jenamakomputer.kod_jenama 
LEFT JOIN jualan on barang.kod_barang = jualan.kod_barang 
$tambahan
ORDER BY barang.kod_barang DESC;
";

# laksanakan arahan mencari data barang
$laksana = mysqli_query($condb,$arahan_papar);

# mengambil data yang ditemui
    while($m = mysqli_fetch_array($laksana))
    {
        # umpukkan data kepada tatasusunan bagi tujuan kemaskini borang
        $data_get=array(
            'nama_barang'   => $m['nama_barang'],
            'jenama_barang' => $m['nama_jenama'],
            'harga'         => $m['harga'],
            'spesifikasi'   => $m['spesifikasi'],
            'gambar'        => $m['gambar'],
            'kod_barang'    => $m['kod_barang']
        );
# memaparkan senarai nama dalam jadual
echo " <tr>
       <td><img width= '50%' src='img/".$m['gambar']."'></td>
       <td>
       <b> Jenama        : ".$m['nama_jenama']." </b><br>
           Nama Komputer : ".$m['nama_barang']."<br>
           Spesifikasi   : ".$m['spesifikasi']."<br>
           Didaftar Oleh : ".$m['nama_admin'];

           # memaparkan navigasi untuk kemaskini dan haous data barang
           echo "<br>
|<a href='barang-kemaskini-borang.php?".http_build_query($data_get)."'>
Kemaskini harga</a>

|<a href='barang-padam-proses.php?kod=".$m['kod_barang']."'
onClick=\"return confirm('Anda pasti anda ingin memadam data ini?')\">
Hapus</a>|

            </td>
        </tr>";       
        }

?>
</table>
    </div>
<?php include ('footer.php'); ?>