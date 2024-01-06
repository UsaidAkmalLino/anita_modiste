<?php
// Koneksi ke database
require_once("koneksi.php");
// Membuat koneksi
$koneksi = mysqli_connect($host, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Menangani form ketika di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no_nota = $_POST['no_nota'];
    $nama_customer = $_POST['nama_customer'];
    $biaya_bahan = $_POST['biaya_bahan'];
    $biaya_jasa = $_POST['biaya_jasa'];
    $total = $_POST['total'];
    $tanggal = $_POST['tanggal'];

    // Mempersiapkan perintah SQL untuk memasukkan data
    $sql = "INSERT INTO tabel_nota (no_nota, nama_customer, biaya_bahan, biaya_jasa, total, tanggal) VALUES (?, ?, ?, ?, ?, ?)";

    // Mempersiapkan prepared statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $no_nota, $nama_customer, $biaya_bahan, $biaya_jasa, $total, $tanggal);

    // Menjalankan perintah SQL
    if ($stmt->execute()) {
        echo "Nota berhasil ditambahkan!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Menutup statement
    $stmt->close();
}

// Menutup koneksi
$conn->close();
?>

<!-- Form HTML untuk input data nota -->
<!DOCTYPE html>
<html>

<head>
    <title>Input Nota</title>
</head>

<body>
    <h2>Input Nota</h2>
    <form method="post" action="nota.php">
        <label for="no_nota">Nomor Nota:</label>
        <input type="text" name="no_nota" required><br>

        <label for="nama_customer">Nama Customer:</label>
        <input type="text" name="nama_customer" required><br>

        <label for="biaya_bahan">Biaya Bahan:</label>
        <input type="number" name="biaya_bahan" required><br>

        <label for="biaya_jasa">Biaya Jasa:</label>
        <input type="number" name="biaya_jasa" required><br>

        <label for="total">Total:</label>
        <input type="number" name="total" required><br>

        <label for="tanggal">Tanggal:</label>
        <input type="date" name="tanggal" required><br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>