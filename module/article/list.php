<?php
$no = 1;

$queryArticle = mysqli_query($koneksi, "SELECT * FROM article");

if (mysqli_num_rows($queryArticle) == 0) {
    echo "<h3>Saat ini belum ada data article yang dimasukan</h3>";
} else {
    echo "<table class='table-list'>";

    echo "<tr class='baris-title'>
                    <th class='kolom-nomor'>No</th>
                    <th class='kiri'>Gambar</th>
                    <th class='kiri'>Judul</th>
                    <th class='kiri'>Kategori</th>
                    <th class='kiri'>Tanggal</th>
                    <th class='kiri'>Author</th>
                    <th class='tengah'>Status</th>
                    <th class='tengah'h>Action</th>
                 </tr>";

    while ($rowArticle = mysqli_fetch_array($queryArticle)) {
        echo "<tr>
                        <td class='kolom-nomor'>$no</td>
                        <td>$rowArticle[gambar_article]</td>
                        <td>$rowArticle[judul_article]</td>
                        <td>$rowArticle[kategori_article]</td>
                        <td>$rowArticle[tanggal_article]</td>
                        <td>$rowArticle[author_article]</td>
                        <td class='tengah'>$rowArticle[status_article]</td>
                        <td class='tengah'>
                        <a class='tombol-action' href='" . BASE_URL . "index.php?page=my_profile&module=article&action=form&id_article=$rowArticle[id_article]" . "'>Edit</a>
                        <a class='tombol-action' href='" . BASE_URL . "index.php?page=my_profile&module=article&action=delete&id_article=$rowArticle[id_article]" . "'>Delete</a>
                        </td>
                     </tr>";

        $no++;
    }

    //AKHIR DARI TABLE
    echo "</table>";
}
