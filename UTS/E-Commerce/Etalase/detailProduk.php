<?php 
require_once "../Admin/dbkoneksi.php";
if(isset($_GET['id'])){
	$id_produk   =$_GET['id'];
}
else {
	die ("Error. No ID Selected!");    
}
$query    =mysqli_query($conn, "SELECT * FROM produk WHERE id='$id_produk'");
$result    =mysqli_fetch_array($query);

$queryKategori    =mysqli_query($conn, "SELECT kp.nama, IF(pr.stok > 0, 'ada', 'Habis') AS keberadaan 
FROM produk pr 
INNER JOIN kategori_produk kp ON pr.kategori_produk_id = kp.id  WHERE pr.id='$id_produk'");
$resultkategori    =mysqli_fetch_array($queryKategori);
?>


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
					<h1>Product Details Page</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
						<a href="detailProduk.php">product-details</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Single Product Area =================-->
	<div class="product_image_area mb-5">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
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
				
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3><?= $result['nama'] ?></h3>
						<h2><?= "Rp. ".number_format($result['harga_jual']) ?></h2>
						<ul class="list">
							<li><a class="active" href="#"><span>Category</span> : <?=$resultkategori['nama'] ?></a></li>
							<li><a href="#"><span>Availibility</span> : <?=$resultkategori['keberadaan']?></a></li>
						</ul>
						<p><?=$result['deskripsi'] ?></p>
						<div class="product_count">
							<label for="qty">Quantity:</label>
							<input type="number" name="qty" id="sst" maxlength="12" min="1"  class="input-text qty" max="<?=$result['stok'] ?>">
						</div>
						<div class="card_area d-flex align-items-center">
							<!-- <a class="primary-btn" id="checkout-btn" href="#" >CheckOut</a> -->
							<?php 
							if($result['stok'] >= 0){
							
							?>
							<button class="primary-btn" id="checkout-btn">CheckOut</button>
							<?php 
							}else{
								?>
							<button class="primary-btn" id="checkout-btn" disabled>HABIS</button>
								<?php 
							}
							?>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->

	<!--================Product Description Area =================-->

	<!--================End Product Description Area =================-->

	<!-- Start related-product Area -->

	<!-- End related-product Area -->

	<!-- start footer Area -->
	<?php
	require_once "footer.php";
	?>
	<!-- End footer Area -->

<script>
  var checkoutBtn = document.getElementById('checkout-btn');
  var qtyInput = document.getElementById('sst');

  checkoutBtn.addEventListener('click', function(e) {
    e.preventDefault();
    var qty = qtyInput.value;
    var url = "shoping.php?id=<?= $result['id'] ?>&qty=" + encodeURIComponent(qty);
    location.href = url;
  });
</script>
