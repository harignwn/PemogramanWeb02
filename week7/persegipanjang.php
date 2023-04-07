<?php 

class PersegiPanjang{
    public $Panjang,$Lebar;

    public function __construct($panjangcons,$lebarcons)
    {
        //akses property karena masih di dalam class yang sama maka dengan this
        $this->Panjang = $panjangcons;
        $this->Lebar = $lebarcons;
    }

    public function keliling(){
        //buat tinggi dalam meter
        $keliling = 2*($this->Panjang+$this->Lebar);;
        return $keliling;
    } 
    //method status
    public function Luas(){
        $Luas = $this->Panjang * $this->Lebar;
        return $Luas;
    }
}
//buat objek

// $persegiPanjang = new PersegiPanjang("21","L");

// echo $persegiPanjang->Lebar."<br>";
// echo $persegiPanjang->Panjang."<br>";
// echo $persegiPanjang->keliling()."<br>";
// echo $persegiPanjang->Luas();
// //akses kelas memakai ->
// $pasien->nama = "Hari Gunawan";
// echo $pasien->nama;

?>