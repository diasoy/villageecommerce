<div class="mb-4">
    <a href="<?php echo BASE_URL."index.php?page=my_profile&module=article&action=form_tambah"; ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">+ Tambah Article</a>
</div>

<?php
$no = 1;

$queryArticle = mysqli_query($koneksi, "SELECT * FROM article");

if (mysqli_num_rows($queryArticle) == 0) {
    echo "<h3 class='text-lg font-bold'>Saat ini belum ada data article yang dimasukan</h3>";
} else {
    echo "<table class='w-full text-left border-collapse'>";
    echo "<thead>
            <tr class='bg-gray-100 border-b border-gray-200'>
                <th class='py-4 px-6'>No</th>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Author</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
          </thead>
          <tbody>";

    while ($rowArticle = mysqli_fetch_array($queryArticle)) {
        echo "<tr class='hover:bg-gray-100'>
                <td class='py-4 px-6'>$no</td>
                <td>$rowArticle[gambar_article]</td>
                <td>$rowArticle[judul_article]</td>
                <td>$rowArticle[kategori_article]</td>
                <td>$rowArticle[deskripsi_article]</td>
                <td>$rowArticle[author_article]</td>
                <td>$rowArticle[tanggal_article]</td>
                <td>$rowArticle[status_article]</td>
                <td>
                    <a class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded mr-2' href='" . BASE_URL . "index.php?page=my_profile&module=article&action=form_edit&id_article=$rowArticle[id_article]" . "'>Edit</a>
                    <a class='bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-4 rounded' href='" . BASE_URL . "index.php?page=my_profile&module=article&action=hapus&id_article=$rowArticle[id_article]" . "'>Delete</a>
                </td>
              </tr>";

        $no++;
    }

    //AKHIR DARI TABLE
    echo "</tbody></table>";
}