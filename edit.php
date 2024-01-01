<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pesanan</title>
</head>

<body>
    <h3>Edit Pesanan</h3>
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
            <form id="editForm" method="POST">
                <input type="hidden" name="id_pesan" value="<?php echo $row["id_pesan"]; ?>">
                Nama Pelanggan: <input type="text" name="customer_name" value="<?php echo $row["customer_name"]; ?>"><br>
                Alamat Pelanggan: <input type="text" name="customer_address"
                    value="<?php echo $row["customer_address"]; ?>"><br>
                Nomer Telepon: <input type="text" name="nomer_telepon" value="<?php echo $row["nomer_telepon"]; ?>"><br>
                Desain: <input type="text" name="desain" value="<?php echo $row["desain"]; ?>"><br>
                Bahan: <input type="text" name="bahan" value="<?php echo $row["bahan"]; ?>"><br>
                Ukuran: <input type="text" name="ukuran" value="<?php echo $row["ukuran"]; ?>"><br>
                Jumlah: <input type="text" name="jumlah" value="<?php echo $row["jumlah"]; ?>"><br>
                Status: <input type="text" name="status" value="<?php echo $row["status"]; ?>"><br>
                <input type="button" value="Simpan" onclick="updateData()">
            </form>

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
</body>

</html>