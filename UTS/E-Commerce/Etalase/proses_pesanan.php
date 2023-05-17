<?php
require_once '../Admin/dbkoneksi.php';
?>
<?php
$tanggal = $_POST['tgl_pesan'];
$_nama = $_POST['name'];
$no_hp = $_POST['number'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$jumlah = $_POST['jumlah'];
$produk = $_POST['produk'];
$_deskripsi = $_POST['message'];

$_proses = $_POST['proses'];

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
if($sql){
    header("location:confirmation.php?pesan=suksesMenu#menu");
}else{
    echo "Gagal Menambahkan Data";
}
// header('location:confirmation.php');
// echo "<script>alert('Pesanan $_nama berhasil dikirim Terima kasih!');</script>";
?>