<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Dashboard</title>
    <link rel="stylesheet" href="css/tambah-pesanan.css">
</head>

<body>
    <div class="dashboard">
        <div class="sidebar">
            <!-- Sidebar content -->
            <h2>ADMIN</h2>
            <a href="tambah-pesanan.html" class="active">Pesanan Jahitan</a>
            <a href="data-pesanan.php" class="active">Data Jahitan</a>
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
                    <style>
                        /* CSS untuk tabel */
                        table {
                            width: 100%;
                            border-collapse: collapse;
                            margin-top: 20px;
                        }

                        table,
                        th,
                        td {
                            border: 1px solid black;
                        }

                        th,
                        td {
                            padding: 8px;
                            text-align: left;
                        }

                        th {
                            background-color: #f2f2f2;
                        }

                        /* CSS untuk div container */
                        .data-container {
                            width: 80%;
                            margin: 0 auto;
                            margin-top: 20px;
                            border: 1px solid #ccc;
                            padding: 20px;
                            border-radius: 5px;
                            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
                        }

                        .data-container h1 {
                            font-size: 24px;
                            margin-bottom: 10px;
                        }

                        /* CSS untuk baris data */
                        .data-row {
                            display: flex;
                            justify-content: space-between;
                            border-bottom: 1px solid #ccc;
                            padding: 5px 0;
                        }

                        .data-row:last-child {
                            border-bottom: none;
                        }

                        .data-row div {
                            flex: 1;
                        }
                    </style>
                </head>

                <body>
                    <!-- Tambahkan struktur HTML Anda di sini -->
                    <table>
                        <tr>
                            <th>ID Pesanan</th>
                            <th>Nama Pelanggan</th>
                            <th>Alamat Pelanggan</th>
                            <th>Nomer Telepon</th>
                        </tr>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["id_pesan"] . "</td>";
                            echo "<td>" . $row["customer_name"] . "</td>";
                            echo "<td>" . $row["customer_address"] . "</td>";
                            echo "<td>" . $row["nomer_telepon"] . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </body>

                </html>

                <?php
                mysqli_close($koneksi);
                ?>


            </div>


        </div>

    </div>
</body>

</html>