<!-- hapus masukan -->
<?php
include("../../function/database.php");
include("../../function/helper.php");

$idMasukan = $_GET['id_masukan'];

mysqli_query($koneksi, "DELETE FROM masukan WHERE id_masukan='$idMasukan'");
header("location: " . BASE_URL . "index.php?page=my_profile&module=masukan&action=list");
