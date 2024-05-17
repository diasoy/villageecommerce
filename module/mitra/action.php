<?php
include("../../function/database.php");
include("../../function/helper.php");

$mitra_id = $_GET['id_mitra'];

$gambar = $_POST["gambar_mitra"];
$level = $_POST["level_mitra"];
$nama = $_POST['nama_mitra'];
$kategori = $_POST["kategori_mitra"];
$deskripsi = $_POST["deskripsi_mitra"];
$rincian = $_POST["rincian_harga"];
$phone = $_POST["phone_mitra"];
$status = $_POST["status_mitra"];

mysqli_query($koneksi, "UPDATE mitra SET gambar_mitra=$gambar,
                                                level_mitra='$level',
												nama_mitra='$nama',
											    kategori_mitra='$kategori',
											    deskripsi_mitra='$deskripsi',
											    deskripsi_mitra='$deskripsi',
											    rincian_harga='$rincian',
											    phone_mitra='$phone',
											    status_mitra='$status'
											    WHERE id_mitra='$mitra_id'");

header("location: " . BASE_URL . "index.php?page=my_profile&module=mitra&action=list");
