<h1>Tambah Mitra Baru</h1>
<form action="<?php echo BASE_URL . "module/mitra/tambah.php" ?>" method="post">
    <div class="element-form">
        <label>Gambar</label>
        <span><input type="text" name="gambar_mitra" /></span>
    </div>
    <div class="element-form">
        <label>Nama Mitra</label>
        <span><input type="text" name="nama_mitra" /></span>
    </div>

    <div class="element-form">
        <label>Kategori</label>
        <span><input type="text" name="kategori_mitra" /></span>
    </div>

    <div class="element-form">
        <label>Deskripsi</label>
        <span><input type="text" name="deskripsi_mitra" /></span>
    </div>

    <div class="element-form">
        <label>Rincian Harga</label>
        <span><input type="text" name="rincian_harga" /></span>
    </div>

    <div class="element-form">
        <label>Phone</label>
        <span><input type="text" name="phone_mitra" /></span>
    </div>

    <div class="element-form">
        <span><input type="submit" name="button" value="Add" class="submit-my-profile" /></span>
    </div>