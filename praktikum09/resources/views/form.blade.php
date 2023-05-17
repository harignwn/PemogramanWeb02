<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card mt-5">
                    <div class="card-body">
                        <h3 class="text-center">Form Biodata</h3><br />
                        <!-- form validasi -->
                        {{-- Tambahin method & action --}}
                        <form method="POST" action="{{url('hasil')}}">
                            {{-- Tambahin crsf --}}
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input class="form-control" type="text" name="nama">
                            </div>
                            <div class="form-group">
                                <label for="ttl">Tempat Tanggal Lahir</label>
                                <input class="form-control" type="text" name="ttl">
                            </div>
                            <div class="form-group">
                                <label for="usia">Jenis Kelamin</label>
                                <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki
                                <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
                            </div>
                            <div class="form-group">
                                <label for="hobi">Hobi</label>
                                <input class="form-control" type="text" name="hobi">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="Proses">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>