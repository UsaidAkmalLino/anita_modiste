<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Jahitan</title>
    <link rel="stylesheet" href="css/nota3.css">
    <link rel="stylesheet" href="css/tambah-pesanan.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Lobster+Two&display=swap"
        rel="stylesheet">
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
            </div>
            <!-- Other sidebar items -->
        </div>
        <div class="main-content">
		<h3>Data Jahitan</h3>
            <div class="form-container">
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
                echo "<tr>" ."<th>" . "Desain" . "</th>";
                echo "<th>" . "Bahan" . "</th>";
                echo "<th>" . "Ukuran" . "</th>";
                echo "<th>" . "Jumlah" . "</th>" . "</tr>";
				
				
                echo "<tr>" ."<td>" . $row["desain"] . "</td>";
                echo "<td>" . $row["bahan"] . "</td>";
                echo "<td>" . $row["ukuran"] . "</td>";
                echo "<td>" . $row["jumlah"] . "</td>" . "<tr>";

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
    <a class='tombol' href="data-pesanan.php">Kembali ke Daftar Pesanan</a>
	</div>
	</div>
	</div>
</body>


</html>