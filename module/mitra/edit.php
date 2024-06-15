<?php
include("../../function/database.php");
include("../../function/helper.php");

$id_mitra = $_GET['id_mitra'];

// Fetch form data
$namaMitra = $_POST["nama_mitra"];
$kategoriMitra = $_POST["kategori_mitra"];
$deskripsiMitra = $_POST["deskripsi_mitra"];
$rincianHarga = $_POST["rincian_harga"];
$phoneMitra = $_POST["phone_mitra"];

// Handle file upload if a new image is uploaded
if (isset($_FILES['gambar_mitra']) && $_FILES['gambar_mitra']['error'] === 0) {
    $gambarMitra = uploadImageMitra($_FILES['gambar_mitra']);
    if (!$gambarMitra) {
        echo "Failed to upload image";
        exit;
    }
} else {
    // Use the old image if no new image is uploaded
    $gambarMitra = $_POST["gambarLama"];
}

// Update the database
$query = "UPDATE mitra 
          SET gambar_mitra='$gambarMitra', 
              nama_mitra='$namaMitra', 
              kategori_mitra='$kategoriMitra', 
              deskripsi_mitra='$deskripsiMitra', 
              rincian_harga='$rincianHarga', 
              phone_mitra='$phoneMitra' 
          WHERE id_mitra='$id_mitra'";

if (mysqli_query($koneksi, $query)) {
    header("location: " . BASE_URL . "index.php?page=my_profile&module=mitra&action=list");
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
