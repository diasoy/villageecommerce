<?php
if ($level == "admin") {
    $mitra_id = isset($_GET['id_mitra']) ? $_GET['id_mitra'] : "";

    $button = "Update";
    $queryMitra = mysqli_query($koneksi, "SELECT * FROM mitra WHERE id_mitra='$mitra_id'");

    $row = mysqli_fetch_array($queryMitra);

    $gambar = $row["gambar_mitra"];
    $nama = $row["nama_mitra"];
    $kategori = $row["kategori_mitra"];
    $deskripsi = $row["deskripsi_mitra"];
    $rincian = $row["rincian_harga"];
    $phone = $row["phone_mitra"];
    $status = $row["status_mitra"];
?>

    <form action="<?php echo BASE_URL . "module/mitra/action.php?id_mitra=$mitra_id" ?>" method="POST">

        <div class="element-form">
            <label>Gambar</label>
            <span><input type="file" name="gambar_mitra" value="<?php echo $gambar; ?>" /></span>
        </div>
        <div class="element-form">
            <label>Nama Lengkap</label>
            <span><input type="text" name="nama_mitra" value="<?php echo $nama; ?>" /></span>
        </div>

        <div class="element-form">
            <label>Kategori</label>
            <span><input type="text" name="kategori_mitra" value="<?php echo $kategori; ?>" /></span>
        </div>

        <div class="element-form">
            <label>Rincian</label>
            <span><input type="text" name="rincian_harga" value="<?php echo $rincian; ?>" /></span>
        </div>

        <div class="element-form">
            <label>Phone</label>
            <span><input type="text" name="phone_mitra" value="<?php echo $phone; ?>" /></span>
        </div>

        <div class="element-form">
            <label>Deskripsi</label>
            <span><input type="text" name="deskripsi_mitra" value="<?php echo $deskripsi; ?>" /></span>
        </div>
        <div class="element-form">
            <label>Status</label>
            <span>
                <input type="radio" value="on" name="status_mitra" <?php if ($status == "on") {
                                                                        echo "checked";
                                                                    } ?> /> on
                <input type="radio" value="off" name="status_mitra" <?php if ($status == "off") {
                                                                        echo "checked";
                                                                    } ?> /> off
            </span>
        </div>

        <div class="element-form">
            <span><input type="submit" name="button" value="<?php echo $button; ?>" class="submit-my-profile" /></span>
        </div>
    </form>
<?php
} else {
?>
    <h1>Tambah Mitra Baru</h1>
    <form action="<?php echo BASE_URL . "module/mitra/action.php" ?>" method="POST">

        <div class="element-form">
            <label>Gambar</label>
            <span><input type="file" name="gambar_mitra" /></span>
        </div>
        <div class="element-form">
            <label>Nama Lengkap</label>
            <span><input type="text" name="nama_mitra" /></span>
        </div>

        <div class="element-form">
            <label>Kategori</label>
            <span><input type="text" name="kategori_mitra" /></span>
        </div>

        <div class="element-form">
            <label>Rincian</label>
            <span><input type="text" name="rincian_harga" /></span>
        </div>

        <div class="element-form">
            <label>Phone</label>
            <span><input type="text" name="phone_mitra" /></span>
        </div>

        <div class="element-form">
            <label>Deskripsi</label>
            <span><input type="text" name="deskripsi_mitra" /></span>
        </div>
        <div class="element-form">
            <label>Status</label>
            <span>
                <input type="radio" value="on" name="status_mitra" /> on
                <input type="radio" value="off" name="status_mitra" /> off
            </span>
        </div>

        <div class="element-form">
            <span><input type="submit" name="button" value="Add" class="submit-my-profile" /></span>
        </div>
    <?php
}
    ?>