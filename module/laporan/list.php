<?php

if ($level == 'admin') {
    $queryMitra = mysqli_query($koneksi, "SELECT nama_mitra, kunjungan_mitra FROM mitra");
} else if ($level == 'customer') {
    $id_user_sanitized = mysqli_real_escape_string($koneksi, $id_user);
    $queryMitra = mysqli_query($koneksi, "SELECT nama_mitra, kunjungan_mitra FROM mitra WHERE id_user = '$id_user_sanitized'");
}

if (!$queryMitra) {
    die('Query Mitra Failed: ' . mysqli_error($koneksi));
}

$queryArticle = mysqli_query($koneksi, "SELECT judul_article, kunjungan_article FROM article");

if (!$queryArticle) {
    die('Query Article Failed: ' . mysqli_error($koneksi));
}

$mitraData = [];
$articleData = [];

while ($row = mysqli_fetch_assoc($queryMitra)) {
    $mitraData[] = $row;
}

while ($row = mysqli_fetch_assoc($queryArticle)) {
    $articleData[] = $row;
}

$mitraLabels = array_column($mitraData, 'nama_mitra');
$mitraValues = array_column($mitraData, 'kunjungan_mitra');

$articleLabels = array_column($articleData, 'judul_article');
$articleValues = array_column($articleData, 'kunjungan_article');

$dataMitra = array_combine($mitraLabels, $mitraValues);
$dataArticle = array_combine($articleLabels, $articleValues);

arsort($dataMitra);
arsort($dataArticle);

$mitraLabels = array_keys($dataMitra);
$mitraValues = array_values($dataMitra);

$articleLabels = array_keys($dataArticle);
$articleValues = array_values($dataArticle);
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="flex flex-col gap-20 w-full mx-52 my-10">
    <canvas id="mitraChart"></canvas>
    <?php if ($level == 'admin') : ?>
        <canvas id="articleChart"></canvas>
    <?php endif; ?>
</div>


<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        var ctxMitra = document.getElementById('mitraChart').getContext('2d');
        var myChartMitra = new Chart(ctxMitra, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($mitraLabels); ?>,
                datasets: [{
                    label: 'Kunjungan Mitra',
                    data: <?php echo json_encode($mitraValues); ?>,
                    backgroundColor: 'rgba(75, 192, 192,1)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                scales: {
                    x: {
                        beginAtZero: true
                    }
                }
            }
        });

        if ('<?php echo $level; ?>' == 'admin') {
            var ctxArticle = document.getElementById('articleChart').getContext('2d');
            var myChartArticle = new Chart(ctxArticle, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($articleLabels); ?>,
                    datasets: [{
                        label: 'Kunjungan Article',
                        data: <?php echo json_encode($articleValues); ?>,
                        backgroundColor: 'rgba(153, 102, 255, 1)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y',
                    scales: {
                        x: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    });
</script>