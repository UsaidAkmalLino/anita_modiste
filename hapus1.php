<?php
require_once("koneksi.php"); // Memasukkan file koneksi.php untuk mengatur koneksi database

// Membuat koneksi ke database
$koneksi = new mysqli($host, $username, $password, $database);

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Menerima ID Admin dari parameter GET
if (isset($_GET['id_admin'])) {
    $id_admin = $_GET['id_admin'];

    // Query SQL penghapusan sesuai dengan struktur tabel Anda
    $sql = "DELETE FROM user WHERE id_admin = $id_admin";

    if ($koneksi->query($sql) === TRUE) {
        // Jika penghapusan berhasil, kirim respons dengan status 200 OK
        http_response_code(200);
        echo "Data admin dengan ID Admin $id_admin berhasil dihapus.";
    } else {
        // Jika terjadi kesalahan, kirim respons dengan status 500 Internal Server Error
        http_response_code(500);
        echo "Gagal menghapus data admin: " . $koneksi->error;
    }
} else {
    // Jika parameter ID Admin tidak diterima, kirim respons dengan status 400 Bad Request
    http_response_code(400);
    echo "Parameter ID Admin tidak valid.";
}

$koneksi->close(); // Tutup koneksi database setelah selesai
?>