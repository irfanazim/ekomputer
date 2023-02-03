<?php
# Memulakan fungsi session
session_start();

# Memanggil fail header.php dan fail connection.php
include('header.php');
include('connection.php');
?>

<hr>
<h3>Tawaran Komputer Termurah</h3>
<?php 
    # arahan SQL untuk memaparkan secara rawak
    # 10 barangan yang ada dalam pangkalan data
    $sql_pilihan = "
    SELECT* FROM barang, jenamakomputer
    WHERE barang.kod_jenama = jenamakomputer.kod_jenama
    and kod_barang not in(select kod_barang from jualan)
    group by barang.nama_barang
    ORDER BY rand()
    limit 10";

    # melaksanakan arahan sql_pilihan
    $laksana_pilihan = mysqli_query($condb,$sql_pilihan);

    # jika tiada data yang dijumpai
    if(mysqli_num_rows($laksana_pilihan)==0){
        
        # papar tiada barangan yang telah direkodkan
        echo "tiada barangan yang telah direkodkan";
    }
    else{
        echo"<hr>";
        # jika terdapat barangan yang ditemui
        # papar dalam bentuk jadual
        echo "<table border='1'>";

    # pembolehubah $n mengambil data yang ditemui
    while($n=mysqli_fetch_array($laksana_pilihan)){

        # memaparkan semula data diambil oleh pembolehubah $n
        echo " <tr>
                <td><img width='50%' src='img/".$n['gambar']." '></td>
                <td>
                    <b> ".$n['nama_jenama']." </b><br>
                        ".$n['nam_barang']." <br>
                        ".$n['spesifikasi']." <br>
                    RM  ".$N['harga']."</td>
                </tr>";
            }
    echo"</table>";
    }
?>
<?php include ('footer.php'); ?>

