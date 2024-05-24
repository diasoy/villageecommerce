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

<form action="<?php echo BASE_URL . "module/article/edit.php?id_article=$id_article" ?>" method="POST" class="mx-20 space-y-4" enctype="multipart/form-data">
    <div class="flex flex-col">
        <label class="font-bold mb-1">Gambar Article</label>
        <img src="<?= IMAGE_ARTICLES .  $gambarArticle ?>" class="w-20 h-20 object-cover rounded" />
        <input type="file" name="gambar_article" value="<?= $gambarArticle ?>" class="border-2 border-gray-200 p-2 rounded" />
    </div>

    <div class="flex flex-col">
        <label class="font-bold mb-1">Judul Article</label>
        <input type="text" name="judul_article" value="<?php echo $judulArticle; ?>" class="border-2 border-gray-200 p-2 rounded" />
    </div>

    <div class="flex flex-col">
        <label class="font-bold mb-1">Kategori Article</label>
        <input type="text" name="kategori_article" value="<?php echo $kategoriArticle; ?>" class="border-2 border-gray-200 p-2 rounded" />
    </div>

    <div class="flex flex-col">
        <label class="font-bold mb-1">Deskripsi Article</label>
        <input type="text" name="deskripsi_article" value="<?php echo $deskripsiArticle; ?>" class="border-2 border-gray-200 p-2 rounded" />
    </div>

    <div class="flex flex-col">
        <label class="font-bold mb-1">Author Article</label>
        <input type="text" name="author_article" value="<?php echo $authorArticle; ?>" class="border-2 border-gray-200 p-2 rounded" />
    </div>

    <div class="flex flex-col">
        <label class="font-bold mb-1">Status Article</label>
        <div class="flex items-center space-x-2">
            <label><input type="radio" value="on" name="status_article" <?php if ($statusArticle == "on") {
                                                                            echo "checked";
                                                                        } ?> class="mr-1" /> on</label>
            <label><input type="radio" value="off" name="status_article" <?php if ($statusArticle == "off") {
                                                                                echo "checked";
                                                                            } ?> class="mr-1" /> off</label>
        </div>
    </div>

    <div class="flex justify-end">
        <input type="submit" name="button" value="Update" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" />
    </div>
</form>