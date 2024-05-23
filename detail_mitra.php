<?php

$id_mitra = $_GET['id_mitra'];
$queryMitra = mysqli_query($koneksi, "SELECT * FROM mitra WHERE id_mitra='$id_mitra'");
$row = mysqli_fetch_array($queryMitra);

$gambarMitra = $row["gambar_mitra"];
$namaMitra = $row["judul_mitra"];
$kategoriMitra = $row["kategori_mitra"];
$deskripsiMitra = $row["deskripsi_mitra"];
$rincianHarga = $row["rincian_harga"];
$phoneMitra = $row["phone_mitra"];
$kunjunganMitra = $row["kunjungan_mitra"];

?>

<div class="w-full p-20 flex flex-col justify-center items-center">
    <div>
        <h1 class="font-bold pb-20 text-5xl"><?= $namaMitra ?></h1>
    </div>
    <div>
        <img src="<?= IMAGE_MITRA .  $gambarMitra ?>" class="rounded-3xl">
    </div>
    <div class="flex flex-col my-4">
        <p class="opacity-40">Author : <?= $phoneMitra ?></p>
        <p class="font-semibold my-10"><?= $kategoriMitra ?></p>
        <p class="text-justify"><?= $deskripsiMitra ?></p>
        <p class="mt-5">Last updated : <?= $rincianHarga ?></p>
        <p class="mt-5">Last updated : <?= $kunjunganMitra ?></p>
    </div>
</div>