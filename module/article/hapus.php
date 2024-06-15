<?php

$id_article = $_GET['id_article'];

// Hapus terlebih dahulu semua entri terkait di tabel kunjungan_article
mysqli_query($koneksi, "DELETE FROM kunjungan_article WHERE id_article='$id_article'");

// Setelah itu baru hapus artikel dari tabel article
mysqli_query($koneksi, "DELETE FROM article WHERE id_article='$id_article'");

header("location: " . BASE_URL . "index.php?page=my_profile&module=article&action=list");
