<?php

include_once("function/helper.php");

session_start();

$id_mitra = $_GET['id_mitra'];
$keranjang = $_SESSION['keranjang'];

unset($keranjang[$id_mitra]);

$_SESSION['keranjang'] = $keranjang;

header("location:" . BASE_URL . "index.php?page=keranjang");
