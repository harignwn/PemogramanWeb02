
<?php 
require_once "../Admin/dbkoneksi.php";

$tanggal = $_POST['tgl_pesan'];
$_nama = $_POST['name'];
$no_hp = $_POST['number'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$jumlah = $_POST['jumlah'];
$produk = $_POST['produk'];
$_deskripsi = $_POST['message'];

$_proses = $_POST['proses'];
$query    = mysqli_query($conn, "SELECT * FROM produk WHERE id='$produk'");
    $result    = mysqli_fetch_array($query);
// array data
$ar_data[] = $tanggal; // ? 1
$ar_data[] = $_nama; // ? 2
$ar_data[] = $alamat; // ? 5
$ar_data[] = $no_hp; // ? 3
$ar_data[] = $email; // ? 4
$ar_data[] = $jumlah; // ? 6
$ar_data[] = $_deskripsi; // ? 8

$ar_data[] = $produk; // ? 7

   // data baru
   $sql = "INSERT INTO pesanan (tanggal,nama_pemesan,alamat_pemesan,no_hp,email,jumlah_pesanan,deskripsi,produk_id)
    VALUES (?,?,?,?,?,?,?,?)";

if (isset($sql)) {
   $st = $conn->prepare($sql);
   $st->execute($ar_data);
}

?>

<?php 
require_once "header.php";
?>
	
	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Confirmation </h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="confirmation.php">Confirmation</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Order Details Area =================-->
	<div id="menu" class="container-fluid" >
            
	</div>
	<section class="order_details section_gap">
		<div class="container">
		<?php
               if($sql){ 
				echo "<div class='alert alert-warning' style='text-align:center;' role='alert'>
				Orderan berhasil kami terima
			  </div>";
			}else{
				echo "Gagal Menambahkan Data";
			}
            ?>
		

			<div class="order_details_table">
				<h2>Order Details</h2>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Product</th>
								<th scope="col">Quantity</th>
								<th scope="col">Total</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$id_produk   = $produk;
					
						$sqljenis = "SELECT * FROM produk Where id=$id_produk ";
						$rsjenis = $conn->query($sqljenis);

                          foreach ($rsjenis as $rowjenis) {
							$harga = $rowjenis['harga_jual'];
							$total = $jumlah * $harga;
                          ?>
						 <tr>
                        <td><?=$rowjenis['nama']?></td>
                        <td><?=$jumlah?></td>
                        <td><?="Rp ".number_format($total) ?></td>
                        <td>

</td>
                    </tr>
					<?php
                                    }
                                    ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<!--================End Order Details Area =================-->

	<!-- start footer Area -->
	<?php
	require_once "footer.php";
	?>