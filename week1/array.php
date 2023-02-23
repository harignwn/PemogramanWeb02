<?php 
//buat array 
 $animals = ["Burung", "Kucing", "Nyamuk", "Singa"];
 echo $animals[1]."<br>";//menampulkan array dengan 1 1 
 echo $animals[2]."<br>";
echo "<br>";
echo "<br>";
 foreach ($animals as $animal){
    //melooping array untuk menampilkan semua isi dalam array
    echo $animal."<br>";

 }
?>