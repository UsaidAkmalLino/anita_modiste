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
    <!-- Tambahkan CSS Anda di sini -->
</head>

<body>
    <!-- Tambahkan struktur HTML Anda di sini -->
    <table>
        <tr>
            <th>ID Pesanan</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["id_pesan"] . "</td>";
            echo "<td>" . $row["customer_name"] . "</td>";
            echo "<td>" . $row["customer_address"] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>

<?php
mysqli_close($koneksi);
?>