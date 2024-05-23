<?php

include_once("function/database.php");
include_once('function/helper.php');

$query = "SELECT * FROM article WHERE status_article = 'on' ORDER BY kunjungan_article DESC";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die('Query Error : ' . mysqli_errno($koneksi) . ' - ' . mysqli_error($koneksi));
}



?>

<div class="mx-20 py-20">
    <h1 class="font-bold text-3xl my-5">Daftar Article Teratas</h1>
    <div class="grid grid-cols-4 gap-4">
        <?php if (mysqli_num_rows($result) > 0) : ?>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <div class="border rounded-lg shadow hover:shadow-lg hover:duration-500">
                    <a href="<?= BASE_URL . "index.php?page=kunjungan_article&id_article=" . $row['id_article']; ?>">
                        <img src="<?= IMAGE_ARTICLES . $row["gambar_article"]; ?>" alt="<?= $row['gambar_article']; ?>" class="w-full h-60 object-cover rounded-t-lg">
                        <div class="flex flex-col py-5 mx-4">
                            <h1 class="text-lg font-bold"><?= $row['judul_article']; ?></h1>
                            <p class="text-gray-500"><?= $row['kategori_article']; ?></p>
                            <p class="text-gray-500">Last updated : <?= $row['tanggal_article']; ?></p>
                            <p class="text-gray-400 mt-4">Dilihat <?= $row['kunjungan_article'] ?> kali</p>
                        </div>
                    </a>
                </div>
            <?php endwhile; ?>
        <?php else : ?>
            <p>No articles found.</p>
        <?php endif; ?>
    </div>
</div>