<?php

include_once("function/database.php");
include_once('function/helper.php');

$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';

$query = "SELECT * FROM article WHERE status_article = 'on' AND judul_article LIKE '%$keyword%' ORDER BY kunjungan_article DESC";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die('Query Error : ' . mysqli_errno($koneksi) . ' - ' . mysqli_error($koneksi));
}

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="bg-white rounded-lg shadow hover:shadow-lg hover:duration-500 duration-500 overflow-hidden flex flex-col md:flex-row">';
        echo '<div class="overflow-hidden md:w-1/3">';
        echo '<img src="' . IMAGE_ARTICLES . $row['gambar_article'] . '" alt="' . $row['judul_article'] . '" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">';
        echo '</div>';
        echo '<div class="p-4 flex-1">';
        echo '<h3 class="font-bold text-lg text-indigo-600">' . $row['judul_article'] . '</h3>';
        echo '<p class="text-gray-700 mt-2">' . substr($row['deskripsi_article'], 0, 200) . '...</p>';
        echo '<a href="' . BASE_URL . 'index.php?page=detail_article&id_article=' . $row['id_article'] . '" class="text-indigo-600 mt-4 inline-block">Baca Selengkapnya...</a>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<h1 class="text-center text-indigo-700 font-bold text-xl py-52">Tidak ada artikel yang ditemukan</h1>';
}
