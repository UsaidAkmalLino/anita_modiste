<?php
// Sambungkan ke database MySQL
require_once("koneksi.php");
$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}


// Tangkap data dari formulir
$username = $_POST['username'];
$password = $_POST['password'];
$akses = $_POST['akses'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_telepon = $_POST['no_telepon'];


// Buat query SQL untuk menambahkan akun karyawan
$query = "INSERT INTO user (username, password, akses, nama, alamat, no_telepon) VALUES ('$username', '$password', '$akses', '$nama', '$alamat', '$no_telepon')";

// Eksekusi query
if (mysqli_query($koneksi, $query)) {
    echo "Akun karyawan berhasil ditambahkan.";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

// Tutup koneksi
mysqli_close($koneksi);
?>