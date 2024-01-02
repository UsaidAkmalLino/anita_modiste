<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Dashboard</title>
    <link rel="stylesheet" href="css/data-penjahit.css">
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
                <a href="nota.html" class="active">Nota Pesanan</a>
            </div>
            <!-- Other sidebar items -->
        </div>
        <h3>Data Penjahit</h3> <br>
        <hr class="garis" size="2px" noshade="">
        <div class="content">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nama Penjahit</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                </tr>
                <?php
                // Sambungkan ke database MySQL
                require_once("koneksi.php");

                $koneksi = mysqli_connect($host, $username, $password, $database);

                if (!$koneksi) {
                    die("Koneksi ke database gagal: " . mysqli_connect_error());
                }

                // Buat query SQL untuk mengambil data penjahit
                $query = "SELECT * FROM user";

                // Eksekusi query
                $result = mysqli_query($koneksi, $query);

                // Loop untuk menampilkan data
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id_admin'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['password'] . "</td>";
                    echo "<td>" . $row['akses'] . "</td>";
                    echo "</tr>";
                }

                // Tutup koneksi
                mysqli_close($koneksi);
                ?>
            </table>
        </div>
    </div>
</body>

</html>