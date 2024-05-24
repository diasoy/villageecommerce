<?php

$id_mitra = $_GET['id_mitra'];
$queryMitra = mysqli_query($koneksi, "SELECT * FROM mitra WHERE id_mitra='$id_mitra'");
$row = mysqli_fetch_array($queryMitra);

$gambarMitra = $row["gambar_mitra"];
$namaMitra = $row["nama_mitra"];
$kategoriMitra = $row["kategori_mitra"];
$deskripsiMitra = $row["deskripsi_mitra"];
$rincianHarga = $row["rincian_harga"];
$phoneMitra = $row["phone_mitra"];
$kunjunganMitra = $row["kunjungan_mitra"];

?>
<div class="py-32 mx-96">
    <div class="border px-16 py-8 rounded shadow flex flex-col justify-center items-center">
        <div>
            <h1 class="font-bold text-5xl mb-5"><?= $namaMitra ?></h1>
        </div>
        <div>
            <img src="<?= IMAGE_MITRA .  $gambarMitra ?>" class="rounded">
        </div>
        <div class="flex flex-col my-4">
            <p class="font-semibold"><?= $kategoriMitra ?></p>
            <p class="text-justify"><?= $deskripsiMitra ?></p>
            <p class="mt-5">Rincian Harga : <?= $rincianHarga ?></p>
            <p class="mt-5">Kontak : <?= $phoneMitra ?></p>
            <p class="mt-5 opacity-30">Dilihat sebanyak <?= $kunjunganMitra ?> kali</p>
        </div>
    </div>
</div>