<?php
include_once("../../function/database.php");
include_once("../../function/helper.php");

$id_article = $_GET['id_article'];

mysqli_query($koneksi, "DELETE FROM article WHERE id_article='$id_article'");
header("location: " . BASE_URL . "index.php?page=my_profile&module=article&action=list");