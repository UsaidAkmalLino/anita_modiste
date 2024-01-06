<?php
// Sambungkan ke database
require_once("koneksi.php");
$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data dari form
$id_admin = $_POST['id_admin'];
$username = $_POST['username'];
$password = $_POST['password']; // Consider encrypting the password
$akses = $_POST['akses'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_telepon = $_POST['no_telepon'];

// Buat query update
$query = "UPDATE user SET 
          username='$username', 
          password='$password', 
          akses='$akses', 
          nama='$nama', 
          alamat='$alamat', 
          no_telepon='$no_telepon' 
          WHERE id_admin='$id_admin'";

// Eksekusi query
if (mysqli_query($koneksi, $query)) {
    echo "Data berhasil diperbarui";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

// Tutup koneksi
mysqli_close($koneksi);

// Redirect kembali ke halaman data penjahit
header("Location: data-penjahit.php");
exit();
?>