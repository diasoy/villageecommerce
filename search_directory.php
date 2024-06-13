<?php

include_once("function/database.php");
include_once('function/helper.php');

$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';

$query = "SELECT * FROM mitra WHERE status_mitra = 'on' AND nama_mitra LIKE '%$keyword%'";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die('Query Error : ' . mysqli_errno($koneksi) . ' - ' . mysqli_error($koneksi));
}

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="bg-white rounded-lg shadow hover:shadow-lg duration-500 hover:duration-500">';
        echo '<a href="' . BASE_URL . 'index.php?page=kunjungan_mitra&id_mitra=' . $row['id_mitra'] . '">';
        echo '<img src="' . IMAGE_MITRA . $row['gambar_mitra'] . '" alt="' . $row['nama_mitra'] . '" class="w-full h-60 object-cover rounded-t-lg">';
        echo '<div class="flex flex-col py-5 mx-4">';
        echo '<h1 class="text-lg font-bold">' . $row['nama_mitra'] . '</h1>';
        echo '<p class="text-gray-500">' . $row['kategori_mitra'] . '</p>';
        echo '<p class="text-gray-500">Rincian Harga : ' . $row['rincian_harga'] . '</p>';
        echo '</div>';
        echo '</a>';
        echo '</div>';
    }
} else {
    echo '<h1 class="flex w-full justify-center items-center text-indigo-700 font-bold text-xl py-52">Tidak ada mitra yang ditemukan</h1>';
}
