<?PHP
if (isset($_POST['btn-upload']))
{
    # memanggil fail connection
    include('connection.php');

    # mengambil nama sementara fail
    $namafailsemantara=$_FILES["data_admin"]["tmp_name"];

    # mengambil nama fail
    $namafail=$_FILES['data_admin']['name'];

    # mengambil jenis fail
    $jenisfail=pathinfo($namafail,PATHINFO_EXTENSION);

    # menguji jenis fail dan saiz fail
    if($_FILES["data_admin"]["size"]>0 AND $jenisfail=="txt")
    {
        # membuka fail yang diambil
        $fail_data_admin=fopen($namafailsemantara,"r");

        # mendapatkan data dari fail baris demi baris
        while(!feof($fail_data_admin))
        {
            # mengambil data sebaris sahaja bg setiap pusingan
            $ambilbarisdata = fgets($fail_data_admin);

            # memecahkan baris data mengikut tanda pipe
            $pecahkanbaris = explode("|",$ambilbarisdata);

            # selepas pecahn tadi akan diumpukan kepada 3
            list($nokp_admin,$nama_admin) = $pecahkanbaris;

            # arahan SQL untuk menyimpan data
            $arahan_sql_simpan = "INSERT INTO jualan (nokp_admin, nama_admin) VALUES ('$nokp_admin', '$nama_admin')";
            
            # memasukkan data kedalam jadual staff
            $laksana_arahan_simpan=mysqli_query($condb, $arahan_sql_simpan);
            echo"<script>alert('import fail data selesai');
            window.location.href='senarai-admin.php';</script>";
        }
    fclose($fail_data_admin);
    }
    else
    {
        echo"<script>alert('hanya fail berformat txt sahaja dibenarkan');</script>";
    }
}
else
{
    die("<script>alert('Ralat! akses secara terus');
    window.location.href='admin-upload-barang.php';</script>");
}
?>