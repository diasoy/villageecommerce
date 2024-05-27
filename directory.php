<?php

include_once("function/database.php");
include_once('function/helper.php');

$query = "SELECT * FROM mitra WHERE status_mitra = 'on' ORDER BY kunjungan_mitra DESC";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die('Query Error : ' . mysqli_errno($koneksi) . ' - ' . mysqli_error($koneksi));
}



?>

<div class="lg:px-36 xl:px-56 px-6 md:px-28 py-20">
    <h1 class="font-bold text-3xl my-5 text-indigo-800">Daftar Mitra Teratas</h1>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 ">
        <?php if (mysqli_num_rows($result) > 0) : ?>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <div class="bg-white rounded-lg shadow hover:shadow-lg duration-500 hover:duration-500">
                    <a href="<?= BASE_URL . "index.php?page=kunjungan_mitra&id_mitra=" . $row['id_mitra']; ?>">
                        <img src="<?= IMAGE_MITRA . $row["gambar_mitra"]; ?>" alt="<?= $row['gambar_mitra']; ?>" class="w-full h-60 object-cover rounded-t-lg">
                        <div class="flex flex-col py-5 mx-4">
                            <h1 class="text-lg font-bold"><?= $row['nama_mitra']; ?></h1>
                            <p class="text-gray-500"><?= $row['kategori_mitra']; ?></p>
                            <p class="text-gray-500">Rincian Harga : <?= $row['rincian_harga']; ?></p>
                            <p class="text-gray-400 mt-4 text-xs">Dilihat <?= $row['kunjungan_mitra'] ?> kali</p>
                        </div>
                    </a>
                </div>
            <?php endwhile; ?>
        <?php else : ?>
            <p>No mitras found.</p>
        <?php endif; ?>
    </div>
</div>