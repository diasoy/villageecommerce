<?php
include("../../function/database.php");
include("../../function/helper.php");

$id_article = $_GET['id_article'];

$gambarArticle = $_POST["gambar_article"];
$judulArticle = $_POST['judul_article'];
$kategoriArticle = $_POST["kategori_article"];
$deskripsiArticle = $_POST["deskripsi_article"];
$authorArticle = $_POST["author_article"];
$statusArticle = $_POST["status_article"];


mysqli_query($koneksi, "UPDATE article SET gambar_article='$gambarArticle', judul_article='$judulArticle', kategori_article='$kategoriArticle', deskripsi_article='$deskripsiArticle', author_article='$authorArticle', status_article='$statusArticle' WHERE id_article='$id_article'");



header("location: " . BASE_URL . "index.php?page=my_profile&module=article&action=list");
