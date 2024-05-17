<?php

$id_article = isset($_GET['id_article']) ? $_GET['id_article'] : "";

$button = "Update";
$queryArticle = mysqli_query($koneksi, "SELECT * FROM article WHERE id_article='$id_article'");

$row = mysqli_fetch_array($queryArticle);

$level = $row["judul_article"];
$nama = $row["kategori_article"];
$email = $row["deskripsi_article"];
$alamat = $row["tanggal_article"];
$phone = $row["author_article"];
$status = $row["status_article"];
?>
<form action="<?php echo BASE_URL . "module/article/action.php?id_article=$id_article" ?>" method="POST">

    <div class="element-form">
        <label>Nama Lengkap</label>
        <span><input type="text" name="kategori_article" value="<?php echo $nama; ?>" /></span>
    </div>

    <div class="element-form">
        <label>Email</label>
        <span><input type="text" name="deskripsi_article" value="<?php echo $email; ?>" /></span>
    </div>

    <div class="element-form">
        <label>Phone</label>
        <span><input type="text" name="author_article" value="<?php echo $phone; ?>" /></span>
    </div>

    <div class="element-form">
        <label>Alamat</label>
        <span><input type="text" name="tanggal_article" value="<?php echo $alamat; ?>" /></span>
    </div>

    <div class="element-form">
        <label>Status</label>
        <span>
            <input type="radio" value="on" name="status_article" <?php if ($status == "on") {
                                                                        echo "checked";
                                                                    } ?> /> on
            <input type="radio" value="off" name="status_article" <?php if ($status == "off") {
                                                                        echo "checked";
                                                                    } ?> /> off
        </span>
    </div>

    <div class="element-form">
        <span><input type="submit" name="button" value="<?php echo $button; ?>" class="submit-my-profile" /></span>
    </div>
</form>