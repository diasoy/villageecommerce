<?php
include_once('function/database.php');

$id_guest = $_SESSION['id_guest'];
$id_article = $_GET['id_article'];

$query = "SELECT kategori_article FROM article WHERE id_article = '$id_article'";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die('Query Error: ' . mysqli_errno($koneksi) . ' - ' . mysqli_error($koneksi));
}

$row = mysqli_fetch_assoc($result);
$kategoriArticle = $row['kategori_article'];

$query = "INSERT INTO kunjungan_article (id_guest, id_article, kategori_article, click) 
          VALUES ('$id_guest', '$id_article', '$kategoriArticle', 1) 
          ON DUPLICATE KEY UPDATE click = click + 1";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die('Query Error: ' . mysqli_errno($koneksi) . ' - ' . mysqli_error($koneksi));
}

header("Location: " . BASE_URL . "index.php?page=detail_article&id_article=" . $id_article);
exit();
