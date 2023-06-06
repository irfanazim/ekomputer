<?php
# memulakan fungsi session
session_start();

# memanggil fail header.php dan fail connection.php
include('header.php');
include('connection.php');

?>
<div class="middle">
    <hr>
<h3>Sejarah Pembelian</h3>
</div>

<div class="container background">
    <div class="table-responsive">
      <div class="table-wrapper">
        <div class="table table-striped table-hover">
            <?php
        # arahan untuk mencari senarai barangan yang pernah dibeli sebelum ini
        $sql_pilihan = "
        SELECT * FROM pembeli, barang, jenamakomputer, jualan
        WHERE
            pembeli.nokp_pembeli = jualan.nokp_pembeli
        AND barang.kod_barang = jualan.kod_barang
        AND barang.kod_jenama = jenamakomputer.kod_jenama
        and pembeli.nokp_pembeli = '".$_SESSION['nokp']."'
        ORDER BY jualan.tarikh DESC
        ";

        # melaksanakan arahan mencari
        $laksana_pilihan = mysqli_query($condb,$sql_pilihan);

        # jika bilangan data yang ditemui = 0
        if(mysqli_num_rows($laksana_pilihan)==0){
            echo"Tiada Sejarah Pembelian";
        }
        else {
             # sebaliknya jika terdapat data yang ditemui. papar senarai barangan
             echo"<hr>
             <button onclick=\"window.print()\">Cetak</button>
             <table border='1' id='saiz'>";
             while($n=mysqli_fetch_array($laksana_pilihan)){
 
                 echo " <tr>
                 <td><img width='50%' src='img/".$n['gambar']."'><td>
                 <td>
 
                 <b> Jenama  : ".$n['nama_jenama']."</b><br>
                 <b> Model Komputer  : ".$n['nama_barang']."</b><br>
                 <b> Spesifikasi  : ".$n['spesifikasi']."</b><br>
                 <b> Harga  : ".$n['harga']."</b><br>
                 Tarikh Beli = ".date("d-m-Y", strtotime($n['tarikh']))."<br>
                 </td>
                 </tr>";
             }
             echo"</table>";                
         }
 ?>
 <?php include ('footer.php'); ?>
        </div>
        </div>
        </div>
        </div>

   
        
           