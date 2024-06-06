<?php
if (!isset($_SESSION['id_guest'])) {
    $id_guest = uniqid();
    $_SESSION['id_guest'] = $id_guest;
} else {
    $id_guest = $_SESSION['id_guest'];
}

$articleLabels = [];
$articleValues = [];
$mitraLabels = [];
$mitraValues = [];
$kategoriArticleLabels = [];
$kategoriArticleValues = [];
$kategoriMitraLabels = [];
$kategoriMitraValues = [];

$currentMonth = date('m');
$currentYear = date('Y');

$queryArticle = "SELECT article.judul_article as judul_article, article.kategori_article, SUM(kunjungan_article.click) as total 
                FROM kunjungan_article 
                INNER JOIN article ON kunjungan_article.id_article = article.id_article 
                WHERE MONTH(kunjungan_article.tanggal_kunjungan) = '$currentMonth' AND YEAR(kunjungan_article.tanggal_kunjungan) = '$currentYear'
                GROUP BY article.id_article";
$resultArticle = mysqli_query($koneksi, $queryArticle);

if (!$resultArticle) {
    die('Query Error: ' . mysqli_errno($koneksi) . ' - ' . mysqli_error($koneksi));
}

$queryMitra = "SELECT mitra.nama_mitra as nama_mitra, mitra.kategori_mitra, SUM(kunjungan_mitra.click) as total 
              FROM kunjungan_mitra 
              INNER JOIN mitra ON kunjungan_mitra.id_mitra = mitra.id_mitra 
              WHERE MONTH(kunjungan_mitra.tanggal_kunjungan) = '$currentMonth' AND YEAR(kunjungan_mitra.tanggal_kunjungan) = '$currentYear'
              GROUP BY mitra.id_mitra";
$resultMitra = mysqli_query($koneksi, $queryMitra);

if (!$resultMitra) {
    die('Query Error: ' . mysqli_errno($koneksi) . ' - ' . mysqli_error($koneksi));
}

while ($row = mysqli_fetch_assoc($resultArticle)) {
    $articleLabels[] = $row['judul_article'];
    $articleValues[] = $row['total'];
    $kategoriArticleLabels[] = $row['kategori_article'];
    $kategoriArticleValues[] = $row['total'];
}

while ($row = mysqli_fetch_assoc($resultMitra)) {
    $mitraLabels[] = $row['nama_mitra'];
    $mitraValues[] = $row['total'];
    $kategoriMitraLabels[] = $row['kategori_mitra'];
    $kategoriMitraValues[] = $row['total'];
}

array_multisort($articleValues, SORT_DESC, $articleLabels);
array_multisort($mitraValues, SORT_DESC, $mitraLabels);


?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="flex flex-col justify-center w-full mx-96 gap-52 py-32">
    <h1 class="text-5xl font-bold text-center">Periode bulan: <span class="text-blue-500"><?= date('F Y') ?></span></h1>
    <div class="">
        <h1 class="font-bold text-4xl text-center py-10 text-indigo-800">Article</h1>
        <div class="">
            <canvas class="" id="articleChart"></canvas>
        </div>
        <div class="">
            <canvas class="" id="kategoriArticleChart"></canvas>
        </div>
    </div>
    <div class="">
        <h1 class="font-bold text-4xl text-center py-10 text-indigo-800">Mitra</h1>
        <div class="">
            <canvas class="" id="mitraChart"></canvas>
        </div>
        <div class="">
            <canvas class="" id="kategoriMitraChart"></canvas>
        </div>
    </div>

</div>
<a href="<?= BASE_URL . "module/laporan/pdf.php" ?>" class="text-indigo-700 underline font-bold py-2 px-4 rounded">Download Laporan</a>



<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        var articleLabels = <?php echo json_encode($articleLabels); ?>;
        var articleValues = <?php echo json_encode($articleValues); ?>;
        var mitraLabels = <?php echo json_encode($mitraLabels); ?>;
        var mitraValues = <?php echo json_encode($mitraValues); ?>;
        var kategoriArticleLabels = <?php echo json_encode($kategoriArticleLabels); ?>;
        var kategoriArticleValues = <?php echo json_encode($kategoriArticleValues); ?>;
        var kategoriMitraLabels = <?php echo json_encode($kategoriMitraLabels); ?>;
        var kategoriMitraValues = <?php echo json_encode($kategoriMitraValues); ?>;

        // Article chart
        var ctxArticle = document.getElementById('articleChart').getContext('2d');
        var myChartArticle = new Chart(ctxArticle, {
            type: 'bar',
            data: {
                labels: articleLabels,
                datasets: [{
                    label: 'Total Clicks per Article',
                    data: articleValues,
                    backgroundColor: 'rgba(75, 192, 192, 0.7)',
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Total Clicks per Article'
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        // Mitra chart
        var ctxMitra = document.getElementById('mitraChart').getContext('2d');
        var myChartMitra = new Chart(ctxMitra, {
            type: 'bar',
            data: {
                labels: mitraLabels,
                datasets: [{
                    label: 'Total Clicks per Mitra',
                    data: mitraValues,
                    backgroundColor: 'rgba(153, 102, 255, 0.7)',
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Total Clicks per Mitra'
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        // Kategori Article chart
        var ctxKategoriArticle = document.getElementById('kategoriArticleChart').getContext('2d');
        var myChartKategoriArticle = new Chart(ctxKategoriArticle, {
            type: 'pie',
            data: {
                labels: kategoriArticleLabels,
                datasets: [{
                    label: 'Total Clicks per Article Category',
                    data: kategoriArticleValues,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 205, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Total Clicks per Article Category'
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        // Kategori Mitra chart
        var ctxKategoriMitra = document.getElementById('kategoriMitraChart').getContext('2d');
        var myChartKategoriMitra = new Chart(ctxKategoriMitra, {
            type: 'pie',
            data: {
                labels: kategoriMitraLabels,
                datasets: [{
                    label: 'Total Clicks per Mitra Category',
                    data: kategoriMitraValues,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 205, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Total Clicks per Mitra Category'
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    });
</script>