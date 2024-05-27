<?php

define("BASE_URL", "http://localhost/villageecommerce/");
define("IMAGE_ARTICLES", "http://localhost/villageecommerce/assets/images/articles/");
define("IMAGE_MITRA", "http://localhost/villageecommerce/assets/images/mitra/");

function rupiah($nilai = 0)
{
    $string = "Rp," . number_format($nilai);
    return $string;
}

function kategori($kategori_id = false)
{
    global $koneksi;

    $string = "<div id='menu-kategori'>";

    $string .= "<ul>";

    $query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE status='on'");

    while ($row = mysqli_fetch_assoc($query)) {
        if ($kategori_id == $row['kategori_id']) {
            $string .= "<li><a href='" . BASE_URL . "index.php?kategori_id=$row[kategori_id]' class='active'>$row[kategori]</a></li>";
        } else {
            $string .= "<li><a href='" . BASE_URL . "index.php?kategori_id=$row[kategori_id]'>$row[kategori]</a></li>";
        }
    }

    $string .= "</ul>";

    $string .= "</div>";

    return $string;
}

function uploadImageArticle($file)
{
    $namaFile = $file['name'];
    $ukuranFile = $file['size'];
    $error = $file['error'];
    $tmpName = $file['tmp_name'];

    if ($error === 4) {
        echo '<script>
                alert("Pilih gambar terlebih dahulu");
              </script>';
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo '<script>
                alert("Yang anda upload bukan gambar");
              </script>';
        return false;
    }

    if ($ukuranFile > 5000000) {
        echo '<script>
                alert("Ukuran gambar terlalu besar");
              </script>';
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    $targetDir = __DIR__ . '/../assets/images/articles/';
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    $targetFile = $targetDir . $namaFileBaru;

    if (move_uploaded_file($tmpName, $targetFile)) {
        return $namaFileBaru;
    } else {
        echo '<script>
                alert("Gagal upload gambar");
              </script>';
        return false;
    }
}

function uploadImageMitra($file)
{
    $namaFile = $file['name'];
    $ukuranFile = $file['size'];
    $error = $file['error'];
    $tmpName = $file['tmp_name'];

    if ($error === 4) {
        echo '<script>
                alert("Pilih gambar terlebih dahulu");
              </script>';
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo '<script>
                alert("Yang anda upload bukan gambar");
              </script>';
        return false;
    }

    if ($ukuranFile > 5000000) {
        echo '<script>
                alert("Ukuran gambar terlalu besar");
              </script>';
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    $targetDir = __DIR__ . '/../assets/images/mitra/';
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    $targetFile = $targetDir . $namaFileBaru;

    if (move_uploaded_file($tmpName, $targetFile)) {
        return $namaFileBaru;
    } else {
        echo '<script>
                alert("Gagal upload gambar");
              </script>';
        return false;
    }
}
