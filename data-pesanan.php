<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Dashboard</title>
    <link rel="stylesheet" href="css/data-pesanan.css">
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
                <a href="logout.php" class="active">Keluar</a>
            </div>
            <!-- Other sidebar items -->
        </div>
        <div class="main-content">
            <h3>Data Jahitan</h3>
            <div class="form-container">
                <?php
                require_once("koneksi.php");

                $koneksi = mysqli_connect($host, $username, $password, $database);

                if (!$koneksi) {
                    die("Koneksi ke database gagal: " . mysqli_connect_error());
                }

                $query = "SELECT * FROM pesanan_jahitan";
                $result = mysqli_query($koneksi, $query);
                ?>
                <html>

                <head>
                    <script>
                        function updateStatus(id_pesan) {
                            var new_status = "Selesai"; // Ubah status sesuai kebutuhan

                            var xhr = new XMLHttpRequest();
                            xhr.open("POST", "updatestatus.php", true);
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
                    <!-- Tambahkan struktur HTML Anda di sini -->
                    <table>
                        <tr>
                            <th>ID Pesanan</th>
                            <th>Nama Pelanggan</th>
                            <th>Alamat Pelanggan</th>
                            <th>Nomer Telepon</th>
                            <th>Status</th>
                            <th>Action</th>
                            <th>Edit</th>
                            <th>Pesanan</th>

                            <!-- Add this column for the update button -->
                        </tr>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["id_pesan"] . "</td>";
                            echo "<td>" . $row["customer_name"] . "</td>";
                            echo "<td>" . $row["customer_address"] . "</td>";
                            echo "<td>" . $row["nomer_telepon"] . "</td>";
                            echo "<td>" . $row["status"] . "</td>";
                            echo "<td><a href='updatestatus.php?id=" . $row["id_pesan"] . "'>Selesai</a></td>";
                            echo "<td><a href='edit.php?id=" . $row["id_pesan"] . "'>Edit</a></td>";
                            echo "<td><a href='view_order.php?id=" . $row["id_pesan"] . "'>Lihat Pesanan</a></td>";

                            echo "</tr>";
                        }
                        ?>
                    </table>
                </body>

                </html>
            </div>
        </div>
    </div>
</body>

</html>