<?php
// Informasi koneksi database
$host = "localhost"; // Host database
$username = "root"; // Username database
$password = ""; // Password database
$database = "anita_modiste"; // Nama database

// Membuat koneksi ke database
$conn = new mysqli($host, $username, $password, $database);

// Memeriksa apakah koneksi berhasil
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Fungsi untuk menghindari SQL injection
function escape_string($string)
{
    global $conn;
    return $conn->real_escape_string($string);
}
?>