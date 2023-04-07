<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Persegi Panjang</title>
  </head>
  <body>
    <div class="container">
        <h1>Hitung Persegi Panjang</h1>
<form method="POST" action="persegiform.php">
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Panjang</label> 
    <div class="col-8">
      <input id="panjang" name="panjang" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="beratbadan" class="col-4 col-form-label">Lebar</label> 
    <div class="col-8">
      <input id="lebar" name="lebar" type="text" class="form-control">
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
            require_once "persegipanjang.php";

            // Set nilai properti pada objek dari nilai yang diisi pada form
            $panjang = $_POST["panjang"];
            $lebar = $_POST["lebar"];


						// Buat objek baru dari class bmiPasien
            $PersegiPanjang = new PersegiPanjang($panjang, $lebar);

            echo "<h2>Hasil Keliling dan Luas Persegi Panjang</h2>";
            echo "<p>Panjang: " . $PersegiPanjang->Panjang . " cm</p>";
            echo "<p>Lebar: " . $PersegiPanjang->Lebar . " cm</p>";
            echo "<p>Keliling: " . $PersegiPanjang->keliling() . " cm</p>";
            echo "<p>Luas: " . $PersegiPanjang->Luas() . " cm2</p>";

        }
        ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>