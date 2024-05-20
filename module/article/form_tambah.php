<form action="<?php echo BASE_URL . "module/article/tambah.php" ?>" method="POST" class="mx-20 flex gap-5 flex-col">
    <div class="flex flex-col">
        <label class="font-bold mb-1">Gambar Article</label>
        <input type="text" name="gambar_article" class="border-2 border-gray-200 p-2 rounded" />
    </div>

    <div class="flex flex-col">
        <label class="font-bold mb-1">Judul Article</label>
        <input type="text" name="judul_article" class="border-2 border-gray-200 p-2 rounded" />
    </div>

    <div class="flex flex-col">
        <label class="font-bold mb-1">Kategori Article</label>
        <input type="text" name="kategori_article" class="border-2 border-gray-200 p-2 rounded" />
    </div>

    <div class="flex flex-col">
        <label class="font-bold mb-1">Deskripsi Article</label>
        <textarea type="text" name="deskripsi_article" class="border-2 border-gray-200 p-2 rounded"></textarea>
    </div>

    <div class="flex flex-col">
        <label class="font-bold mb-1">Author Article</label>
        <input type="text" name="author_article" class="border-2 border-gray-200 p-2 rounded" />
    </div>

    <div class="flex flex-col">
        <label class="font-bold mb-1">Status Article</label>
        <div class="flex items-center space-x-2">
            <label><input type="radio" value="on" name="status_article" class="mr-1" /> on</label>
            <label><input type="radio" value="off" name="status_article" class="mr-1" /> off</label>
        </div>
    </div>

    <div class="flex justify-end">
        <input type="submit" name="button" value="Tambah" class="bg-blue-500 cursor-pointer hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" />
    </div>
</form>