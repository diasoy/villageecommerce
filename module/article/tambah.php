<?php

include("../../function/database.php");
include("../../function/helper.php");

$gambarArticle = $_POST["gambar_article"];
$judulArticle = $_POST['judul_article'];
$kategoriArticle = $_POST["kategori_article"];
$deskripsiArticle = $_POST["deskripsi_article"];
$authorArticle = $_POST["author_article"];
$statusArticle = $_POST["status_article"];


mysqli_query($koneksi, "INSERT INTO article (judul_article, kategori_article, deskripsi_article, tanggal_article, author_article, gambar_article, status_article) VALUES ('$judulArticle', '$kategoriArticle', '$deskripsiArticle', NOW(), '$authorArticle', '$gambarArticle', '$statusArticle')");

header("location: " . BASE_URL . "index.php?page=my_profile&module=article&action=list");
