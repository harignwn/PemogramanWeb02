<?php
require_once 'dbkoneksi.php';
$delete = $_GET['iddel'];
$sql = "DELETE FROM produk WHERE id=?";
$st = $conn->prepare($sql);
$st->execute([$delete]);

header('location:produk.php');