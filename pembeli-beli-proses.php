<?php
# memulakan fungsi session
session_start();

# menyemak kewujudan data post
if (!empty($_POST)) {
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $tarikh = date("y-m-d");
    include('connection.php');

    # arahan query untuk memilih secara rawak nokp_admin dari database
    $sql_select_admin = "SELECT nokp_admin FROM jualan ORDER BY RAND() LIMIT 1";
    $result_select_admin = mysqli_query($condb, $sql_select_admin);

    if ($result_select_admin && mysqli_num_rows($result_select_admin) > 0) {
        $admin = mysqli_fetch_assoc($result_select_admin);
        $nokp_admin = $admin['nokp_admin'];

        # arahan query untuk memilih nama_admin berdasarkan nokp_admin yang dipilih secara rawak
        $sql_select_nama_admin = "SELECT nama_admin FROM jualan WHERE nokp_admin = '$nokp_admin'";
        $result_select_nama_admin = mysqli_query($condb, $sql_select_nama_admin);

        if ($result_select_nama_admin && mysqli_num_rows($result_select_nama_admin) > 0) {
            $nama_admin = mysqli_fetch_assoc($result_select_nama_admin)['nama_admin'];

            # arahan query untuk menyimpan data jualan dengan nokp_admin dan nama_admin yang dipilih secara rawak
            $sql_simpan = "INSERT INTO jualan (nokp_pembeli, nokp_admin, nama_admin, kod_barang, tarikh)
                           VALUES ('".$_SESSION['nokp']."', '$nokp_admin', '$nama_admin', '".$_POST['kod_barang']."', '$tarikh')";

            # melaksanakan arahan untuk menyimpan data jualan
            $laksana_query = mysqli_query($condb, $sql_simpan);

            # menyemak sama ada proses menyimpan data jualan berjaya atau tidak
            if ($laksana_query) {
                # jika berjaya
                die("<script>alert('Pembelian Berjaya.');
                window.location.href='pembeli-sejarah.php';</script>");
            } else {
                # jika gagal
                echo mysqli_error($condb);
                die("<script>alert('Pendaftaran Gagal.');
                window.location.href='pembeli-signup-borang.php'; </script>");
            }
        } else {
            # handle the case when no nama_admin is found for the selected nokp_admin
            die("<script>alert('Nama admin not found.'); window.location.href='pembeli-signup-borang.php';</script>");
        }
    } else {
        # handle the case when no admin is found
        die("<script>alert('No admin found.'); window.location.href='pembeli-signup-borang.php';</script>");
    }
} else {
    die("<script>alert('Sila lengkapkan maklumat');
    window.location.href='pembeli-signup-borang.php'; </script>");
}
?>