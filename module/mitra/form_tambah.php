<h1 class="text-2xl text-center font-bold mb-4">Tambah Mitra Baru</h1>
<form action="<?php echo BASE_URL . "module/mitra/tambah.php" ?>" enctype="multipart/form-data" method="post" class="space-y-4">
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
        <input type="text" name="kategori_mitra" class="border-2 border-gray-200 p-2 rounded" />
    </div>

    <div class="flex flex-col">
        <label class="font-bold mb-1">Deskripsi</label>
        <input type="text" name="deskripsi_mitra" class="border-2 border-gray-200 p-2 rounded" />
    </div>

    <div class="flex flex-col">
        <label class="font-bold mb-1">Rincian Harga</label>
        <input type="text" name="rincian_harga" class="border-2 border-gray-200 p-2 rounded" />
    </div>

    <div class="flex flex-col">
        <label class="font-bold mb-1">Phone</label>
        <input type="text" name="phone_mitra" class="border-2 border-gray-200 p-2 rounded" />
    </div>

    <div class="flex justify-end">
        <input type="submit" name="button" value="Add" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" />
    </div>
</form>