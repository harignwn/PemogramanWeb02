<?php 

class bmiPasien{
    public $nama,$berat,$tinggi,$umur,$jk;

    public function __construct($namacons,$beratcons,$tinggicons,$umurcons,$jkcons)
    {
        //akses property karena masih di dalam class yang sama maka dengan this
        $this->nama = $namacons;
        $this->berat = $beratcons;
        $this->tinggi = $tinggicons;
        $this->umur = $umurcons;
        $this->jk = $jkcons;
        
    }

    public function hasilBMI(){
        //buat tinggi dalam meter
        $tinggi_m = $this->tinggi/100;

        $bmi = $this->berat /($tinggi_m * $tinggi_m);
        return $bmi;
    }
    //method status
    public function statusBMI(){
        $bmi = $this->hasilBMI();

        //cek data dijadikan status
        if ($bmi < 18.5) {
            return "kekurangan berat Badan";
        } else if($bmi >= 18.5 && $bmi <= 24.9 ) {
            return "Normal Ideal";
            
        }else if($bmi >= 25 && $bmi <=29.9) {
            return "kelebihan berat Badan";
            
        }
        else{
            return "Kegemukan";
        }
    }
}
//buat objek

$pasien = new bmiPasien("hari","62","158","21","L");

echo $pasien->nama."<br>";
echo $pasien->berat."<br>";
echo $pasien->hasilBMI()."<br>";
echo $pasien->statusBMI();
// //akses kelas memakai ->
// $pasien->nama = "Hari Gunawan";
// echo $pasien->nama;





?>