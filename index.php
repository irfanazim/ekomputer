<?php
# Memulakan fungsi session
session_start();

# Memanggil fail header.php dan fail connection.php
include('header.php');
include('connection.php');
?>

<body style="background-image: linear-gradient(rgb(74, 74, 110), rgb(98, 92, 119));">

<div class="container background">
    <div class="table-responsive">
      <div class="table-wrapper">
        <h3>cheapest laptop ever like frfr</h3>
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>Gambar</th>
              <th>Nama Barang</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql_pilihan = "
              SELECT barang.gambar, barang.nama_barang, jenamakomputer.nama_jenama, barang.spesifikasi, barang.harga
              FROM barang
              JOIN jenamakomputer ON barang.kod_jenama = jenamakomputer.kod_jenama
              GROUP BY barang.nama_barang 
              ORDER BY rand() limit 5 ";
            $laksana_pilihan = mysqli_query($condb,$sql_pilihan);
            while($n = mysqli_fetch_array($laksana_pilihan)){
            ?>
              <tr>
                <td>
                  <?php
                  if (isset($n['gambar']) && !empty($n['gambar'])) {
                  ?>
                    <img class="gambar" src='img/<?php echo $n['gambar']; ?>'>
                  <?php
                  } else {
                    echo "Gambar tidak tersedia";
                  }
                  ?>
                </td>
                <td>
                  <h4 class="nama-jenama"><?php echo $n['nama_jenama']; ?></h4>
                  <h5 class="nama-barang"><?php echo $n['nama_barang']; ?></h5>
                  <p class="spesifikasi"><?php echo $n['spesifikasi']; ?></p>
                  <p class="harga">RM <?php echo $n['harga']; ?></p>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
