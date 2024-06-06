<?php

include_once('function/database.php');

$id_guest = $_SESSION['id_guest'];
$id_mitra = $_GET['id_mitra'];

$query = "SELECT kategori_mitra FROM mitra WHERE id_mitra = '$id_mitra'";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die('Query Error: ' . mysqli_errno($koneksi) . ' - ' . mysqli_error($koneksi));
}

$row = mysqli_fetch_assoc($result);
$kategoriMitra = $row['kategori_mitra'];

$query = "INSERT INTO kunjungan_mitra (id_guest, id_mitra, kategori_mitra, click) 
          VALUES ('$id_guest', '$id_mitra', '$kategoriMitra', 1) 
          ON DUPLICATE KEY UPDATE click = click + 1";

$result = mysqli_query($koneksi, $query);

if (!$result) {
    die('Query Error: ' . mysqli_errno($koneksi) . ' - ' . mysqli_error($koneksi));
}

header("Location: " . BASE_URL . "index.php?page=detail_mitra&id_mitra=" . $id_mitra);
exit();
