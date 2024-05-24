<?php
include_once("function/database.php");
include_once('function/helper.php');

if (isset($_GET['id_article']) && is_numeric($_GET['id_article'])) {
    $id_article = $_GET['id_article'];

    $stmt = $koneksi->prepare("SELECT * FROM article WHERE id_article = ?");
    $stmt->bind_param("i", $id_article);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        $update_stmt = $koneksi->prepare("UPDATE article SET kunjungan_article = kunjungan_article + 1 WHERE id_article = ?");
        $update_stmt->bind_param("i", $id_article);
        $update_stmt->execute();
        $update_stmt->close();

        header("Location: " . BASE_URL . "index.php?page=detail_article&id_article=" . $row['id_article']);
        exit;
    } else {
        echo "No article found with id: $id_article";
    }

    $stmt->close();
} else {
    echo "Invalid article ID.";
}
