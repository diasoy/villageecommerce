<div class="flex flex-col w-full mr-20 my-4">
    <div class="ml-4">
        <a href="<?php echo BASE_URL . "index.php?page=my_profile&module=article&action=form_tambah"; ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">+ Tambah article</a>
    </div>

    <?php
    $no = 1;

    $queryArticle = mysqli_query($koneksi, "SELECT * FROM article");

    if (mysqli_num_rows($queryArticle) == 0) {
        echo "<h3 class='text-lg font-bold'>Saat ini belum ada data article yang dimasukan</h3>";
    } else {
        echo "<table class='mx-4 border-collapse w-full mt-4'>
            <tr class='border-b p-1 text-white bg-indigo-700'>
                <th class='w-1/12 py-4 px-6'>No</th>
                <th class='w-2/12 text-center py-2'>Judul</th>
                <th class='w-2/12 text-center py-2'>Kategori</th>
                <th class='w-2/12 text-center py-2'>Author</th>
                <th class='w-1/12 text-center py-2'>Status</th>
                <th class='w-4/12 text-center py-2'>Action</th>
            </tr>
          <tbody>";

        while ($row = mysqli_fetch_array($queryArticle)) {
            echo "<tr class=''>
                <td class='w-1/12 text-center py-3'>$no</td>
                <td class='w-2/12 text-center py-3'>$row[judul_article]</td>
                <td class='w-2/12 text-center py-3'>$row[kategori_article]</td>
                <td class='w-2/12 text-center py-3'>$row[author_article]</td>
                <td class='w-1/12 text-center py-3'>$row[status_article]</td>
                <td class='w-4/12 text-center py-3'>
                    <a class='bg-orange-500 hover:bg-orange-700 text-white font-bold py-1 px-4 rounded mr-2' href='" . BASE_URL . "index.php?page=my_profile&module=article&action=detail_article&id_article=$row[id_article]" . "'>Detail</a>
                    <a class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded mr-2' href='" . BASE_URL . "index.php?page=my_profile&module=article&action=form_edit&id_article=$row[id_article]" . "'>Edit</a>
                    <a class='bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-4 rounded' href='" . BASE_URL . "index.php?page=my_profile&module=article&action=hapus&id_article=$row[id_article]" . "'>Delete</a>
                </td>
              </tr>";

            $no++;
        }

        //AKHIR DARI TABLE
        echo "</tbody></table>";
    }
    ?>
</div>