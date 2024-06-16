    <div class="flex flex-col w-full justify-center py-20">
        <h1 class="text-2xl text-center font-bold mb-10 text-indigo-700">Tambah Mitra Baru</h1>
        <form action="<?php echo BASE_URL . "module/mitra/tambah.php" ?>" enctype="multipart/form-data" method="post" class="space-y-4 flex flex-col mx-72 text-indigo-900">
            <div class="flex flex-col">
                <label class="font-bold mb-1">Gambar</label>
                <input type="file" name="gambar_mitra" class="border-2 border-gray-200 p-2 rounded" />
            </div>
            <div class="flex flex-col">
                <label class="font-bold mb-1">Nama Mitra</label>
                <input type="text" name="nama_mitra" class="border-2 border-gray-200 p-2 rounded" />
            </div>

            <div class="flex flex-col">
                <label class="font-bold mb-1">Kategori</label>
                <select name="kategori_mitra" id="kategori_mitra" class="border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="Makanan">Makanan</option>
                    <option value="Minuman">Minuman</option>
                    <option value="Jasa">Jasa</option>
                    <option value="Sewa">Sewa</option>
                    <option value="Produk">Produk</option>
                </select>
            </div>

            <div class="flex flex-col">
                <label class="font-bold mb-1">Deskripsi</label>
                <textarea type="text" name="deskripsi_mitra" class="border-2 border-gray-200 p-2 rounded"></textarea>
            </div>

            <div class="flex flex-col">
                <label class="font-bold mb-1">Rincian Harga</label>
                <input type="text" name="rincian_harga" class="border-2 border-gray-200 p-2 rounded" />
            </div>

            <div class="flex flex-col">
                <label class="font-bold mb-1">Phone</label>
                <input type="text" name="phone_mitra" class="border-2 border-gray-200 p-2 rounded" />
            </div>

            <div class="flex justify-center">
                <input type="submit" name="button" value="Tambah" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-20 rounded" />
            </div>
        </form>
    </div>