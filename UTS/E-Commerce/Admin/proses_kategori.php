<?php
require_once 'dbkoneksi.php';
?>
<?php
$_namakategori = $_POST['nama'];
$_proses = $_POST['proses'];

// array data
$ar_data[] = $_namakategori; // ? 1

if ($_proses == "Simpan") {
   // data baru
   $sql = "INSERT INTO kategori_produk (nama) VALUES (?)";
} else if ($_proses == "Update") {
   $ar_data[] = $_POST['idedit'];
   $sql = "UPDATE kategori_produk SET nama=? WHERE id=?";
}
if (isset($sql)) {
   $st = $conn->prepare($sql);
   $st->execute($ar_data);
}

header('location:kategori.php');
?>