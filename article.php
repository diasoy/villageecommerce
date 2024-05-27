<?php

$query = "SELECT * FROM article WHERE status_article = 'on' ORDER BY kunjungan_article DESC";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die('Query Error : ' . mysqli_errno($koneksi) . ' - ' . mysqli_error($koneksi));
}
?>

<!-- <div class="lg:px-36 xl:px-56 px-6 md:px-28 py-20 bg-gradient-to-tr from-indigo-900 via-indigo-600 to-indigo-900">
    <h1 class="font-bold text-3xl text-white my-5">Daftar Article Teratas</h1>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
        <?php if (mysqli_num_rows($result) > 0) : ?>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <div class="bg-white rounded-lg shadow hover:shadow-lg hover:duration-500">
                    <a href="<?= BASE_URL . "index.php?page=kunjungan_article&id_article=" . $row['id_article']; ?>">
                        <img src="<?= IMAGE_ARTICLES . $row["gambar_article"]; ?>" alt="<?= $row['gambar_article']; ?>" class="w-full h-72 object-cover rounded-t-lg">
                        <div class="flex flex-col justify-between text-xs md:text-base py-5 mx-4">
                            <h1 class="font-bold "><?= $row['judul_article']; ?></h1>
                            <p class=""><?= $row['kategori_article']; ?></p>
                            <p class="mt-4">Last updated : <?= $row['tanggal_article']; ?></p>
                            <p class="mt-4">Dilihat <?= $row['kunjungan_article'] ?> kali</p>

                        </div>
                    </a>
                </div>
            <?php endwhile; ?>
        <?php else : ?>
            <p>No articles found.</p>
        <?php endif; ?>
    </div>
</div> -->

<div class="lg:px-72 xl:px-96 px-6 md:px-28 py-20 bg-gradient-to-tr from-indigo-900 via-indigo-600 to-indigo-900 text-white">
    <h1 class="font-bold text-3xl ">Article Teratas</h1>
    <div class="flex">
        <h5 class="font-semibold text-xl">Wawasan Bisnis</h5>
        <p>Perluas wawasan dengan ragam pengetahuan bisnis untuk bersiap naik kelas. Temukan tren pasar terkini, tips manajemen bisnis, cerita inspiratif, dan berbagai istilah bisnis pada kategori ini.</p>
    </div>
    <div>
        <div>
            <a href="">Semua Artikel</a>
            <a href="">Tips Bisnis</a>
            <a href="">Kebijakan</a>
            <a href="">Cerita Inspirasi</a>
            <a href="">Bedah Kasus</a>
        </div>
    </div>
    <div>

    </div>
</div>