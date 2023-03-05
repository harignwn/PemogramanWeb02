<?php
$No = 1;
$nama = $_POST['nama'];
$Product = $_POST['rbProduct'];
$jumlahProduct = $_POST['txtjmlProduk'];
$hargaSatuan;
if ($Product == "KULKAS") {
    $hargaSatuan = 3100000;
} else if ($Product == "TV") {
    $hargaSatuan = 4200000;
} else if ($Product == "MESIN CUCI") {
    $hargaSatuan = 3800000;
}

$jumlahTotal = $hargaSatuan * $jumlahProduct;
$diskom;
if ($jumlahProduct > 3 && $jumlahProduct < 6) {
    $diskom = 0.10;
} else if ($jumlahProduct > 5) {
    $diskom = 0.20;
} else {
    $diskom = 0.0;
}
$TotalDiskon = $jumlahTotal * $diskom;

$hargaBayar = $jumlahTotal - $TotalDiskon;
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Form Belanja</title>
</head>

<body>
    <div class="container">

        <!-- Stack the columns on mobile by making one full-width and the other half-width -->
        <div class="row">
            <div class="col-12">
                <h1>Form Belanja</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <form method="POST" action="form_belanja.php">

                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Customer</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Customer</label>

                        <div class="form-check form-check-inline ml-3">
                            <input class="form-check-input" type="radio" name="rbProduct" id="rbTV" value="TV">
                            <label class="form-check-label" for="inlineRadio1">TV</label>
                        </div>
                        <div class="form-check form-check-inline ml-3">
                            <input class="form-check-input" type="radio" name="rbProduct" id="rbKulkas" value="KULKAS">
                            <label class="form-check-label" for="inlineRadio2">KULKAS</label>
                        </div>
                        <div class="form-check form-check-inline ml-3">
                            <input class="form-check-input" type="radio" name="rbProduct" id="rbMesinCuci" value="MESIN CUCI">
                            <label class="form-check-label" for="inlineRadio3">MESIN CUCI</label>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="txtjmlProduk" class="col-sm-2 col-form-label" name="jmlProduk">Jumlah</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="text" placeholder="Masukan Jumlah" name="txtjmlProduk">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-2">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-danger" name="batal">Batal</button>
                                <button type="submit" class="btn btn-primary" name="kirim">Kirim</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-4">
                <div class="card text-center">
                    <div class="card-header">
                        Daftar Harga
                    </div>
                    <div class="card-body text-justify">
                        <h5 class="card-title">TV 4.200.000</h5>
                        <h5 class="card-title">Kulkas 3.100.000</h5>
                        <h5 class="card-title">Mesin cuci 3.800.000</h5>
                    </div>
                    <div class="card-footer text-muted">
                        Harga Dapat Berubah Setiap saat
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h3>Ringkasan Belanja</h3>
                <hr>
            </div>
        </div>
        <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Customer</th>
                            <th scope="col">Product</th>
                            <th scope="col">Jumlah Product</th>
                            <th scope="col">Total Harga Product</th>
                            <th scope="col">Diskon</th>
                            <th scope="col">Harga Bayar</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $No++; ?></td>
                            <td><?= $nama; ?></td>
                            <td><?= $Product; ?></td>
                            <td><?= $jumlahProduct; ?></td>
                            <td><?= number_format($jumlahTotal); ?></td>
                            <td><?= number_format($TotalDiskon); ?></td>
                            <td><?= number_format($hargaBayar); ?></td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Columns are always 50% wide, on mobile and desktop -->

    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>