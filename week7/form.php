<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
        <h1>BMI Pasien</h1>
<form method="POST" action="form.php">
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Nama</label> 
    <div class="col-8">
      <input id="nama" name="nama" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="beratbadan" class="col-4 col-form-label">Berat Badan</label> 
    <div class="col-8">
      <input id="beratbadan" name="beratbadan" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="tinggibadan" class="col-4 col-form-label">Tinggi Badan</label> 
    <div class="col-8">
      <input id="tinggibadan" name="tinggibadan" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="tinggibadan" class="col-4 col-form-label">Umur</label> 
    <div class="col-8">
      <input id="umur" name="umur" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Jenis Kelamin</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="jk" id="jk_0" type="radio" class="custom-control-input" value="L"> 
        <label for="jk_0" class="custom-control-label">Laki Laki</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="jk" id="jk_1" type="radio" class="custom-control-input" value="P"> 
        <label for="jk_1" class="custom-control-label">Perempuan</label>
      </div>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>

    </div>

    <?php
        if (isset($_POST["submit"])) {
            require_once "class.php";

            // Set nilai properti pada objek dari nilai yang diisi pada form
            $nama = $_POST["nama"];
            $berat = $_POST["beratbadan"];
            $tinggi = $_POST["tinggibadan"];
            $umur = $_POST["umur"];
            $jk = $_POST["jk"];

						// Buat objek baru dari class bmiPasien
            $pasien = new bmiPasien($nama, $berat, $tinggi, $umur, $jk);

            echo "<h2>Hasil BMI Pasien</h2>";
            echo "<p>Nama: " . $pasien->nama . "</p>";
            echo "<p>Berat: " . $pasien->berat . " kg</p>";
            echo "<p>Tinggi: " . $pasien->tinggi . " cm</p>";
            echo "<p>Umur: " . $pasien->umur . " tahun</p>";
            echo "<p>Jenis Kelamin: " . $pasien->jk . "</p>";
            echo "<p>Hasil BMI: " . $pasien->hasilBMI() . "</p>";
            echo "<p>Status BMI: " . $pasien->statusBMI() . "</p>";
        }

        ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>