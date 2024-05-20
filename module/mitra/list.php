<?php

$no = 1;

$id_user = $_SESSION['id_user'];
$queryAdmin = mysqli_query($koneksi, "SELECT * FROM mitra ORDER BY nama_mitra ASC");
$queryMitra = mysqli_query($koneksi, "SELECT * FROM mitra WHERE id_user='$id_user' ORDER BY nama_mitra ASC");

if (mysqli_num_rows($queryAdmin)  == 0) {
    echo "<h3 class='text-center text-lg font-bold mt-4'>Saat ini belum ada data user yang dimasukan</h3>";
} else {
    if ($level == "admin") {
        echo "<table class='mx-4 border-collapse w-full mt-4'>";

        echo "<tr class='border-b p-1 bg-gray-200'>
                    <th class='w-1/12 text-center py-2'>No</th>
                    <th class='w-2/12 py-2'>Id User</th>
                    <th class='w-2/12 py-2'>Nama</th>
                    <th class='w-2/12 py-2'>Kategori</th>
                    <th class='w-2/12 text-center py-2'>Status</th>
                    <th class='w-2/12 text-center py-2'>Action</th>
                 </tr>";

        while ($rowUser = mysqli_fetch_array($queryAdmin)) {
            echo "<tr class='border-b p-1'>
                        <td class='w-1/12 text-center py-3'>$no</td>
                        <td class='w-2/12 py-3'>$rowUser[id_user]</td>
                        <td class='w-2/12 py-3'>$rowUser[nama_mitra]</td>
                        <td class='w-2/12 py-3'>$rowUser[kategori_mitra]</td>
                        <td class='w-2/12 text-center py-3'>$rowUser[status_mitra]</td>
                        <td class='w-2/12 text-center py-3'>
                            <a class='inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2' href='" . BASE_URL . "index.php?page=my_profile&module=mitra&action=status&id_mitra=$rowUser[id_mitra]" . "'>Edit</a>
                            <a class='inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded' href='" . BASE_URL . "index.php?page=my_profile&module=mitra&action=hapus&id_mitra=$rowUser[id_mitra]" . "'>Delete</a>
                        </td>
                     </tr>";

            $no++;
        }

        echo "</table>";
    } else {
        $status = $rowUser['status_mitra'];
        echo "<a class='inline-block bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4 mt-4' href='" . BASE_URL . "index.php?page=my_profile&module=mitra&action=form_tambah'>Tambah Mitra</a>";
        echo "<table class='mx-4 border-collapse w-full'>";

        echo "<tr class='border-b p-1 bg-gray-200'>
                    <th class='w-1/12 text-center py-2'>No</th>
                    <th class='w-2/12 py-2'>Nama</th>
                    <th class='w-2/12 py-2'>Kategori</th>
                    <th class='w-2/12 py-2'>Deskripsi</th>
                    <th class='w-2/12 py-2'>Rincian Harga</th>
                    <th class='w-2/12 py-2'>Contact</th>
                    <th class='w-2/12 text-center py-2'>Status</th>
                    <th class='w-2/12 text-center py-2'>Action</th>
                 </tr>";

        while ($rowUser = mysqli_fetch_array($queryMitra)) {
            echo "<tr class='border-b p-1'>
                        <td class='w-1/12 text-center py-3'>$no</td>
                        <td class='w-2/12 py-3'>$rowUser[nama_mitra]</td>
                        <td class='w-2/12 py-3'>$rowUser[kategori_mitra]</td>
                        <td class='w-2/12 py-3'>$rowUser[deskripsi_mitra]</td>
                        <td class='w-2/12 py-3'>$rowUser[rincian_harga]</td>
                        <td class='w-2/12 py-3'>$rowUser[phone_mitra]</td>
                        <td class='w-2/12 text-center py-3'>$rowUser[$status]</td>
                        <td class='w-2/12 text-center py-3'>
                            <a class='inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2' href='" . BASE_URL . "index.php?page=my_profile&module=mitra&action=form_edit&id_mitra=$rowUser[id_mitra]" . "'>Edit</a>
                            <a class='inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded' href='" . BASE_URL . "index.php?page=my_profile&module=mitra&action=hapus&id_mitra=$rowUser[id_mitra]" . "'>Delete</a>
                        </td>
                     </tr>";
            $no++;
        }

        echo "</table>";
    }
}
