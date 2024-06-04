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
<div class="py-32 2xl:mx-96 xl:mx-72 mx-8 md:mx-20 lg:mx-52">
    <div class="bg-white border px-10 py-8 rounded-xl shadow flex flex-col justify-center items-center">
        <div>
            <h1 class="font-bold 2xl:text-5xl lg:text-3xl text-2xl mb-5 text-indigo-800"><?= $namaMitra ?></h1>
        </div>
        <div class="">
            <img src="<?= IMAGE_MITRA .  $gambarMitra ?>" class="rounded-xl object-cover max-h-[40rem]">
        </div>
        <div class="flex flex-col my-4">
            <h2 class="font-semibold text-lg text-indigo-700"><?= $kategoriMitra ?></h2>
            <p class="text-justify"><?= $deskripsiMitra ?></p>
            <p class="mt-5">Rincian Harga : <?= $rincianHarga ?></p>
            <div>
                <a href="https://wa.me/<?= $phoneMitra ?>" class="mt-5 text-white inline">Hubungi via Whatsapp</a>
            </div>
            <p class="mt-5 opacity-30">Dilihat sebanyak <?= $kunjunganMitra ?> kali</p>
        </div>
    </div>
</div>