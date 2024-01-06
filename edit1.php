<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Penjahit</title>
    <link rel="stylesheet" href="css/your-style.css"> <!-- Link to your CSS file -->
    <!-- Other head elements -->
</head>

<body>
    <div class="edit-form-container">
        <h2>Edit Data Penjahit</h2>
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
</body>

</html>