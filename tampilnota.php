<?php
require_once("koneksi.php");
$koneksi = new mysqli($host, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mempersiapkan perintah SQL untuk mengambil data
$sql = "SELECT * FROM tabel_nota ORDER BY tanggal DESC";
$result = $conn->query($sql);

// Menutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Daftar Nota</title>
</head>

<body>
    <h2>Daftar Nota</h2>

    <?php
    if ($result->num_rows > 0) {
        // output data dari setiap baris
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["no_nota"] . "</td>";
            echo "<td>" . $row["nama_customer"] . "</td>";
            echo "<td>" . $row["biaya_bahan"] . "</td>";
            echo "<td>" . $row["biaya_jasa"] . "</td>";
            echo "<td>" . $row["total"] . "</td>";
            echo "<td>" . $row["tanggal"] . "</td>";
            echo " <a href='detail_nota.php?id_nota=" . $row["id_nota"] . "'>Cetak Nota</a><br>";
            echo "</tr>";
        }
    } else {
        echo "0 results";
    }
    ?>
</body>

</html>