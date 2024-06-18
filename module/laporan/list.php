<?php

$userLevel = $_SESSION['level_user']; // 'admin' or 'customer'

$articleLabels = [];
$articleValues = [];
$mitraLabels = [];
$mitraValues = [];
$kategoriArticleData = [];
$kategoriMitraData = [];

$currentMonth = date('m');
$currentYear = date('Y');

if ($userLevel == 'admin') {
    $queryArticle = "SELECT article.judul_article as judul_article, article.kategori_article, SUM(kunjungan_article.click) as total 
                    FROM kunjungan_article 
                    INNER JOIN article ON kunjungan_article.id_article = article.id_article 
                    WHERE MONTH(kunjungan_article.tanggal_kunjungan) = '$currentMonth' AND YEAR(kunjungan_article.tanggal_kunjungan) = '$currentYear'
                    GROUP BY article.id_article";
    $resultArticle = mysqli_query($koneksi, $queryArticle);

    if (!$resultArticle) {
        die('Query Error: ' . mysqli_errno($koneksi) . ' - ' . mysqli_error($koneksi));
    }

    while ($row = mysqli_fetch_assoc($resultArticle)) {
        $articleLabels[] = $row['judul_article'];
        $articleValues[] = $row['total'];
        if (isset($kategoriArticleData[$row['kategori_article']])) {
            $kategoriArticleData[$row['kategori_article']] += $row['total'];
        } else {
            $kategoriArticleData[$row['kategori_article']] = $row['total'];
        }
    }
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

while ($row = mysqli_fetch_assoc($resultMitra)) {
    $mitraLabels[] = $row['nama_mitra'];
    $mitraValues[] = $row['total'];
    if (isset($kategoriMitraData[$row['kategori_mitra']])) {
        $kategoriMitraData[$row['kategori_mitra']] += $row['total'];
    } else {
        $kategoriMitraData[$row['kategori_mitra']] = $row['total'];
    }
}

$kategoriArticleLabels = array_keys($kategoriArticleData);
$kategoriArticleValues = array_values($kategoriArticleData);
$kategoriMitraLabels = array_keys($kategoriMitraData);
$kategoriMitraValues = array_values($kategoriMitraData);

array_multisort($articleValues, SORT_DESC, $articleLabels);
array_multisort($mitraValues, SORT_DESC, $mitraLabels);
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="flex flex-col justify-center w-full mx-auto gap-10 py-10 max-w-5xl">
    <h1 class="text-4xl font-bold text-center mb-5 print:text-4xl">Data Kunjungan</h1>
    <h1 class="text-2xl font-bold text-center mb-5 print:text-2xl">Periode bulan: <span class="text-blue-500"><?= date('F Y') ?></span></h1>

    <?php if ($userLevel == 'admin') : ?>
        <div class="bg-white print:p-0 shadow-md rounded-lg p-5">
            <h1 class="font-bold text-3xl text-center py-5 text-indigo-800">Article</h1>
            <div class="grid grid-cols-2 gap-10">
                <div class="w-full">
                    <canvas id="articleChart"></canvas>
                </div>
                <div class="w-full">
                    <canvas id="kategoriArticleChart"></canvas>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="bg-white print:p-0 shadow-md rounded-lg p-5 mt-10">
        <h1 class="font-bold text-3xl text-center py-5 text-indigo-800">Mitra</h1>
        <div class="grid grid-cols-2 gap-10">
            <div class="w-full">
                <canvas id="mitraChart"></canvas>
            </div>
            <div class="w-full">
                <canvas id="kategoriMitraChart"></canvas>
            </div>
        </div>
    </div>

    <button class="bg-indigo-700 hover:bg-indigo-800 print:hidden py-2 rounded-lg text-white font-semibold" id="downloadPrintButton">Download / Print Laporan</button>

</div>

<script>
    //print
    document.getElementById('downloadPrintButton').addEventListener('click', function() {
        window.print();
    });

    // Chart
    document.addEventListener('DOMContentLoaded', (event) => {
        <?php if ($userLevel == 'admin') : ?>
            var articleLabels = <?php echo json_encode($articleLabels); ?>;
            var articleValues = <?php echo json_encode($articleValues); ?>;
        <?php endif; ?>
        var mitraLabels = <?php echo json_encode($mitraLabels); ?>;
        var mitraValues = <?php echo json_encode($mitraValues); ?>;
        var kategoriArticleLabels = <?php echo json_encode($kategoriArticleLabels); ?>;
        var kategoriArticleValues = <?php echo json_encode($kategoriArticleValues); ?>;
        var kategoriMitraLabels = <?php echo json_encode($kategoriMitraLabels); ?>;
        var kategoriMitraValues = <?php echo json_encode($kategoriMitraValues); ?>;

        <?php if ($userLevel == 'admin') : ?>
            // Article chart
            var ctxArticle = document.getElementById('articleChart').getContext('2d');
            var myChartArticle = new Chart(ctxArticle, {
                type: 'bar',
                data: {
                    labels: articleLabels,
                    datasets: [{
                        label: 'Total Kunjungan per Article',
                        data: articleValues,
                        backgroundColor: 'rgba(75, 192, 192, 0.7)',
                        borderWidth: 0, // remove border
                        borderRadius: 10 // add border radius
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Total Kunjungan per Article'
                        },
                        legend: {
                            position: 'bottom'
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false,
                            }
                        },
                        y: {
                            grid: {
                                display: false,
                            }
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
                        label: 'Total Kunjungan per Article Category',
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
                    maintainAspectRatio: false,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Total Kunjungan per Article Category'
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        <?php endif; ?>

        // Mitra chart
        var ctxMitra = document.getElementById('mitraChart').getContext('2d');
        var myChartMitra = new Chart(ctxMitra, {
            type: 'bar',
            data: {
                labels: mitraLabels,
                datasets: [{
                    label: 'Total Kunjungan per Mitra',
                    data: mitraValues,
                    backgroundColor: 'rgba(153, 102, 255, 0.7)',
                    borderWidth: 0,
                    borderRadius: 10
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    title: {
                        display: true,
                        text: 'Total Kunjungan per Mitra'
                    },
                    legend: {
                        position: 'bottom'
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false,
                        }
                    },
                    y: {
                        grid: {
                            display: false,
                        }
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
                    label: 'Total Kunjungan per Mitra Category',
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
                maintainAspectRatio: false,
                plugins: {
                    title: {
                        display: true,
                        text: 'Total Kunjungan per Mitra Category'
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

    });
</script>