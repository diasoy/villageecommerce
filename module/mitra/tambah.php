<?php
include("../../function/database.php");
include("../../function/helper.php");

$gambar = $_POST["gambar_mitra"];
$level = $_POST["level_mitra"];
$nama = $_POST['nama_mitra'];
$kategori = $_POST["kategori_mitra"];
$deskripsi = $_POST["deskripsi_mitra"];
$rincian = $_POST["rincian_harga"];
$phone = $_POST["phone_mitra"];
$status = $_POST["status_mitra"];

mysqli_query($koneksi, "INSERT INTO mitra (gambar_mitra, level_mitra, nama_mitra, kategori_mitra, deskripsi_mitra, rincian_harga, phone_mitra, status_mitra) 
                        VALUES ('$gambar', '$level', '$nama', '$kategori', '$deskripsi', '$rincian', '$phone', '$status')");

header("location: " . BASE_URL . "index.php?page=my_profile&module=mitra&action=list");
