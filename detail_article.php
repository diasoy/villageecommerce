<?php

$id_article = $_GET['id_article'];
$queryArticle = mysqli_query($koneksi, "SELECT * FROM article WHERE id_article='$id_article'");
$row = mysqli_fetch_array($queryArticle);

$gambarArticle = $row["gambar_article"];
$judulArticle = $row["judul_article"];
$kategoriArticle = $row["kategori_article"];
$deskripsiArticle = $row["deskripsi_article"];
$tanggalArticle = $row["tanggal_article"];
$authorArticle = $row["author_article"];
$statusArticle = $row["status_article"];

?>

<div class="w-full py-32 px-8 md:px-20 lg:px-40 flex flex-col justify-center items-center bg-gray-100">
    <div class="w-full max-w-4xl bg-white py-20 px-8 rounded-lg shadow-lg">
        <h1 class="font-bold text-3xl md:text-4xl lg:text-5xl text-indigo-800 mb-6 text-center"><?= $judulArticle ?></h1>
        <div class="w-full overflow-hidden rounded-lg mb-6">
            <img src="<?= IMAGE_ARTICLES . $gambarArticle ?>" class="w-full h-64 md:h-96 object-cover">
        </div>
        <div class="flex flex-col items-center md:items-start">
            <p class="text-sm text-gray-500 mb-2">Author: <span class="text-indigo-700"><?= $authorArticle ?></span></p>
            <p class="text-sm text-gray-500 mb-4">Category: <span class="text-indigo-700"><?= $kategoriArticle ?></span></p>
            <p class="text-justify text-gray-800 leading-relaxed mb-6"><?= $deskripsiArticle ?></p>
            <p class="text-sm text-gray-500 mt-4">Last updated: <?= $tanggalArticle ?></p>
        </div>
    </div>
</div>
