<html>

<head>


</head>

<body>
    <table>
        <?php
        // Sambungan ke database
        require_once("koneksi.php");
        $koneksi = new mysqli($host, $username, $password, $database);

        // Cek koneksi
        if ($koneksi->connect_error) {
            die("Koneksi gagal: " . $koneksi->connect_error);
        }

        // Mendapatkan ID pesanan dari URL
        $id_pesanan = isset($_GET['id']) ? $_GET['id'] : '';

        // Gunakan prepared statement untuk query
        $sql = "SELECT * FROM pesanan_jahitan WHERE id_pesan = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("s", $id_pesanan);
        $stmt->execute();
        $result = $stmt->get_result();

        // Cek apakah hasilnya ada
        if ($result->num_rows > 0) {
            // output data setiap baris
            while ($row = $result->fetch_assoc()) {
                echo "Desain: " . $row["desain"] . "<br>";
                echo "Bahan: " . $row["bahan"] . "<br>";
                echo "Ukuran: " . $row["ukuran"] . "<br>";
                echo "Jumlah: " . $row["jumlah"] . "<br>";

                // Tambahkan lebih banyak detail pesanan sesuai kebutuhan
            }
        } else {
            echo "Tidak ada pesanan yang ditemukan";
        }

        // Tutup koneksi
        $stmt->close();
        $koneksi->close();
        ?>
    </table>
    <a href="data-pesanan.php">Kembali ke Daftar Pesanan</a>
</body>


</html>