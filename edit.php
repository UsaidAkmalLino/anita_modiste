<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pesanan</title>
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
            <?php
            require_once("koneksi.php");

            $koneksi = mysqli_connect($host, $username, $password, $database);

            if (!$koneksi) {
                die("Koneksi ke database gagal: " . mysqli_connect_error());
            }

            if (isset($_GET["id"])) {
                $id_pesan = $_GET["id"];
                $query = "SELECT * FROM pesanan_jahitan WHERE id_pesan = $id_pesan";
                $result = mysqli_query($koneksi, $query);

                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <h3>Edit Pesanan</h3>
                    <div class="form-container">
                        <form id="editForm" method="POST">
                            <div class="form-section">
                                <input type="hidden" name="id_pesan" value="<?php echo $row["id_pesan"]; ?>">
                                Nama Pelanggan: <input type="text" name="customer_name"
                                    value="<?php echo $row["customer_name"]; ?>"><br>
                                Alamat Pelanggan: <input type="text" name="customer_address"
                                    value="<?php echo $row["customer_address"]; ?>"><br>
                                Nomer Telepon: <input type="text" name="nomer_telepon"
                                    value="<?php echo $row["nomer_telepon"]; ?>"><br>
                                Desain: <input type="text" name="desain" value="<?php echo $row["desain"]; ?>"><br>
                                Bahan: <input type="text" name="bahan" value="<?php echo $row["bahan"]; ?>"><br>
                                Ukuran: <input type="text" name="ukuran" value="<?php echo $row["ukuran"]; ?>"><br>
                                Jumlah: <input type="text" name="jumlah" value="<?php echo $row["jumlah"]; ?>"><br>
                                Status: <input type="text" name="status" value="<?php echo $row["status"]; ?>"><br>
                                <div class="form-actions">
                                    <input type="button" value="Simpan" onclick="updateData()">
                                </div>
                            </div>
                        </form>
                    </div>
                    <script>
                        function updateData() {
                            var form = document.getElementById("editForm");
                            var formData = new FormData(form);

                            var xhr = new XMLHttpRequest();
                            xhr.open("POST", "update.php", true);
                            xhr.onreadystatechange = function () {
                                if (xhr.readyState === 4 && xhr.status === 200) {
                                    var response = xhr.responseText;
                                    alert(response); // Tampilkan pesan sukses atau pesan kesalahan
                                }
                            };
                            xhr.send(formData);
                        }
                    </script>
                    <?php
                } else {
                    echo "Data tidak ditemukan.";
                }
            } else {
                echo "ID Pesanan tidak valid.";
            }
            ?>
        </div>
    </div>
</body>

</html>