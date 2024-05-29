<?php
include_once ('./function/database.php'); // Include or require the file containing database connection information

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the database connection is established
    if (!$koneksi) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Escape special characters to prevent SQL injection
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama_masukan']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email_masukan']);
    $pesan = mysqli_real_escape_string($koneksi, $_POST['pesan_masukan']);
    $jenis_masukan = mysqli_real_escape_string($koneksi, $_POST['jenis_masukan']);

    // Insert data into the database
    $query = "INSERT INTO masukan (nama_masukan, email_masukan, pesan_masukan, jenis_masukan) VALUES ('$nama', '$email', '$pesan', '$jenis_masukan')";

    if (mysqli_query($koneksi, $query)) {
        // If successful, redirect with success status
        header("Location: index.php?page=main&status=success");
    } else {
        // If failed, redirect with error status
        header("Location: index.php?page=main&status=error");
    }
}
?>
