<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Penjahit</title>
    <link rel="stylesheet" href="css/tambah-pesanan.css">
    <link rel="stylesheet" href="css/edit.css">
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
            <hr width="200px" size="3px" color="white" align="center">
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
            <h3>Edit Pesanan</h3>
            <div class="form-container">
                <form action="update-penjahit.php" method="post">
                    <?php
                    // Sambungkan ke database
                    require_once("koneksi.php");
                    $koneksi = mysqli_connect($host, $username, $password, $database);

                    if (!$koneksi) {
                        die("Koneksi gagal: " . mysqli_connect_error());
                    }

                    // Ambil data penjahit berdasarkan id_admin
                    $id_admin = $_GET['id_admin'];
                    $query = "SELECT * FROM user WHERE id_admin = '$id_admin'";
                    $result = mysqli_query($koneksi, $query);
                    $row = mysqli_fetch_assoc($result);

                    // Isi form dengan data yang ada
                    echo "<input type='hidden' name='id_admin' value='" . $row['id_admin'] . "'>";
                    echo "Username: <input type='text' name='username' value='" . $row['username'] . "'><br>";
                    echo "Password: <input type='password' name='password' value='" . $row['password'] . "'><br>";
                    echo "Akses: <input type='text' name='akses' value='" . $row['akses'] . "'><br>";
                    echo "Nama Penjahit: <input type='text' name='nama' value='" . $row['nama'] . "'><br>";
                    echo "Alamat: <input type='text' name='alamat' value='" . $row['alamat'] . "'><br>";
                    echo "No Telepon: <input type='text' name='no_telepon' value='" . $row['no_telepon'] . "'><br>";

                    // Tutup koneksi
                    mysqli_close($koneksi);
                    ?>
                    <input type="submit" value="Update Data">
                </form>
            </div>
        </div>
    </div>
</body>

</html>