<?php
include("../../function/database.php");
include("../../function/helper.php");

session_start();

$id_mitra = $_GET['id_mitra'];

$gambarMitra = $_POST["gambar_mitra"];
$namaMitra = $_POST["nama_mitra"];
$kategoriMitra = $_POST["kategori_mitra"];
$deskripsiMitra = $_POST["deskripsi_mitra"];
$rincianHarga = $_POST["rincian_harga"];
$phoneMitra = $_POST["phone_mitra"];


if ($level == "admin") {
    mysqli_query($koneksi, "UPDATE mitra SET status_mitra='$statusMitra' WHERE id_mitra='$id_mitra'");
    if ($statusMitra == 1) {
        $query = mysqli_query($koneksi, "SELECT * FROM mitra WHERE id_mitra='$id_mitra'");
        $row = mysqli_fetch_assoc($query);
        $namaMitra = $row['nama_mitra'];
        $phoneMitra = $row['phone_mitra'];
        $emailMitra = $row['email_mitra'];
        $alamatMitra = $row['alamat_mitra'];
    }
} else {
    mysqli_query($koneksi, "UPDATE mitra SET gambar_mitra='$gambarMitra', nama_mitra='$namaMitra', kategori_mitra='$kategoriMitra', deskripsi_mitra='$deskripsiMitra',rincian_harga='$rincianHarga', phone_mitra='$phoneMitra' WHERE id_mitra='$id_mitra'");
}

header("location: " . BASE_URL . "index.php?page=my_profile&module=mitra&action=list");
