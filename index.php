<?php

session_start();

include_once("function/database.php");
include_once('function/helper.php');


$page = isset($_GET['page']) ? $_GET['page'] : false;

$id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : false;
$nama = isset($_SESSION['nama_user']) ? $_SESSION['nama_user'] : false;
$level = isset($_SESSION['level_user']) ? $_SESSION['level_user'] : false;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vicom</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/output.css">
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body>
    <nav class="fixed w-full bg-white z-50">
        <div class="flex justify-around py-4">
            <div id="logo">
                <a href="<?php echo BASE_URL . "index.php?page=main"; ?>" class="title-nav">Village E Commerce</a>
            </div>
            <div class="nav-menu">
                <a href="<?php echo BASE_URL . "index.php?page=main"; ?>" class=" ">Home</a>
                <a href="<?php echo BASE_URL . "index.php?page=article"; ?>" class=" ">Article</a>
                <a href="<?php echo BASE_URL . "index.php?page=documentation"; ?>" class=" ">Documentation</a>
                <a href="<?php echo BASE_URL . "index.php?page=directory"; ?>" class=" ">Directory UMKM</a>
            </div>
            <div class="btn-user">
                <?php
                if ($id_user) {
                    echo "<div style='display: flex; gap:20px;'>
                            <p style='color: black; cursor:default;'>Selamat datang, <b>$nama</b></p>
                            <a style='text-decoration:none; color:black;' href='" . BASE_URL . "index.php?page=my_profile&module=mitra&action=list'>Kontrol</a>
                            <a style='text-decoration:none; color:black;' href='" . BASE_URL . "index.php?page=logout'>Logout</a>
                        </div>";
                } else {
                    echo "<a class='btn-login' href='" . BASE_URL . "index.php?page=login'?>Login</a>
                   <a class='btn-register' href='" . BASE_URL . "index.php?page=register'?>Register</a>";
                }
                ?>
            </div>
        </div>
    </nav>

    <div id="content">

        <?php
        $filename = "$page.php";

        if (file_exists($filename)) {
            include_once($filename);
        } else {
            include_once("main.php");
        }
        ?>

    </div>

</body>

</html>