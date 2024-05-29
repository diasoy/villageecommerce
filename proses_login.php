<?php

include_once("function/database.php");
include_once("function/helper.php");

session_start();

$email = $_POST['email_user'];
$password = md5($_POST['password_user']);

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE email_user='$email' AND password_user='$password' AND status_user='on'");

if (mysqli_num_rows($query) == 0) {
    header("location:" . BASE_URL . "index.php?page=login&notif=true");
} else {
    $row = mysqli_fetch_assoc($query);

    $_SESSION['id_user'] = $row['id_user'];
    $_SESSION['nama_user'] = $row['nama_user'];
    $_SESSION['level_user'] = $row['level_user'];

    if (isset($_SESSION["proses_mitra"])) {
        unset($_SESSION["proses_mitra"]);
        header("location: " . BASE_URL . "index.php?page=data_mitra");
    } else {
        header("location: " . BASE_URL . "index.php?page=my_profile&module=mitra&action=list");
    }
}
