<?php 
//buat array asosiatif

$mahasiswa = ["nama"=>"hari Gunawan", "jurusan"=> "Sistem Informasi","semester"=>2];
echo $mahasiswa["nama"];//mengakses data menggunakan key untuk menampilkan valuenya 

//menampilkan semua data 
foreach ($mahasiswa as $key => $value){
echo "key :".$key." value :".$value;
}
echo "<br>";
echo "<br>";
echo "<br>";
//buat array multidimensi 

$dosen = [
    ["Pak Rojul","Web"],
    ["Pak rezaa", "DDP"],
    ["Pak Lukman", "OS"]
];
echo $dosen[0][0]
?>