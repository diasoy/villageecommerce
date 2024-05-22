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

<div class="w-full p-20 flex flex-col justify-center items-center border rounded-lg shadow">
    <div>
        <h1 class="font-bold pb-20 text-5xl"><?= $judulArticle ?></h1>
    </div>
    <div>
        <img src="<?= IMAGE_ARTICLES .  $gambarArticle ?>" class="rounded-3xl">
    </div>
    <div class="flex flex-col my-4">
        <p class="opacity-40">Author : <?= $authorArticle ?></p>
        <p class="font-semibold my-10"><?= $kategoriArticle ?></p>
        <p class="text-justify"><?= $deskripsiArticle ?></p>
        <p class="mt-5">Last updated : <?= $tanggalArticle ?></p>
    </div>
</div>