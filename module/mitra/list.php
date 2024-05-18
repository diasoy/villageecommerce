<?php

$no = 1;

$queryAdmin = mysqli_query($koneksi, "SELECT * FROM mitra ORDER BY nama_mitra ASC");
$queryMitra = mysqli_query($koneksi, "SELECT * FROM mitra WHERE id_user='$id_user' ORDER BY nama_mitra ASC");

if (mysqli_num_rows($queryAdmin)  == 0) {
    echo "<h3>Saat ini belum ada data user yang dimasukan</h3>";
} else {
    if ($level == "admin") {
        echo "<table class='table-list'>";
        echo "<tr class='baris-title'>
                    <th class='kolom-nomor'>No</th>
                    <th class='kiri'>Gambar</th>
                    <th class='kiri'>Nama</th>
                    <th class='kiri'>Kategori</th>
                    <th class='kiri'>Deskripsi</th>
                    <th class='kiri'>Rincian Harga</th>
                    <th class='kiri'>Contact</th>
                    <th class='tengah'>Status</th>
                    <th class='tengah'h>Action</th>
                 </tr>";

        while ($rowUser = mysqli_fetch_array($queryAdmin)) {
            echo "<tr>
                        <td class='kolom-nomor'>$no</td>
                        <td>$rowUser[gambar_mitra]</td>
                        <td>$rowUser[nama_mitra]</td>
                        <td>$rowUser[kategori_mitra]</td>
                        <td>$rowUser[deskripsi_mitra]</td>
                        <td>$rowUser[rincian_harga]</td>
                        <td>$rowUser[phone_mitra]</td>
                        <td>$rowUser[status_mitra]</td>
                        <td class='tengah'>
                        <a class='tombol-edit' href='" . BASE_URL . "index.php?page=my_profile&module=mitra&action=form&id_mitra=$rowUser[id_mitra]" . "'>Edit</a>
                        <a class='tombol-delete' href='" . BASE_URL . "index.php?page=my_profile&module=mitra&action=action&button=delete&id_mitra=$rowUser[id_mitra]" . "'>Delete</a>
                        </td>
                     </tr>";

            $no++;
        }

        //AKHIR DARI TABLE
        echo "</table>";
    } else {

        echo "<a href='" . BASE_URL . "index.php?page=my_profile&module=mitra&action=form' class='tombol-action'>+ Tambah Mitra</a>";
        echo "<table class='table-list'>";
        echo "<tr class='baris-title'>
                    <th class='kolom-nomor'>No</th>
                    <th class='kiri'>Gambar</th>
                    <th class='kiri'>Nama</th>
                    <th class='kiri'>Kategori</th>
                    <th class='kiri'>Deskripsi</th>
                    <th class='kiri'>Rincian Harga</th>
                    <th class='kiri'>Contact</th>
                    <th class='tengah'>Status</th>
                    <th class='tengah'h>Action</th>
                 </tr>";

        while ($rowUser = mysqli_fetch_array($queryMitra)) {
            echo "<tr>
                        <td class='kolom-nomor'>$no</td>
                        <td>$rowUser[gambar_mitra]</td>
                        <td>$rowUser[nama_mitra]</td>
                        <td>$rowUser[kategori_mitra]</td>
                        <td>$rowUser[deskripsi_mitra]</td>
                        <td>$rowUser[rincian_harga]</td>
                        <td>$rowUser[phone_mitra]</td>
                        <td>$rowUser[status_mitra]</td>
                        <td class='tengah'>
                            <a class='tombol-action' href='" . BASE_URL . "index.php?page=my_profile&module=mitra&action=form&id_mitra=$rowUser[id_mitra]" . "'>Edit</a>
                            <a class='tombol-action' href='" . BASE_URL . "index.php?page=my_profile&module=mitra&action=action&button=delete&id_mitra=$rowUser[id_mitra]" . "'>Delete</a>
                        </td>
                     </tr>";

            $no++;
        }
    }
}
