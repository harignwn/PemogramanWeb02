<?php
require_once "../Admin/dbkoneksi.php";

if (isset($_GET['id'])) {
    $id_produk   = $_GET['id'];

    $query    = mysqli_query($conn, "SELECT * FROM produk WHERE id='$id_produk'");
    $result    = mysqli_fetch_array($query);
}

?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Karma Shop</title>

    <!--
            CSS
            ============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/nouislider.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

    <!-- Start Header Area -->
    <?php
    require_once "header.php";
    ?>
    <!-- End Header Area -->

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Checkout</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="single-product.html">Checkout</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">


            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Shopping Details</h3>
                        <form class="row contact_form" action="confirmation.php" method="POST" novalidate="novalidate">
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="first" name="name" placeholder="Nama Anda">
                            </div>
                            <div class="col-md-12 form-group p_star" hidden>
                                <input type="datetime" class="form-control" id="tgl_pesan" name="tgl_pesan" value="<?php echo date('Y-m-d'); ?>">
                            </div>

                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="number" name="number" placeholder="Nomor Handphone">
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            </div>

                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                            </div>
                            <div class="col-md-4 form-group p_star">
                            <?php
                                    if (!empty($_GET['qty'])) {
                                        $quantity   = $_GET['qty'];
                                    } 
                                    ?>
                                <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah pesanan" min="1" value="<?=$quantity ?>" max="<?= $result['stok'] ?>">
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <select class="form-control" id="kategoriproduk" name="produk">
                                    <?php
                                    if (!empty($_GET['id'])) {
                                        $id_produk   = $_GET['id'];
                                        $sqljenis = "SELECT * FROM produk Where id=$id_produk ";
                                        $rsjenis = $conn->query($sqljenis);
                                    } else {
                                        $sqljenis = "SELECT * FROM produk ";
                                        $rsjenis = $conn->query($sqljenis);
                                    }

                                    ?>
                                    <?php
                                    foreach ($rsjenis as $rowjenis) {
                                    ?>
                                        <option value="<?= $rowjenis['id'] ?>"><?= $rowjenis['nama'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-12 form-group">

                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Order Notes"></textarea>
                            </div>
                            <input type="submit" name="proses" type="submit" class="primary-btn ml-3" value="CheckOut" />
                        </form>
                    </div>
                    <div class="col-lg-4">
                    <div class="s_Product_carousel">
						<div class="single-prd-item">
							<img class="img-fluid" src="img/category/s-p1.jpg" alt="">
						</div>
						<div class="single-prd-item">
							<img class="img-fluid" src="img/category/s-p1.jpg" alt="">
						</div>
						<div class="single-prd-item">
							<img class="img-fluid" src="img/category/s-p1.jpg" alt="">
						</div>
					</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->

    <?php
    require_once "footer.php"
    ?>
    <!-- End footer Area -->


    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="js/gmaps.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>