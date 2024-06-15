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

?>
<div class="py-32 2xl:mx-96 xl:mx-72 mx-8 md:mx-20 lg:mx-52">
    <div class="bg-white border px-10 py-8 rounded-xl shadow flex flex-col justify-center items-center">
        <div>
            <h1 class="font-bold 2xl:text-5xl lg:text-3xl text-2xl mb-5 text-indigo-800"><?= $namaMitra ?></h1>
        </div>
        <div class="w-full overflow-hidden rounded-xl mb-5">
            <img src="<?= IMAGE_MITRA .  $gambarMitra ?>" class="w-full h-96 object-cover">
        </div>
        <div class="flex flex-col my-4 text-center lg:text-left">
            <h2 class="font-semibold text-xl text-indigo-700 mb-2"><?= $kategoriMitra ?></h2>
            <p class="text-justify text-gray-700 mb-4"><?= $deskripsiMitra ?></p>
            <p class="mt-5 font-semibold text-lg">Rincian Harga: <span class="font-normal text-indigo-700"><?= $rincianHarga ?></span></p>
            <div class="mt-5">
                <a href="https://wa.me/<?= $phoneMitra ?>" target="_blank" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300 inline-block">Hubungi via Whatsapp</a>
            </div>
        </div>
    </div>
</div>
