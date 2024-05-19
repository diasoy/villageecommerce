<?php

$id_article = $_GET['id_article'];
$queryArticle = mysqli_query($koneksi, "SELECT * FROM article WHERE id_article='$id_article'");
$row = mysqli_fetch_array($queryArticle);

$gambarArticle = $row["gambar_article"];
$judulArticle = $row["judul_article"];
$kategoriArticle = $row["kategori_article"];
$deskripsiArticle = $row["deskripsi_article"];
$authorArticle = $row["author_article"];
$statusArticle = $row["status_article"];


?>

<form action="<?php echo BASE_URL . "module/article/edit.php?id_article=$id_article" ?>" method="POST">
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
        <span><input type="submit" name="button" value="Update" class="submit-my-profile" /></span>
    </div>
</form>