<?php 
//buat fungsi
function hitungUmur($tahun_Lahir){
    $tahun_Sekarang = 2023;

    //hitung umur
    $umur = $tahun_Sekarang - $tahun_Lahir;
    //tampilkan
    return $umur;
}
// hitungUmur(2003);//jika return harus pake echo
echo hitungUmur(2003);

?>