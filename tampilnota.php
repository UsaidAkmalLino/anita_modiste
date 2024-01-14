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
	<link rel="stylesheet" href="css/nota3.css">
	<link rel="stylesheet" href="css/tambah-pesanan.css">
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
			<h2>Daftar Nota</h2>
			<div class="container">
				<table>
					<tr>
						<th>ID_Pesanan</th>
						<th>Nama Pelanggan</th>
						<th>Biaya Bahan</th>
						<th>Biaya Jasa</th>
						<th>Total</th>
						<th>Tanggal</th>


						<!-- Add this column for the update button -->
					</tr>
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
							echo "<td><a class='tombol' href='detail_nota.php?id_nota=" . $row["id_nota"] . "'>Cetak Nota</a></td>";
							echo "</tr>";
						}
					} else {
						echo "0 results";
					}
					?>
				</table>
			</div>
		</div>
	</div>
</body>

</html>