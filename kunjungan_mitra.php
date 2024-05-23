<?php
include("../../function/database.php");
include("../../function/helper.php");

$id_mitra = $_GET['id_mitra'];

// Get the mitra data first
$query = mysqli_query($koneksi, "SELECT * FROM mitra WHERE id_mitra = '$id_mitra'");
$row = mysqli_fetch_assoc($query);

if ($row) {
    // Increase the visit count
    mysqli_query($koneksi, "UPDATE mitra SET kunjungan_mitra = kunjungan_mitra + 1 WHERE id_mitra = '$id_mitra'");

    // Redirect to the mitra detail page
    header("location: " . BASE_URL . "index.php?page=detail_mitra&id_mitra=" . $row['id_mitra']);
} else {
    echo "No mitra found with id: $id_mitra";
}
