<?php
require_once("koneksi.php");
$koneksi = new mysqli($host, $username, $password, $database);

if (isset($_GET['id_nota'])) {
    $id_nota = $_GET['id_nota'];

    // Cek koneksi
    if ($koneksi->connect_error) {
        die("Connection failed: " . $koneksi->connect_error);
    }

    // Mempersiapkan perintah SQL untuk mengambil data nota tertentu
    $sql = "SELECT * FROM tabel_nota WHERE id_nota = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id_nota);
    $stmt->execute();
    $result = $stmt->get_result();
    $nota = $result->fetch_assoc();

    // Menutup koneksi
    $koneksi->close();
    ?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Detail Nota</title>
        <script>
            function cetakNota() {
                window.print();
            }
        </script>
    </head>

    <body>
        <h2>Detail Nota</h2>
        <?php
        if ($nota) {
            echo "no_nota: " . $nota["no_nota"] . "<br>nama_customer: " . $nota["nama_customer"] . "<br>biaya_bahan: " . $nota["biaya_bahan"] . "<br>biaya_jasa: " . $nota["biaya_jasa"] . "<br>total: " . $nota["total"] . "<br>tanggal: " . $nota["tanggal"] . "<br>";

        } else {
            echo "Nota tidak ditemukan";
        }
        ?>
        <button onclick="cetakNota()">Cetak Nota</button>
    </body>

    </html>

    <?php
}
?>