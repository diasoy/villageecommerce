<?php

include("../../function/database.php");
include("../../function/helper.php");

$judulArticle = $_POST['judul_article'];
$kategoriArticle = $_POST["kategori_article"];
$deskripsiArticle = $_POST["deskripsi_article"];
$authorArticle = $_POST["author_article"];
$statusArticle = $_POST["status_article"];

if (isset($_FILES['gambar_article']) && $_FILES['gambar_article']['error'] === 0) {
    $gambarArticle = uploadImageArticle($_FILES['gambar_article']);
    if (!$gambarArticle) {
        echo "Failed to upload image";
        exit;
    }
} else {
    echo '<script>
            alert("Pilih gambar terlebih dahulu");
          </script>';
    exit;
}

mysqli_query($koneksi, "INSERT INTO article (judul_article, kategori_article, deskripsi_article, tanggal_article, author_article, gambar_article, status_article, kunjugan_article) VALUES ('$judulArticle', '$kategoriArticle', '$deskripsiArticle', NOW(), '$authorArticle', '$gambarArticle', '$statusArticle', '1')");

header("location: " . BASE_URL . "index.php?page=my_profile&module=article&action=list");
