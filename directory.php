<?php
if ($koneksi->connect_errno) {
    die('Connect Error: ' . $koneksi->connect_errno . ' - ' . $koneksi->connect_error);
}
$kategori = isset($_GET['kategori']) ? $_GET['kategori'] : 'semua';
$query = "SELECT mitra.*, IFNULL(kunjungan_mitra.total_clicks, 0) as total_clicks
          FROM mitra
          LEFT JOIN (
              SELECT id_mitra, COUNT(*) as total_clicks
              FROM kunjungan_mitra
              GROUP BY id_mitra
          ) kunjungan_mitra ON mitra.id_mitra = kunjungan_mitra.id_mitra
          WHERE mitra.status_mitra = 'on'";

if ($kategori != 'semua') {
    $query .= " AND mitra.kategori_mitra = '$kategori'";
}

$query .= " ORDER BY total_clicks DESC";
$result = $koneksi->query($query);

if (!$result) {
    die('Query Error: ' . $koneksi->errno . ' - ' . $koneksi->error);
}

if (isset($_GET['id_mitra'])) {
    $id_mitra = $_GET['id_mitra'];
    $updateQuery = "UPDATE mitra SET kunjungan_mitra = kunjungan_mitra + 1 WHERE id_mitra = '$id_mitra'";
    $updateResult = $koneksi->query($updateQuery);

    if (!$updateResult) {
        die('Update Query Error: ' . $koneksi->errno . ' - ' . $koneksi->error);
    }

    $id_guest = $_SESSION['id_guest'];
    $insertQuery = "INSERT INTO kunjungan_mitra (id_mitra, id_guest) VALUES ('$id_mitra', '$id_guest')";
    $insertResult = $koneksi->query($insertQuery);

    if (!$insertResult) {
        die('Insert Query Error: ' . $koneksi->errno . ' - ' . $koneksi->error);
    }
}
?>

<div class="lg:px-36 xl:px-56 px-6 md:px-28 py-32">
    <h1 class="font-bold text-3xl my-5 text-indigo-800">Daftar Mitra UMKM Teratas</h1>
    <p class="text-indigo-700 lg:text-lg">
        Temukan mitra UMKM terbaik di desa dengan berbagai kategori yang ada. Dapatkan informasi terbaru seputar mitra UMKM yang ada di desa.
    </p>
    <form action="" method="post" class="flex flex-col gap-4 my-10">
        <label for="mitra" class="font-bold text-indigo-800">Cari mitra berdasarkan nama</label>
        <div class="relative">
            <input id="mitra" type="search" placeholder="Cari mitra" class="px-5 py-2 rounded-xl pl-10" autocomplete="off">
            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-indigo-400"></i>
        </div>
    </form>
    <div class="mb-8">
        <div class="flex gap-4 justify-center flex-wrap">
            <a href="<?= BASE_URL . "index.php?page=directory&kategori=semua" ?>" class="px-4 py-2 rounded <?= ($kategori == 'semua') ? 'bg-indigo-700 text-white' : 'bg-white text-indigo-800' ?>">Semua UMKM</a>
            <a href="<?= BASE_URL . "index.php?page=directory&kategori=makanan" ?>" class="px-4 py-2 rounded <?= ($kategori == 'makanan') ? 'bg-indigo-700 text-white' : 'bg-white text-indigo-800' ?>">Makanan</a>
            <a href="<?= BASE_URL . "index.php?page=directory&kategori=minuman" ?>" class="px-4 py-2 rounded <?= ($kategori == 'minuman') ? 'bg-indigo-700 text-white' : 'bg-white text-indigo-800' ?>">Minuman</a>
            <a href="<?= BASE_URL . "index.php?page=directory&kategori=jasa" ?>" class="px-4 py-2 rounded <?= ($kategori == 'jasa') ? 'bg-indigo-700 text-white' : 'bg-white text-indigo-800' ?>">Jasa</a>
            <a href="<?= BASE_URL . "index.php?page=directory&kategori=sewa" ?>" class="px-4 py-2 rounded <?= ($kategori == 'sewa') ? 'bg-indigo-700 text-white' : 'bg-white text-indigo-800' ?>">Sewa</a>
            <a href="<?= BASE_URL . "index.php?page=directory&kategori=produk" ?>" class="px-4 py-2 rounded <?= ($kategori == 'produk') ? 'bg-indigo-700 text-white' : 'bg-white text-indigo-800' ?>">Produk</a>
        </div>
    </div>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4" id="container-mitra">
        <?php if ($result->num_rows > 0) : ?>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <div class="bg-white rounded-lg shadow hover:shadow-lg duration-500 hover:duration-500">
                    <a href="<?= BASE_URL . "index.php?page=kunjungan_mitra&id_mitra=" . $row['id_mitra']; ?>">
                        <img src="<?= IMAGE_MITRA . $row["gambar_mitra"]; ?>" alt="<?= $row['gambar_mitra']; ?>" class="w-full h-60 object-cover rounded-t-lg">
                        <div class="flex flex-col py-5 mx-4">
                            <h1 class="text-lg font-bold"><?= $row['nama_mitra']; ?></h1>
                            <p class="text-gray-500"><?= $row['kategori_mitra']; ?></p>
                            <p class="text-gray-500">Rincian Harga: <?= $row['rincian_harga']; ?></p>
                        </div>
                    </a>
                </div>
            <?php endwhile; ?>
        <?php else : ?>
            <p>No mitra found.</p>
        <?php endif; ?>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#mitra').on('keyup', function() {
            var keyword = $(this).val();
            $.ajax({
                url: 'search_directory.php',
                type: 'post',
                data: {
                    keyword: keyword
                },
                success: function(result) {
                    $('#container-mitra').html(result);
                }
            });
        });
    });
</script>