<!-- fungsi mengubah saiz tulisan bagi kepelbagaian pengguna-->
<script>
function ubahsaiz(gandaan) {
    //mendapatkan saiz semasa tulisan pada jadual
    var saiz=document.getElementById("saiz");
    var saiz_semasa= parseFloat(saiz.style.fontSize) || 1;
    /* menyemak jika pengguna menekan butang,nilai yang akan dihantar
    butang reset -nilai 2 dihantar-kembali kepada saiz asal tulisan
    butang +- nilai 1 dihantar- besarkan saiz tulisan
    butang-- nilai -1 dihantar - kecilkan saiz tulisan
    */
    if(gandaan==2)
    {
        saiz.style.fontSize = "1em"
    }
    else
    {
        saiz.style.fontSize = (saiz_semasa + (gandaan * 0.2)) + "em";
    }
}
</script>

<!-- Kod untuk butang mengubah saiz tulisan -->
<div class="container-button" style="text-align: center;">
    <div class="resize-text" style="display: inline-block; margin-right: 10px;">Ubah saiz tulisan
        <div class="button-group" style="display: inline-block;">
            <input nama='reSize1' type='button' value='reset' onclick="ubahsaiz(2)" />
            <input nama='reSize' type='button' value='&nbsp;+&nbsp;' onclick="ubahsaiz(1)" />
            <input nama='reSize2' type='button' value='&nbsp;-&nbsp;' onclick="ubahsaiz(-1)" />
            <button onclick="window.print()">Cetak</button>
        </div>
    </div>
</div>
