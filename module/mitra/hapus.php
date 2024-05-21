<?php
$id_mitra = $_GET['id_mitra'];

mysqli_query($koneksi, "DELETE FROM mitra WHERE id_mitra='$id_mitra'");
header("location: " . BASE_URL . "index.php?page=my_profile&module=mitra&action=list");
