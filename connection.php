<?php
# nama host. localhost merupakan default
$nama_host = "localhost";

# usernam bagi SQL. root merupakan default
$nama_sql = "root";

# password bagi SQL. masukkan password anda.
$pass_sql = "";

# nama pangkalan data yang anda telah bangunkan selama ini.
$nama_db = "ekomputer";

# membuka hubungan antara pangkalan data dan sistem.
$condb = mysqli_connect($nama_host, $nama_sql, $pass_sql, $nama_db);

# menguji adakah hubungan berjaya dibuka
if (!$condb)
{
    die("Sambungan ke pangkalan data gagal");
}
else
{
    # echo "Sambungan ke pangkalan data berjaya";
}
?>