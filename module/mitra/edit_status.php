<?php
include_once("../../function/database.php");
include_once("../../function/helper.php");

$id_mitra = $_GET['id_mitra'];
$status = $_POST["status"];

mysqli_query($koneksi, "UPDATE mitra SET status_mitra='$status' WHERE id_mitra='$id_mitra'");
header("location: " . BASE_URL . "index.php?page=my_profile&module=mitra&action=list");
