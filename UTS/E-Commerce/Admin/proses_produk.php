<?php
require_once 'dbkoneksi.php';
?>
<?php
$_kode = $_POST['kode'];
$_nama = $_POST['nama'];
$_harga_jual = $_POST['harga_jual'];
$_harga_beli = $_POST['harga_beli'];
$_stok = $_POST['stok'];
$_min_stok = $_POST['min_stok'];
$_deskripsi = $_POST['deskripsi'];
$_kategoriproduk = $_POST['kategoriproduk'];

$_proses = $_POST['proses'];

// array data
$ar_data[] = $_kode; // ? 1
$ar_data[] = $_nama; // ? 2
$ar_data[] = $_harga_jual; // ? 3
$ar_data[] = $_harga_beli; // ? 4
$ar_data[] = $_stok; // ? 5
$ar_data[] = $_min_stok; // ? 6
$ar_data[] = $_deskripsi; // ? 7
$ar_data[] = $_kategoriproduk; // ? 8

if ($_proses == "Simpan") {
   // data baru
   $sql = "INSERT INTO produk (kode,nama,harga_jual,harga_beli,stok,min_stok,deskripsi,kategori_produk_id)
    VALUES (?,?,?,?,?,?,?,?)";
} else if ($_proses == "Update") {
   $ar_data[] = $_POST['idedit'];
   $sql = "UPDATE produk SET nama=?,kode=?,harga_jual=?,harga_beli=?,stok=?,min_stok=?,deskripsi=?,kategori_produk_id=? WHERE id=?";
}
if (isset($sql)) {
   $st = $conn->prepare($sql);
   $st->execute($ar_data);
}

header('location:produk.php');
?>