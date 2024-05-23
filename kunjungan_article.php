<?php
include("../../function/database.php");
include("../../function/helper.php");

$id_article = $_GET['id_article'];

// Get the article data first
$query = mysqli_query($koneksi, "SELECT * FROM article WHERE id_article = '$id_article'");
$row = mysqli_fetch_assoc($query);

if ($row) {
    // Increase the visit count
    mysqli_query($koneksi, "UPDATE article SET kunjungan_article = kunjungan_article + 1 WHERE id_article = '$id_article'");

    // Redirect to the article detail page
    header("location: " . BASE_URL . "index.php?page=detail_article&id_article=" . $row['id_article']);
} else {
    echo "No article found with id: $id_article";
}
