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
<div class="flex flex-col">
    <label class="font-bold mb-1">Gambar Mitra</label>
    <input type="text" name="gambar_mitra" value="<?php echo $gambarMitra; ?>" class="border-2 border-gray-200 p-2 rounded" />
</div>

<div class="flex flex-col">
    <label class="font-bold mb-1">Judul Mitra</label>
    <input type="text" name="nama_mitra" value="<?php echo $namaMitra; ?>" class="border-2 border-gray-200 p-2 rounded" />
</div>

<div class="flex flex-col">
    <label class="font-bold mb-1">Kategori Mitra</label>
    <input type="text" name="kategori_mitra" value="<?php echo $kategoriMitra; ?>" class="border-2 border-gray-200 p-2 rounded" />
</div>

<div class="flex flex-col">
    <label class="font-bold mb-1">Deskripsi Mitra</label>
    <input type="text" name="deskripsi_mitra" value="<?php echo $deskripsiMitra; ?>" class="border-2 border-gray-200 p-2 rounded" />
</div>

<div class="flex flex-col">
    <label class="font-bold mb-1">Rincian Harga</label>
    <input type="text" name="rincian_harga" value="<?php echo $rincianHarga; ?>" class="border-2 border-gray-200 p-2 rounded" />
</div>

<div class="flex flex-col">
    <label class="font-bold mb-1">Phone Mitra</label>
    <input type="text" name="phone_mitra" value="<?php echo $phoneMitra; ?>" class="border-2 border-gray-200 p-2 rounded" />
</div>

<div class="flex justify-end">
    <input type="submit" name="button" value="Update" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" />
</div>