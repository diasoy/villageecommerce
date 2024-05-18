<?php
include_once($_SERVER['DOCUMENT_ROOT']."/pemweb/vicom/function/database.php");
include_once($_SERVER['DOCUMENT_ROOT']."/pemweb/vicom/function/helper.php");

$id_user = isset($_GET['id_user']) ? $_GET['id_user'] : null;
$id_mitra = isset($_GET['id_mitra']) ? $_GET['id_mitra'] : null;

$button = isset($_POST["button"]) ? $_POST["button"] : null;
$gambar = isset($_POST["gambar_mitra"]) ? $_POST["gambar_mitra"] : null;
$nama = isset($_POST['nama_mitra']) ? $_POST['nama_mitra'] : null;
$kategori = isset($_POST["kategori_mitra"]) ? $_POST["kategori_mitra"] : null;
$deskripsi = isset($_POST["deskripsi_mitra"]) ? $_POST["deskripsi_mitra"] : null;
$rincian = isset($_POST["rincian_harga"]) ? $_POST["rincian_harga"] : null;
$phone = isset($_POST["phone_mitra"]) ? $_POST["phone_mitra"] : null;
$status = isset($_POST["status_mitra"]) ? $_POST["status_mitra"] : null;

// Check if id_user exists in the user table
$result = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id_user'");
if (mysqli_num_rows($result) == 0) {
    die("Error: id_user does not exist in the user table");
}

if ($button == "Update") {
    mysqli_query($koneksi, "UPDATE mitra SET gambar_mitra='$gambar',
                                                nama_mitra='$nama',
                                                kategori_mitra='$kategori',
                                                deskripsi_mitra='$deskripsi',
                                                rincian_harga='$rincian',
                                                phone_mitra='$phone',
                                                status_mitra='$status'
                                                WHERE id_mitra='$id_mitra'");
} else if ($button == "Add") {
    mysqli_query($koneksi, "INSERT INTO mitra (id_user, gambar_mitra, nama_mitra, kategori_mitra, deskripsi_mitra, rincian_harga, phone_mitra, status_mitra) VALUES ('$id_user', '$gambar', '$nama', '$kategori', '$deskripsi', '$rincian', '$phone', 'off')");
} else {
    $id_mitra = $_GET['id_mitra'];
    mysqli_query($koneksi, "DELETE FROM mitra WHERE id_mitra='$id_mitra'");
}
header("location: " . BASE_URL . "index.php?page=my_profile&module=mitra&action=list");