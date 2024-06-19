<?php
include_once ('./function/database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!$koneksi) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $nama = mysqli_real_escape_string($koneksi, $_POST['nama_masukan']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email_masukan']);
    $pesan = mysqli_real_escape_string($koneksi, $_POST['pesan_masukan']);
    $jenis_masukan = mysqli_real_escape_string($koneksi, $_POST['jenis_masukan']);

    $query = "INSERT INTO masukan (nama_masukan, email_masukan, pesan_masukan, jenis_masukan) VALUES ('$nama', '$email', '$pesan', '$jenis_masukan')";

    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php?page=main&status=success");
    } else {
        header("Location: index.php?page=main&status=error");
    }
}
