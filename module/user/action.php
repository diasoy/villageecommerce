<?php
include("../../function/database.php");
include("../../function/helper.php");

$user_id = $_GET['id_user'];

$level = $_POST["level_user"];
$nama = $_POST['nama_user'];
$email = $_POST["email_user"];
$alamat = $_POST["alamat_user"];
$phone = $_POST["phone_user"];
$status = $_POST["status_user"];

mysqli_query($koneksi, "UPDATE user SET level_user='$level',
												nama_user='$nama',
											   email_user='$email',
											   alamat_user='$alamat',
											   phone_user='$phone',
											   status_user='$status'
											   WHERE id_user='$user_id'");

header("location: " . BASE_URL . "index.php?page=my_profile&module=user&action=list");
