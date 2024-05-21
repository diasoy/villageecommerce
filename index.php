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
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/output.css">
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body>
    <nav class="fixed w-full bg-white z-50 py-5 shadow">
        <div class="flex justify-around items-center">
            <div id="logo">
                <a href="<?php echo BASE_URL . "index.php?page=main"; ?>" class="font-bold text-xl">Village E Commerce</a>
            </div>
            <div class="flex gap-10">
                <a href="<?php echo BASE_URL . "index.php?page=main"; ?>" class="text-sm px-3 py-1 hover:bg-green-600 hover:duration-500 hover:text-white hover:rounded ">Home</a>
                <a href="<?php echo BASE_URL . "index.php?page=article"; ?>" class="text-sm px-3 py-1 hover:bg-green-600 hover:duration-500 hover:text-white hover:rounded ">Article</a>
                <a href="<?php echo BASE_URL . "index.php?page=documentation"; ?>" class="text-sm px-3 py-1 hover:bg-green-600 hover:duration-500 hover:text-white hover:rounded ">Documentation</a>
                <a href="<?php echo BASE_URL . "index.php?page=directory"; ?>" class="text-sm px-3 py-1 hover:bg-green-600 hover:duration-500 hover:text-white hover:rounded ">Directory UMKM</a>
            </div>
            <div class="btn-user">
                <?php
                if ($id_user) {
                    echo "<div class='flex gap-5 items-center'>
                            <p class='text-sm' style='color: black; cursor:default;'>Selamat datang, <b>$nama</b></p>
                            <a class='text-sm bg-orange-500 text-white hover:bg-orange-600 hover:duration-500 px-2 py-1 rounded' href='" . BASE_URL . "index.php?page=my_profile&module=mitra&action=list'>Kontrol</a>
                            <a class='text-sm bg-red-700 text-white px-2 py-1 rounded' href='" . BASE_URL . "index.php?page=logout'>Logout</a>
                        </div>";
                } else {
                    echo "<a class='bg-green-600 px-5 py-1 text-sm rounded text-white' href='" . BASE_URL . "index.php?page=login'?>Login</a>
                   <a class='bg-green-100 px-5 py-1 text-sm rounded' href='" . BASE_URL . "index.php?page=register'?>Register</a>";
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