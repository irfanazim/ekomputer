<?php 
# memulakan fungsi session
session_start();

# memanggil fail header.php, connection.php dan guard-admin.php
include('header.php');
include('connection.php');
include('guard-admin.php');
?>

<div class="middle">
    <h3>Senarai Admin</h3>

| <a href='admin-signup-borang.php'>Daftar admin baru</a>
| <a href='admin-upload-borang.php'>Muat naik admin</a>
|   
    <?php include('butang-saiz.php'); ?>
</div>

<!-- Memanggil fail butang-saiz bagi membolehkan penggunan mengubah saiz tulisan -->

<!-- Header bagi jadual untuk memaparkan senarai admin--> 
<div class="container">
  <div class="table-responsive">
    <div class="table-wrapper">
      <div class="table table-striped table-hover">
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

# arahan query untuk mencari senarai nama admin
$arahan_papar="select* from jualan";

# laksanakan arahan mencari data admin
$laksana = mysqli_query($condb,$arahan_papar);

# mengambil data yang ditemui
    while($m = mysqli_fetch_array($laksana))
    {
        # umpukkan data kepada tatasusunan bagi tujuan kemaskini admin
        $data_get=array(
            'nama' => $m['nama_admin'],
            'nokp' => $m['nokp_admin']
        );

        # memaparkan senarai nama dalam jadual
        echo"<tr>
        <td>".$m['nama_admin']."</td>
        <td>".$m['nokp_admin']."</td>";

        # memaparkan navigasi untuk kemaskini dan hapus data admin
        echo"<td>
        |<a href='admin-kemaskini-borang.php?".http_build_query($data_get)."'>
        Kemaskini</a>

        |<a href='admin-padam-proses.php?nokp=".$m['nokp_admin']."'
        onClick=\"return confirm('Anda pasti anda ingin memadam data ini.')\">
        Hapus</a>|

        </td>
        </tr>";
    }
?>
</table>
<?php include ('footer.php'); ?>