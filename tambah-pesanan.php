<?php
// Hubungkan ke database
require_once("koneksi.php");

// Ambil data dari formulir
$customer_name = $_POST['customer-name'];
$customer_address = $_POST['customer-address'];
$nomer_telepon = $_POST['nomer-telepon'];
$desain = $_POST['desain'];
$bahan = $_POST['bahan'];
$ukuran = $_POST['ukuran'];
$jumlah = $_POST['jumlah'];

// Masukkan data ke dalam database
$mysqli = new mysqli("localhost", "root", "", "anita_modiste");
if ($mysqli->connect_error) {
    die("Koneksi ke database gagal: " . $mysqli->connect_error);
}
$ukuran = nl2br($_POST['ukuran']);
$sql = "INSERT INTO pesanan_jahitan (customer_name, customer_address, nomer_telepon, desain, bahan, ukuran, jumlah) VALUES ('$customer_name', '$customer_address', '$nomer_telepon', '$desain', '$bahan', '$ukuran', '$jumlah')";

if ($mysqli->query($sql) === TRUE) {
    echo "Data berhasil disimpan ke dalam database.";
}

// Tutup koneksi database
$mysqli->close();
?>