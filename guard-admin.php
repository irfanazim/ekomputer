<?php
# Menyemak nilai pemboleh ubah session ['tahap']
if($_SESSION['tahap'] != "admin")
{
    # jika nilainya tidak sama dengan admin. aturcara akan dihentikan
    die("<script>alert('sila login');
    window.location.href='logout.php';</script>");
}
?>