<?php 

$grade = "B";
$predikat;
for ($x = 1; $x < 10; $x++) {
	echo $x." ";
  }
switch ($grade) {
	case 'A':
		$predikat="Sangat Memuaskan";
		break;
	 case "B":
		$predikat="Memuaskan";
		break;
	case "C":
		$predikat="Cukup";
		break;
	case "D":
		$predikat="Kurang";
		break;
	case "E":
		$predikat="Sangat Kurang";
		break;
	default: //menjalankan kondisi jika tidak ada pilihan yang di case
		$predikat="Tidak Ada";
		break;
}

echo $predikat;

?>