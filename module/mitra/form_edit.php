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
<form action="<?php echo BASE_URL . "module/Mitra/edit.php?id_mitra=$id_mitra" ?>" method="POST">
    <label>Gambar Mitra</label>
    <span><input type="text" name="gambar_mitra" value="<?php echo $gambarMitra; ?>" /></span>
    </div>

    <div class="element-form">
        <label>Judul Mitra</label>
        <span><input type="text" name="nama_mitra" value="<?php echo $namaMitra; ?>" /></span>
    </div>

    <div class="element-form">
        <label>Kategori Mitra</label>
        <span><input type="text" name="kategori_mitra" value="<?php echo $kategoriMitra; ?>" /></span>
    </div>

    <div class="element-form">
        <label>Deskripsi Mitra</label>
        <span><input type="text" name="deskripsi_mitra" value="<?php echo $deskripsiMitra; ?>" /></span>
    </div>

    <div class="element-form">
        <label>Rincian Harga</label>
        <span><input type="text" name="rincian_harga" value="<?php echo $rincianHarga; ?>" /></span>
    </div>

    <div class="element-form">
        <label>Phone Mitra</label>
        <span><input type="text" name="phone_mitra" value="<?php echo $phoneMitra; ?>" /></span>
    </div>

    <div class="element-form">
        <span><input type="submit" name="button" value="Update" class="submit-my-profile" /></span>
    </div>
</form>