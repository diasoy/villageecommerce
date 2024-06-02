<?php
$no = 1;

$queryAdmin = mysqli_query($koneksi, "SELECT * FROM masukan");

if (mysqli_num_rows($queryAdmin) == 0) {
    echo "<h3>Saat ini belum ada data masukkan yang dimasukan</h3>";
} else {
    echo "<table class='w-full border-collapse border-b-2 border-green-600'>";

    echo "<tr class='border-b p-1 bg-green-600 text-white'>
                    <th class='w-1/12 text-center py-2'>No</th>
                    <th class='w-2/12 py-2'>Nama</th>
                    <th class='w-2/12 py-2'>Email</th>
                    <th class='w-5/12 py-2'>Pesan</th>
                    <th class='w-2/12 text-center py-2'>Action</th>
                 </tr>";

    while ($rowMasukan = mysqli_fetch_array($queryAdmin)) {
        echo "<tr class='border-b p-1'>
                        <td class='w-1/12 text-center py-3'>$no</td>
                        <td class='w-2/12 py-3 px-5'>$rowMasukan[nama_masukan]</td>
                        <td class='w-2/12 py-3 px-5'>$rowMasukan[email_masukan]</td>
                        <td class='w-5/12 py-3 px-5'>$rowMasukan[pesan_masukan]</td>
                        <td class='w-2/12 text-center py-3'><a class='inline-block bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-5 rounded' href='" . BASE_URL . "index.php?page=my_profile&module=masukan&action=hapus&id_masukan=$rowMasukan[id_masukan]" . "'>Hapus</a></td>
                     </tr>";

        $no++;
    }

    //AKHIR DARI TBLE
    echo "</table>";
}
