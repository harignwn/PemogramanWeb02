<?php


require_once "head.php"; //memanggil file header untuk menyatukan dengan main
?>

<div class="container">
    <h1>Form Pendaftaran</h1>
    <form method="POST" action="main.php">
        <div class="form-group row">
            <label for="txtNama" class="col-4 col-form-label">Nama</label>
            <div class="col-8">
                <input id="txtNama" name="txtNama" placeholder="Masukan Nama" type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4">Jenis Kelamin</label>
            <div class="col-8">
                <div class="custom-control custom-radio custom-control-inline">
                    <input name="rbJk" id="rbJk_0" type="radio" class="custom-control-input" value="laki">
                    <label for="rbJk_0" class="custom-control-label">Laki - Laki</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input name="rbJk" id="rbJk_1" type="radio" class="custom-control-input" value="perempuan">
                    <label for="rbJk_1" class="custom-control-label">Perempuan</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4">Checkboxes</label>
            <div class="col-8">
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input name="cbHobi[]" id="cbHobi[]_0" type="checkbox" class="custom-control-input" value="membaca">
                    <label for="cbHobi[]_0" class="custom-control-label">Membaca</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input name="cbHobi[]" id="cbHobi[]_1" type="checkbox" class="custom-control-input" value="menulis">
                    <label for="cbHobi[]_1" class="custom-control-label">Menulis</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input name="cbHobi[]" id="cbHobi[]_2" type="checkbox" class="custom-control-input" value="jajan">
                    <label for="cbHobi[]_2" class="custom-control-label">Jajan</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input name="cbHobi[]" id="cbHobi[]_3" type="checkbox" class="custom-control-input" value="olahraga">
                    <label for="cbHobi[]_3" class="custom-control-label">Olahraga</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="txtIpk" class="col-4 col-form-label">IPK</label>
            <div class="col-8">
                <input id="txtIpk" name="txtIpk" placeholder="Masukan IPK" type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    <hr>
    <h3>Informasi yang DIkirim :</h3>
    <?php
// isset = berfungsi mengecek data saat dikirin user
if (isset($_POST['submit'])) {
    $nama = $_POST['txtNama'];
    $jk = $_POST['rbJk'];
    $hobi = $_POST['cbHobi'];
    $ipk = $_POST['txtIpk'];
// buat function
function cekStatus($ip){
    if ($ip >= 3 && $ip <=4) {
        return "lulus";
    } else {
        return "tidak lulus";
    }
}
$status = cekStatus($ipk);
    echo "Nama :".$nama;
    echo "<br>Jenis Kelamin :".$jk;
    echo "<br> Hobi :";
    foreach($hobi as $h){ //mengambil data yang berupa array dari chekbox
        echo $h." ,";
    }
    echo "<br> IPK :".$ipk;
    echo "<br> Status :".$status;
}
?>
</div>


<?php
require_once "footer.php";
?>