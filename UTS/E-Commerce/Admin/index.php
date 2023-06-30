<?php
require_once 'dbkoneksi.php';
$sql = "SELECT * FROM pesanan";
$rs = $conn->query($sql);

$total = "SELECT COUNT(*) as total FROM pesanan";
$result = $conn->query($total);
$row = $result->fetch_assoc();
$total = $row["total"];

$pemasukan = "SELECT SUM(pr.harga_jual * ps.jumlah_pesanan) as totalPemasukan FROM produk pr inner join pesanan ps on ps.produk_id = pr.id";
$resultpemasukan = $conn->query($pemasukan);
$row = $resultpemasukan->fetch_assoc();
$totalpemasukan = $row["totalPemasukan"];

$Modal = "SELECT SUM(pr.harga_beli * ps.jumlah_pesanan) as totalModal FROM produk pr inner join pesanan ps on ps.produk_id = pr.id";
$resultModal = $conn->query($Modal);
$row = $resultModal->fetch_assoc();
$totalModal = $row["totalModal"];

$Keuntungan = $totalpemasukan - $totalModal;
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>E-Commerce Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="assets/images/favicon.png" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
   <?php
   require_once "sidebar.php"
   ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_navbar.html -->
      <?php
      require_once "navigasi.php"
      ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
           
            <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                  <div class="row">
                    <div class="col-9">
                      <div class="d-flex align-items-center " >
                        <h3 class="mb-3" style=""> <?php echo $total ?> </h3>
                        <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                      </div>
                    </div>
                    <div class="col-3">
                    </div>
                  </div>
                  <h6 class="text-muted font-weight-normal">Jumlah Pesanan</h6>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-9">
                      <div class="d-flex align-items-center align-self-start">
                        <h3 class="mb-3"><?="Rp ".number_format($totalpemasukan) ?></h3>
                      </div>
                    </div>
                  </div>
                  <h6 class="text-muted font-weight-normal">Total Pemasukan</h6>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-9">
                      <div class="d-flex align-items-center align-self-start">
                        <h3 class="mb-3"><?= "Rp ". number_format($totalModal)?></h3>
                      </div>
                    </div>
                  </div>
                  <h6 class="text-muted font-weight-normal">Total Pengeluaran</h6>
                </div>
              </div>
            </div>
          </div>

          <div class="row ">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Pesanan</h4>
                  <div class="table-responsive">
                    <table class="table" id="example">
                      <thead style="text-align:center ;">
                        <tr>
                          <th> NO </th>
                          <th> ID </th>
                          <th> Tanggal Pesan </th>
                          <th> Nama Pemesan </th>
                          <th> Alamat Pemesan </th>
                          <th> No Handphone </th>
                          <th> Email </th>
                          <th> Jumlah Pesanan </th>
                          <th> Deskripsi </th>  
                          <th> Produk ID </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                $nomor  =1 ;
                foreach($rs as $row){
                ?>
                    <tr>
                        <td><?=$nomor?></td>
                        <td><?=$row['id']?></td>
                        <td><?=$row['tanggal']?></td>
                        <td><?=$row['nama_pemesan']?></td>
                        <td><?=$row['alamat_pemesan']?></td>
                        <td><?=$row['no_hp']?></td>
                        <td><?=$row['email']?></td>
                        <td><?=$row['jumlah_pesanan']?></td>
                        <td><?=$row['deskripsi']?></td>
                        <td><?=$row['produk_id']?></td>
                       
                    </tr>
                <?php 
                $nomor++;   
                } 
                ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php
      require_once "footer.php";
      ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="assets/vendors/chart.js/Chart.min.js"></script>
  <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
  <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
  <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="assets/js/dashboard.js"></script>
  <!-- End custom js for this page -->
</body>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
</html>