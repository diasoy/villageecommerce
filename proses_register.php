<?php

include_once("function/database.php");
include_once("function/helper.php");

$level = "customer";
$status = "on";
$nama_lengkap = $_POST['nama_user'];
$email = $_POST['email_user'];
$alamat = $_POST['alamat_user'];
$phone = $_POST['phone_user'];
$password = $_POST['password_user'];
$re_password = $_POST['re_password'];

unset($_POST['password_user']);
unset($_POST['re_password']);
$dataForm = http_build_query($_GET);

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE email_user='$email'");

if (empty($nama_lengkap) || empty($email) || empty($alamat) || empty($phone) || empty($password)) {
    header("location: " . BASE_URL . "index.php?page=register&notif=require&$dataForm");
} elseif ($password != $re_password) {
    header("location: " . BASE_URL . "index.php?page=register&notif=password&$dataForm");
} elseif (mysqli_num_rows($query) == 1) {
    header("location: " . BASE_URL . "index.php?page=register&notif=email&$dataForm");
} else {
    $password = md5($password);
    mysqli_query($koneksi, "INSERT INTO user (level_user, nama_user, email_user, alamat_user, phone_user, password_user, status_user)
										VALUES ('$level', '$nama_lengkap', '$email', '$alamat', '$phone', '$password', '$status')");

    header("location: " . BASE_URL . "index.php?page=login");
}
