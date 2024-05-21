<?php
$no = 1;

$queryAdmin = mysqli_query($koneksi, "SELECT * FROM user ORDER BY nama_user ASC");

if (mysqli_num_rows($queryAdmin) == 0) {
    echo "<h3>Saat ini belum ada data user yang dimasukan</h3>";
} else {
    echo "<table class='mr-20 w-full border-collapse border-b-2 border-green-600'>";

    echo "<tr class='border-b p-1 bg-green-600 text-white'>
                    <th class='w-1/12 text-center py-2'>No</th>
                    <th class='w-2/12 py-2'>Nama</th>
                    <th class='w-2/12 py-2'>Level</th>
                    <th class='w-2/12 py-2'>Email</th>
                    <th class='w-2/12 py-2'>Phone</th>
                    <th class='w-2/12 py-2'>Alamat</th>
                    <th class='w-1/12 text-center py-2'>Status</th>
                    <th class='w-1/12 text-center py-2'>Action</th>
                 </tr>";

    while ($rowUser = mysqli_fetch_array($queryAdmin)) {
        echo "<tr class='border-b p-1'>
                        <td class='w-1/12 text-center py-3'>$no</td>
                        <td class='w-2/12 py-3 px-5'>$rowUser[nama_user]</td>
                        <td class='w-2/12 py-3 px-5'>$rowUser[level_user]</td>
                        <td class='w-2/12 py-3 px-5'>$rowUser[email_user]</td>
                        <td class='w-2/12 py-3 px-5'>$rowUser[phone_user]</td>
                        <td class='w-2/12 py-3 px-5'>$rowUser[alamat_user]</td>
                        <td class='w-1/12 text-center py-3'>$rowUser[status_user]</td>
                        <td class='w-1/12 text-center py-3'><a class='inline-block bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-5 rounded' href='" . BASE_URL . "index.php?page=my_profile&module=user&action=form&id_user=$rowUser[id_user]" . "'>Edit</a></td>
                     </tr>";

        $no++;
    }

    //AKHIR DARI TBLE
    echo "</table>";
}
