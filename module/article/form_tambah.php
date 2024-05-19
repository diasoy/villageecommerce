<?php

$id_article = isset($_GET['id_article']) ? $_GET['id_article'] : false;

$gambarArticle = "";
$judulArticle = "";
$kategoriArticle = "";
$deskripsiArticle = "";
$authorArticle = "";
$statusArticle = "";

?>

<form action="<?php echo BASE_URL . "module/article/tambah.php" ?>" method="POST">
    <label>Gambar Article</label>
    <span><input type="text" name="gambar_article" value="<?php echo $gambarArticle; ?>" /></span>
    </div>

    <div class="element-form">
        <label>Judul Article</label>
        <span><input type="text" name="judul_article" value="<?php echo $judulArticle; ?>" /></span>
    </div>

    <div class="element-form">
        <label>Kategori Article</label>
        <span><input type="text" name="kategori_article" value="<?php echo $kategoriArticle; ?>" /></span>
    </div>

    <div class="element-form">
        <label>Deskripsi Article</label>
        <span><input type="text" name="deskripsi_article" value="<?php echo $deskripsiArticle; ?>" /></span>
    </div>

    <div class="element-form">
        <label>Author Article</label>
        <span><input type="text" name="author_article" value="<?php echo $authorArticle; ?>" /></span>
    </div>
    <div class="element-form">
        <label>Status Article</label>
        <span>
            <input type="radio" value="on" name="status_article" <?php if ($statusArticle == "on") {
                                                                        echo "checked";
                                                                    } ?> /> on
            <input type="radio" value="off" name="status_article" <?php if ($statusArticle == "off") {
                                                                        echo "checked";
                                                                    } ?> /> off
        </span>
    </div>

    <div class="element-form">
        <span><input type="submit" name="button" value="Tambah" class="submit-my-profile" /></span>
    </div>
</form>