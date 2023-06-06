<?php
# memulakan fungsi session
session_start();

# memanggil fail header.php, connection.php dan guard-pembeli.php
include('connection.php');
include('header.php');
include('guard-pembeli.php');
?>
<!--
    Memaparkan perkara yang boleh digunakan untuk
    membandingkan komputer samada harga,jenama
-->
<div class="middle">
    <p>Carian Komputer</p>
<!--Borang Pemilihan-->
<form action=" " method="POST">
<table>
    <tr>
        <td>Julat Harga</td>
        <td><input type='text' name='harga'> <i>dan</i></td>
    </tr>
    <tr>
        <td>Jenama</td>
        <td>
            <select name='jenama'>
                <option selected disabled>Sila Pilih Jenama</option>
                <?php
                # proses memaparkan senarai jenama yang ada di jadual jenama
                # dalam bentuk drop down list
                $sql_jenama = "select * from jenamakomputer order by nama_jenama";
                $laksana_carian = mysqli_query($condb,$sql_jenama);
                while($m=mysqli_fetch_array($laksana_carian)){
                    echo "<option value='".$m['nama_jenama']."'>
                    ".$m['nama_jenama']."</option>";
                }
            ?>
            </select>
            <i>dan<i>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><input type='submit' value='CARI'></td>
    </tr>
</table>
</form>
</div>


<div class="container">
  <div class="table-responsive">
    <div class="table-wrapper">
      <div class="table table-striped table-hover">
       <?php
    # memeriksa jika terdapat carian
    if (!empty($_POST['jenamakomputer']) || !empty($_POST['harga'])) {
        $tambahan = "";
        $carian = " ";
      
        if (!empty($_POST['harga'])) {
          $tambahan = $tambahan . " " . " AND barang.harga <= " . $_POST['harga'] . "";
          $carian = $carian . "Harga : RM " . $_POST['harga'] . " ke bawah<br>";
        }
        if (!empty($_POST['jenama'])) {
            $tambahan = $tambahan . " " . " AND jenamakomputer.nama_jenama = '" . $_POST['jenama'] . "'";
            $carian = $carian . "Jenama : " . $_POST['jenama'] . "<br>";
        }
      
        echo "Carian mengikut<br>" . $carian;
      
        $sql_pilihan = "
        SELECT * 
        FROM barang 
        INNER JOIN jualan ON barang.kod_barang = jualan.kod_barang 
        INNER JOIN jenamakomputer ON barang.kod_jenama = jenamakomputer.kod_jenama
        $tambahan
        GROUP BY barang.nama_barang 
        ORDER BY barang.harga; ";

        # melaksanakan proses carian berdasarkan arahan SQL di atas
        $laksana_pilihan = mysqli_query($condb,$sql_pilihan);

        # jika proses carian tidak menemui data yang sepadan
        if(mysqli_num_rows($laksana_pilihan)==0){
            # papar carian tidak ditemui
            echo "Carian tidak ditemui ";
        }
        else
        {
            # jika proses carian menemui data yang sepadan
            # papar data barangan tersebut dalam bentuk jadual
            echo"<hr>";
            include('butang-saiz.php');
            echo "<table border='1' id='saiz'>";

            # pembolehubah $N mengambil data yang ditemui
            while($n=mysqli_fetch_array($laksana_pilihan)){
                
                $data_get=array(
                    'kod_barang'    => $n['kod_barang'],
                    'nama_barang'    => $n['nama_barang'],
                    'kod_jenama'    => $n['kod_jenama'],
                    'nama_jenama'    => $n['nama_jenama'],
                    'harga'    => $n['harga'],
                    'spesifikasi'    => $n['spesifikasi'],
                    'gambar'    => $n['gambar'],
                );
            
                # dan memaparkan dalam bentuk jadual
                echo " <tr>
                           <td><img width='50%' src='img/".$n['gambar']."'></td>
                           <td>

                                <b> ".$n['nama_jenama']." </b><br>
                                    ".$n['nama_barang']." <br>
                                    ".$n['spesifikasi']." <br>
                                RM  ".$n['harga']." <br>

                            <a href='pembeli-beli-borang.php?".http_build_query($data_get)."'>
                            -[Beli]-</a>

                            </td>
                            </tr>";
            }
            echo"</table>";
        }
    }
    else
    {
        echo "sila masukkan maklumat carian";
    }
include ('footer.php');
?>
      </div>
    </div>
  </div>
