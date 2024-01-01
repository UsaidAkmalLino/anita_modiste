<?php
require_once("koneksi.php");

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pesan = $_POST["id_pesan"];
    $customer_name = $_POST["customer_name"];
    $customer_address = $_POST["customer_address"];
    $nomer_telepon = $_POST["nomer_telepon"];
    $desain = $_POST["desain"];
    $bahan = $_POST["bahan"];
    $ukuran = $_POST["ukuran"];
    $jumlah = $_POST["jumlah"];
    $status = $_POST["status"];

    $query = "UPDATE pesanan_jahitan SET customer_name='$customer_name', customer_address='$customer_address', nomer_telepon='$nomer_telepon', desain='$desain', bahan='$bahan', ukuran='$ukuran', jumlah='$jumlah', status='$status' WHERE id_pesan=$id_pesan";

    if (mysqli_query($koneksi, $query)) {
        echo "Data berhasil diperbarui.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
?>