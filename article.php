<?php
$kategori = isset($_GET['kategori']) ? $_GET['kategori'] : 'semua';

$query = "SELECT article.*, IFNULL(kunjungan_article.total_clicks, 0) as total_clicks
          FROM article
          LEFT JOIN (
              SELECT id_article, COUNT(*) as total_clicks
              FROM kunjungan_article
              GROUP BY id_article
          ) kunjungan_article ON article.id_article = kunjungan_article.id_article
          WHERE article.status_article = 'on'";

if ($kategori != 'semua') {
    $query .= " AND article.kategori_article = '$kategori'";
}

$query .= " ORDER BY total_clicks DESC";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die('Query Error: ' . mysqli_errno($koneksi) . ' - ' . mysqli_error($koneksi));
}

if (isset($_GET['id_article'])) {
    $id_article = $_GET['id_article'];
    $updateQuery = "UPDATE article SET kunjungan_article = kunjungan_article + 1 WHERE id_article = '$id_article'";
    $updateResult = mysqli_query($koneksi, $updateQuery);

    if (!$updateResult) {
        die('Update Query Error: ' . mysqli_errno($koneksi) . ' - ' . mysqli_error($koneksi));
    }

    $insertQuery = "INSERT INTO kunjungan_article (id_article, id_guest) VALUES ('$id_article', '" . $_SESSION['id_guest'] . "')";
    $insertResult = mysqli_query($koneksi, $insertQuery);

    if (!$insertResult) {
        die('Insert Query Error: ' . mysqli_errno($koneksi) . ' - ' . mysqli_error($koneksi));
    }
}
?>

<div class="lg:px-72 xl:px-96 px-6 md:px-28 py-36 text-indigo-800">
    <div>
        <h1 class="font-bold text-5xl mb-4">Selamat Datang di Village E Commerce</h1>
    </div>
    <h1 class="font-bold text-3xl mb-5">Article Teratas</h1>
    <div class="mb-8">
        <h5 class="font-semibold text-xl">Wawasan Bisnis</h5>
        <p>Perluas wawasan dengan ragam pengetahuan bisnis untuk bersiap naik kelas. Temukan tren pasar terkini, tips manajemen bisnis, cerita inspiratif, dan berbagai istilah bisnis pada kategori ini.</p>
    </div>
    <form action="" method="post" class="flex flex-col gap-4 my-10">
        <label for="article" class="font-bold text-indigo-800">Cari semua article dari semua kategori berdasarkan judul</label>
        <div class="relative">
            <input id="article" type="search" placeholder="Cari article" class="px-5 py-2 rounded-xl pl-10" autocomplete="off">
            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-indigo-400"></i>
        </div>
    </form>
    <div class="mb-8">
        <div class="flex gap-4 justify-center flex-wrap">
            <a href="<?= BASE_URL . "index.php?page=article&kategori=semua" ?>" class="px-4 py-2 rounded <?= ($kategori == 'semua') ? 'bg-white text-indigo-900' : 'bg-indigo-700 text-white' ?>">Semua Artikel</a>
            <a href="<?= BASE_URL . "index.php?page=article&kategori=tips" ?>" class="px-4 py-2 rounded <?= ($kategori == 'tips') ? 'bg-white text-indigo-900' : 'bg-indigo-700 text-white' ?>">Tips Bisnis</a>
            <a href="<?= BASE_URL . "index.php?page=article&kategori=kebijakan" ?>" class="px-4 py-2 rounded <?= ($kategori == 'kebijakan') ? 'bg-white text-indigo-900' : 'bg-indigo-700 text-white' ?>">Kebijakan</a>
            <a href="<?= BASE_URL . "index.php?page=article&kategori=inspirasi" ?>" class="px-4 py-2 rounded <?= ($kategori == 'inspirasi') ? 'bg-white text-indigo-900' : 'bg-indigo-700 text-white' ?>">Cerita Inspirasi</a>
            <a href="<?= BASE_URL . "index.php?page=article&kategori=kasus" ?>" class="px-4 py-2 rounded <?= ($kategori == 'kasus') ? 'bg-white text-indigo-900' : 'bg-indigo-700 text-white' ?>">Bedah Kasus</a>
        </div>
    </div>
    <div class="space-y-8" id="container-article">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <div class="bg-white rounded-lg shadow hover:shadow-lg hover:duration-500 duration-500 overflow-hidden flex flex-col md:flex-row">
                <div class="overflow-hidden md:w-1/3">
                    <img src="<?= IMAGE_ARTICLES . $row['gambar_article'] ?>" alt="<?= $row['judul_article'] ?>" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                </div>
                <div class="p-4 flex-1">
                    <h3 class="font-bold text-lg text-indigo-600"><?= $row['judul_article'] ?></h3>
                    <p class="text-gray-700 mt-2"><?= substr($row['deskripsi_article'], 0, 200) ?>...</p>
                    <a href="<?= BASE_URL . "index.php?page=kunjungan_article&id_article=" . $row['id_article'] ?>" class="text-indigo-600 mt-4 inline-block">Baca Selengkapnya...</a>
                    <p>Dilihat sebanyak: <?= $row['total_clicks'] ?></p>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#article').on('keyup', function() {
            var keyword = $(this).val();
            $.ajax({
                url: 'search_article.php',
                type: 'post',
                data: {
                    keyword: keyword
                },
                success: function(result) {
                    $('#container-article').html(result);
                }
            });
        });
    });
</script>
