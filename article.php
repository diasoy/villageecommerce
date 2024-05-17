<?php
include_once("function/database.php");

$query = "SELECT * FROM article";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die('Query Error : ' . mysqli_errno($koneksi) . ' - ' . mysqli_error($koneksi));
}
?>

<div class="py-40 mx-40">
    <?php if (mysqli_num_rows($result) > 0) : ?>
        <?php foreach ($result as $row) : ?>
            <div class="bg-green-500 p-5 mx-40 rounded-lg shadow-lg py-40">
                <h1 class="text-2xl font-bold"><?= $row['judul_article']; ?></h1>
                <p class="text-gray-500"><?= $row['kategori_article']; ?></p>
                <p class="text-gray-500"><?= $row['deskripsi_article']; ?></p>
                <p class="text-gray-500">Last updated : <?= $row['tanggal_article']; ?></p>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>No articles found.</p>
    <?php endif; ?>
</div>