<?php
require_once("koneksi.php");

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id_pesan = $_GET['id'];

    // Assuming you have a column named 'status' in your 'pesanan_jahitan' table
    $new_status = "pesanan sudah jadi";

    // Update the status of the order
    $update_query = "UPDATE pesanan_jahitan SET status = '$new_status' WHERE id_pesan = $id_pesan";

    if (mysqli_query($koneksi, $update_query)) {
        echo "Status updated successfully!";
        header('Location:karyawan.php');
    } else {
        echo "Error updating status: " . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
?>