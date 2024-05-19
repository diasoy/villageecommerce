<?php
session_start();

include_once('../../Function/database.php');
include_once('../../function/helper.php');

$id_user = $_SESSION['id_user'];
$gambarMitra = $_POST["gambar_mitra"];
$namaMitra = $_POST['nama_mitra'];
$kategoriMitra = $_POST["kategori_mitra"];
$deskripsiMitra = $_POST["deskripsi_mitra"];
$rincianHarga = $_POST["rincian_harga"];
$phoneMitra = $_POST["phone_mitra"];
$id_mitra = '';

mysqli_query($koneksi, "INSERT INTO mitra (id_mitra, gambar_mitra, id_user, nama_mitra, kategori_mitra, deskripsi_mitra, rincian_harga, phone_mitra, status_mitra) VALUES ('$id_mitra', '$gambarMitra','$id_user', '$namaMitra', '$kategoriMitra', '$deskripsiMitra', '$rincianHarga', '$phoneMitra', 'off')");

header("location: " . BASE_URL . "index.php?page=my_profile&module=mitra&action=list");
