<form action="<?php echo BASE_URL . "module/article/tambah.php" ?>" method="POST">
    <label>Gambar Article</label>
    <span><input type="text" name="gambar_article" /></span>
    </div>

    <div class="element-form">
        <label>Judul Article</label>
        <span><input type="text" name="judul_article" /></span>
    </div>

    <div class="element-form">
        <label>Kategori Article</label>
        <span><input type="text" name="kategori_article" /></span>
    </div>

    <div class="element-form">
        <label>Deskripsi Article</label>
        <span><input type="text" name="deskripsi_article" /></span>
    </div>

    <div class="element-form">
        <label>Author Article</label>
        <span><input type="text" name="author_article" /></span>
    </div>
    <div class="element-form">
        <label>Status Article</label>
        <span>
            <input type="radio" value="on" name="status_article" /> on
            <input type="radio" value="off" name="status_article" /> off
        </span>
    </div>

    <div class="element-form">
        <span><input type="submit" name="button" value="Tambah" class="submit-my-profile" /></span>
    </div>
</form>