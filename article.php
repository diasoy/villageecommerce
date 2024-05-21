<?php
include_once("function/database.php");

$query = "SELECT * FROM article WHERE status_article = 'on' ORDER BY id_article DESC";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die('Query Error : ' . mysqli_errno($koneksi) . ' - ' . mysqli_error($koneksi));
}
?>

<div class="py-40 mx-40">
    <?php if (mysqli_num_rows($result) > 0) : ?>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <div class="">
                <h1 class="text-2xl font-bold"><?= $row['judul_article']; ?></h1>
                <img src="assets/images/articles/<?= $row["gambar_article"]; ?>" alt="<?= $row['gambar_article']; ?>" class="w-40 h-40 object-cover rounded-lg">
                <p class="text-gray-500"><?= $row['kategori_article']; ?></p>
                <p class="text-gray-500"><?= $row['deskripsi_article']; ?></p>
                <p class="text-gray-500">Last updated : <?= $row['tanggal_article']; ?></p>
            </div>
        <?php endwhile; ?>
    <?php else : ?>
        <p>No articles found.</p>
    <?php endif; ?>
</div>