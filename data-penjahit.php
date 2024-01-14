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
        <h3>Data Penjahit</h3> <br>
        <hr class="garis" size="2px" noshade="">
        <div class="content">
            <table>
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Akses</th>
                    <th>Nama Penjahit</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Action</th>
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
                    echo "<tr id='row-" . $row['id_admin'] . "'>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['password'] . "</td>";
                    echo "<td>" . $row['akses'] . "</td>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td>" . $row['alamat'] . "</td>";
                    echo "<td>" . $row['no_telepon'] . "</td>";
                    echo "<td><button onclick=\"editData('" . $row['id_admin'] . "')\">Edit</button> <button onclick=\"hapusData('" . $row['id_admin'] . "')\">Hapus</button></td>";
                    echo "</tr>";
                }

                // Tutup koneksi
                mysqli_close($koneksi);
                ?>
            </table>
            <script>
                function editData(id_admin) {
                    // Tambahkan kode JavaScript untuk mengedit data di sini, misalnya dengan mengarahkan ke halaman edit
                    window.location.href = 'edit1.php?id_admin=' + id_admin;
                }


                function hapusData(id_admin) {
                    if (confirm('Apakah Anda yakin ingin menghapus data dengan ID Admin: ' + id_admin + '?')) {
                        // Create an AJAX request
                        var xhr = new XMLHttpRequest();
                        xhr.open("GET", "hapus1.php?id_admin=" + id_admin, true);
                        xhr.onload = function () {
                            if (this.status == 200) {
                                // Handle the response
                                alert("Data berhasil dihapus"); // Menambahkan tanda kutip yang hilang
                            }
                        };
                        xhr.send();
                    }
                }


            </script>
        </div>
    </div>
</body>

</html>