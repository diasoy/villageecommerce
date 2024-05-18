<?php
include("../../function/database.php");
include("../../function/helper.php");

$id_user = $_GET['id_user'];

$namaUser = $_POST['nama_user'];
$levelUser = $_POST["level_user"];
$emailUser = $_POST["email_user"];
$phoneUser = $_POST["phone_user"];
$alamatUser = $_POST["alamat_user"];
$statusUser = $_POST["status_user"];

mysqli_query($koneksi, "UPDATE user SET level_user='$levelUser',
										nama_user='$namaUser',
										email_user='$emailUser',
										phone_user='$phoneUser',
										alamat_user='$alamatUser',
										status_user='$statusUser'
										WHERE id_user='$id_user'");

header("location: " . BASE_URL . "index.php?page=my_profile&module=user&action=list");
