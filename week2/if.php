<?php 

$total_nilai = 50;
// Buat variabel status
$status;//variabel kosong

if ($total_nilai >= 55){
	$status = "Lulus";//ctrl+d digunakan untuk menselect data atau kata yang sama 
    //secara berbarengan
}else{
	$status = "Tidak Lulus";
}

echo $status . "<br>";

// Buat variabel grade
$grade;

if ($total_nilai >= 85) {
	$grade = "A";
}elseif($total_nilai >= 70) {
	$grade = "B";
}elseif($total_nilai >= 56) {
	$grade = "C";
}elseif($total_nilai >= 36) {
	$grade = "D";
}else{
	$grade = "E";
}

echo $grade;

?>