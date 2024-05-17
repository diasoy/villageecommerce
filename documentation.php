<?php
include_once("function/database.php");

$query = "SELECT * FROM mitra";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die('Query Error : ' . mysqli_errno($koneksi) . ' - ' . mysqli_error($koneksi));
}
?>

<div class="py-40 mx-40">
    <?php if (mysqli_num_rows($result) > 0) : ?>
        <?php foreach ($result as $row) : ?>
            <div class="bg-green-500 p-5 mx-40 rounded-lg shadow-lg py-40">
                <p class="text-2xl font-bold"><?= $row['gambar_mitra']; ?></p>
                <h1 class="text-2xl font-bold"><?= $row['nama_mitra']; ?></h1>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>No Mitra found.</p>
    <?php endif; ?>
</div>