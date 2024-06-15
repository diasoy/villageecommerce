<form action="<?php echo BASE_URL . 'module/article/tambah.php'; ?>" method="POST" enctype="multipart/form-data" class="mx-8 md:mx-20 lg:mx-40 w-full py-20 flex flex-col gap-5">
    <div class="flex flex-col">
        <label class="font-bold mb-2 text-indigo-700">Gambar Article</label>
        <input type="file" name="gambar_article" class="border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required />
    </div>

    <div class="flex flex-col">
        <label class="font-bold mb-2 text-indigo-700">Judul Article</label>
        <input type="text" name="judul_article" class="border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required />
    </div>

    <div class="flex flex-col">
        <label class="font-bold mb-2 text-indigo-700">Kategori Article</label>
        <select name="kategori_article" id="kategori_article" class="border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            <option value="Tips">Tips</option>
            <option value="Kebijakan">Kebijakan</option>
            <option value="Inspirasi">Inspirasi</option>
            <option value="Kasus">Kasus</option>
        </select>
    </div>

    <div class="flex flex-col">
        <label class="font-bold mb-2 text-indigo-700">Deskripsi Article</label>
        <textarea name="deskripsi_article" class="border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required></textarea>
    </div>

    <div class="flex flex-col">
        <label class="font-bold mb-2 text-indigo-700">Author Article</label>
        <input type="text" name="author_article" class="border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required />
    </div>

    <div class="flex flex-col">
        <label class="font-bold mb-2 text-indigo-700">Status Article</label>
        <div class="flex items-center space-x-4">
            <label class="flex items-center"><input type="radio" value="on" name="status_article" class="mr-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required /> On</label>
            <label class="flex items-center"><input type="radio" value="off" name="status_article" class="mr-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required /> Off</label>
        </div>
    </div>

    <div class="flex justify-end mt-4">
        <input type="submit" name="button" value="Tambah" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg cursor-pointer transition duration-300" />
    </div>
</form>


