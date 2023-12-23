<?php
// Sambungkan ke file koneksi.php
require_once("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai yang dikirimkan melalui form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Hindari SQL injection dengan menggunakan fungsi escape_string
    $username = escape_string($username);
    $password = escape_string($password);

    // Query untuk memeriksa apakah username dan password cocok di database
    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);


    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if ($row["akses"] == "admin") {
            // Login berhasil untuk admin, redirect ke halaman admin
            header("Location: tambah-pesanan.html"); // Ganti "admin_dashboard.php" dengan halaman admin yang sesuai
            exit();
        } elseif ($row["akses"] == "karyawan") {
            // Login berhasil untuk user biasa, redirect ke halaman user
            header("Location: karyawan.php"); // Ganti "user_dashboard.php" dengan halaman user yang sesuai
            exit();
        } else {
            // Nilai kolom akses tidak valid, tindakan yang sesuai (contohnya, menampilkan pesan kesalahan)
            echo "Akses tidak valid.";
        }
    } else {
        // Tidak ada hasil yang cocok, tindakan yang sesuai (contohnya, menampilkan pesan kesalahan)
        echo "Login gagal.";
    }
}

// Tutup koneksi ke database
$conn->close();
?>