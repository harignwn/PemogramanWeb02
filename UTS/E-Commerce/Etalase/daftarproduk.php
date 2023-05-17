<?php 
require_once '../Admin/dbkoneksi.php';
$sql = "SELECT * FROM produk";
$rs = $conn->query($sql);
?>

	<!-- Start Header Area -->
	<?php
	require_once "header.php";
	?>

	<!-- Start category Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>List Product Page</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="daftarproduk.php">Product</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End category Area -->

	<!-- start product Area -->
	<section>
		<!-- single product slide -->
			<div class="container mt-5">
				
				<div class="row">
					<!-- single product -->
					<?php 
                foreach($rs as $row){
                ?>
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<img class="img-fluid" src="img/product/p1.jpg" alt="">
							<div class="product-details">
								<h6><?=$row['nama']?></h6>
								<div class="price">
									<h6><?= "Rp. ".number_format($row['harga_jual'])?></h6>
									<h6 class="l-through"><?="Rp. ".number_format($row['harga_jual']+350000)?></h6>
								</div>
								<div class="prd-bottom">

							
									<a href="detailProduk.php?id=<?=$row['id']?>" class="social-info">
										<span class="lnr lnr-move"></span>
										<p class="hover-text">view more</p>
									</a>
								</div>
							</div>
						</div>
					</div>
					<!-- single product -->
					<?php 
                } 
                ?>
				</div>
			</div>
		</div>
		<!-- single product slide -->
	</section>
	<!-- end product Area -->

	<!-- Start exclusive deal Area -->

	<!-- End exclusive deal Area -->

	<!-- Start brand Area -->
>
	<!-- End brand Area -->


	<!-- End related-product Area -->

	<!-- start footer Area -->
	<?php
	require_once "footer.php";
	?>
	<!-- End footer Area -->

	