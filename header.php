<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
 <link rel="stylesheet" type="text/css" href="./css/style.css">

 <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous">
    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.js" integrity="sha512-LjPH94gotDTvKhoxqvR5xR2Nur8vO5RKelQmG52jlZo7SwI5WLYwDInPn1n8H9tR0zYqTqfNxWszUEy93cHHwg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
 </script>

<script src="./js/app.js"></script>
<!-- tajuk sistem. Akan dipamerkan disebelah atas -->

<!-- Bahagian menu Asas.
     Menu terbahagi kepada 3 jenis iaitu
     1. Menu staf dimana admin dapat akses semua perkara
     2. Menu pembeli dimana pembeli hanya boleh memilih barngan dan membeli tetapi pembeli perlu login dahuli.
     3. Menu di laman utama - bagi pelawat yang tidak login pelawat tidak dapat memilih barangan

--> 
<?php
# Menu admin : dipaparkan sekiranya admin telah login
if(!empty($_SESSION['tahap']) and $_SESSION['tahap'] == "admin")
{
    echo "
    <nav class='navbar navbar-expand-lg  shadow-none fixed-top'>
    <div class='container'>
        <a class='navbar-brand align-left me-lg-5' href='#'>eKomputer</a>
        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarNav'>
            <ul class='navbar-nav'>
                <li class='nav-item'>
                    <a class='nav-link active' href='index.php'>Laman Utama</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link active' href='senarai-pembeli.php'>Senarai Pengguna</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link active' href='senarai-admin.php'>Senarai Admin</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link active' href='senarai-barang.php'>Senarai Barang</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link active' href='senarai-jualan.php'>Senarai Jualan</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link active' href='logout.php'>Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>";
}
# Menu pembeli : dipaparkan sekiranya pembeli telah login
else if(!empty($_SESSION['tahap']) and $_SESSION['tahap'] == "pembeli")
{
    echo "
    <nav class='navbar navbar-expand-lg fixed-top'>
    <div class='container'>
        <a class='navbar-brand align-left me-lg-5' href='#'>eKomputer</a>
        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarNav'>
            <ul class='navbar-nav'>
                <li class='nav-item'>
                    <a class='nav-link active' href='index.php'>Laman Utama</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link active' href='pembeli-pilih.php'>Perbandingan Barang</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link active' href='pembeli-sejarah.php'>Pembelian Terdahulu</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link active' href='logout.php'>Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav> ";

}   else {
    # menu Laman Utama : dipaparkan sekiranya admin atau pembeli tidak login
    echo "
    <nav class='navbar navbar-expand-lg fixed-top'>
    <div class='container'>
    <a class='navbar-brand align-left me-lg-5' href='#'>eKomputer</a>
        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse align-items-center' id='navbarNav'>
            <div>
            <ul class='navbar-nav'>
                <li class='nav-item'>
                <ul class='navbar-nav'>
                <li class='nav-item'>
                    <a class='nav-link active' href='index.php'>Laman Utama</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link active' href='pembeli-signup-borang.php'>Pengguna Baru</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link active' href='pembeli-login-borang.php'>Login Pengguna</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link active' href='admin-login-borang.php'>Login Admin</a>
                </li>
            </ul>
            </div>
    </div>
</nav> 
                ";
}
?>