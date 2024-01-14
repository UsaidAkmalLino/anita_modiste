<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Dashboard</title>
    <link rel="stylesheet" href="css/data-penjahit.css">
    <link rel="stylesheet" href="css/data-pesanan.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Lobster+Two&display=swap"
        rel="stylesheet">


    <script>
        function updateStatus(id_pesan) {
            var new_status = "Proses"; // Ubah status sesuai kebutuhan

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "karyawan.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = xhr.responseText;
                    alert(response); // Tampilkan pesan sukses atau pesan kesalahan
                }
            };
            xhr.send("id_pesan=" + id_pesan + "&new_status=" + new_status);
        }
    </script>

</head>

<body>
    <div class="dashboard">
        <div class="sidebar">
            <!-- Sidebar content -->
            <h2>Karyawan</h2>
            <hr width="200px">
            <div class="menu">
                <a href="karyawan.php" class="active">Daftar Pesanan Jahitan</a>
                <!-- Other sidebar items -->
            </div>
        </div>
        <div class="content">
            <table>
                <tr>
                    <th>ID Pesanan</th>

                    <th>Desain</th>
                    <th>Bahan</th>
                    <th>Ukuran</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                <?php
                // Sambungan ke database
                require_once("koneksi.php");
                $koneksi = new mysqli($host, $username, $password, $database);

                // Cek koneksi
                if ($koneksi->connect_error) {
                    die("Koneksi gagal: " . $koneksi->connect_error);
                }

                // Query
                $sql = "SELECT * FROM pesanan_jahitan";
                $stmt = $koneksi->prepare($sql);
                $stmt->execute();
                $result = $stmt->get_result();

                // Menampilkan hasil query
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id_pesan"] . "</td>";
                        echo "<td>" . $row["desain"] . "</td>";
                        echo "<td>" . $row["bahan"] . "</td>";
                        echo "<td>" . $row["ukuran"] . "</td>";
                        echo "<td>" . $row["jumlah"] . "</td>";
                        echo "<td>" . $row["status"] . "</td>";
                        echo "<td><a href='updatestatus1.php?id=" . $row["id_pesan"] . "'>Selesai</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>Tidak ada pesanan yang ditemukan</td></tr>";
                }

                $stmt->close();
                $koneksi->close();
                ?>
            </table>
        </div>
    </div>
</body>

</html>