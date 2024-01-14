<?php
// Koneksi ke database
require_once("koneksi.php");

// Membuat koneksi
$koneksi = mysqli_connect($host, $username, $password, $database);

// Cek koneksi
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

// Menangani form ketika di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no_nota = $_POST['no_nota'];
    $nama_customer = $_POST['nama_customer'];
    $biaya_bahan = $_POST['biaya_bahan'];
    $biaya_jasa = $_POST['biaya_jasa'];
    $total = $biaya_bahan + $biaya_jasa; // Menghitung total secara otomatis
    $tanggal = $_POST['tanggal'];

    // Mempersiapkan perintah SQL untuk memasukkan data
    $sql = "INSERT INTO tabel_nota (no_nota, nama_customer, biaya_bahan, biaya_jasa, total, tanggal) VALUES (?, ?, ?, ?, ?, ?)";

    // Mempersiapkan prepared statement
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssiiis", $no_nota, $nama_customer, $biaya_bahan, $biaya_jasa, $total, $tanggal);

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
$koneksi->close();
?>


<!-- Form HTML untuk input data nota -->
<!DOCTYPE html>
<html>

<head>
    <title>Input Nota</title>
    <link rel="stylesheet" href="css/nota1.css">
    <link rel="stylesheet" href="css/tambah-pesanan.css">
    <script>
        function calculateTotal() {
            var biayaBahan = parseFloat(document.getElementById('biaya_bahan').value) || 0;
            var biayaJasa = parseFloat(document.getElementById('biaya_jasa').value) || 0;
            var total = biayaBahan + biayaJasa;
            document.getElementById('total').value = total;
        }
    </script>
</head>

<body>
    <div class="dashboard">
        <div class="sidebar">
            <!-- Sidebar content -->
            <h2>ADMIN</h2>
            <hr width="200px">
            <div class="menu">
                <a href="tambah-pesanan.html" class="active">Pesanan Jahitan</a>
                <a href="data-pesanan.php" class="active">Data Jahitan</a>
                <a href="tambah-penjahit.html" class="active">Tambah Penjahit</a>
                <a href="data-penjahit.php" class="active">Data Penjahit</a>
                <a href="nota.php" class="active">Nota Pesanan</a>
                <a href="tampilnota.php" class="active">Daftar Nota</a>
                <a href="logout.php" class="active">Keluar</a>
            </div>
            <!-- Other sidebar items -->
        </div>
        <div class="main-content">
            <div class="container">
                <h2>Input Nota</h2>
                <form method="post" action="nota.php">
                    <label for="no_nota">Nomor Nota:</label>
                    <input type="text" name="no_nota" required><br>

                    <label for="nama_customer">Nama Customer:</label>
                    <input type="text" name="nama_customer" required><br>

                    <label for="biaya_bahan">Biaya Bahan:</label>
                    <input type="number" id="biaya_bahan" name="biaya_bahan" required oninput="calculateTotal()"><br>

                    <label for="biaya_jasa">Biaya Jasa:</label>
                    <input type="number" id="biaya_jasa" name="biaya_jasa" required oninput="calculateTotal()"><br>

                    <label for="total">Total:</label>
                    <input type="number" id="total" name="total" required readonly><br>

                    <label for="tanggal">Tanggal:</label>
                    <input type="date" name="tanggal" required><br>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
        <div>
</body>

</html>