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

	$bahan = $nota["biaya_bahan"];
	$jasa = $nota["biaya_jasa"];
	$total = $nota["total"];


	function rupiah($angka)
	{

		$hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
		return $hasil_rupiah;

	}
	function penyebut($nilai)
	{
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " " . $huruf[$nilai];
		} else if ($nilai < 20) {
			$temp = penyebut($nilai - 10) . " belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai / 1000000000) . " milyar" . penyebut(fmod($nilai, 1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai / 1000000000000) . " trilyun" . penyebut(fmod($nilai, 1000000000000));
		}
		return $temp;
	}

	function terbilang($nilai)
	{
		if ($nilai < 0) {
			$hasil = "minus " . trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}
		return $hasil;
	}

	?>
	<!DOCTYPE html>
	<html>

	<head>
		<title>Faktur Pembayaran</title>
		<style>
			#tabel {
				font-size: 15px;
				border-collapse: collapse;
			}

			#tabel td {
				padding-left: 5px;
				border: 1px solid black;


			}
		</style>
	</head>

	<body style='font-family:tahoma; font-size:8pt;'>
		<center>
			<table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border='0'>
				<td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
					<span style='font-size:12pt'><b>Anita Modiste Tailor</b></span></br>
					Slogan : Melayani Sepenuh Hati
					</br>
					Alamat : Jln Raya Dandong
				</td>
				<td style='vertical-align:top' width='30%' align='left'>
					<b><span style='font-size:12pt'>FAKTUR PENJUALAN</span></b></br>
					Kepada Yth. :
					<?= $nota["nama_customer"] ?></br>
					Tanggal :
					<?= $nota["tanggal"] ?></br>
				</td>
			</table>
			<table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border='0'>
				<td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
					Tlp : -
				</td>
				<td style='vertical-align:top' width='30%' align='left'>
					No Telp : -
				</td>
			</table>
			<table cellspacing='0' style='width:550px; font-size:8pt; font-family:calibri;  border-collapse: collapse;'
				border='1'>

				<tr align='center'>
					<td width='10%'>Kode Barang</td>
					<td width='15%'>Nama Barang</td>
					<td width='13%'>Harga Bahan</td>
					<td width='13%'>Harga Jasa</td>
					<td width='18%'>Keterangan</td>
					<td width='13%'>Total Harga</td>
				<tr>
					<td>
						<?= $nota["no_nota"] ?>
					</td>
					<td>Jahitan</td>
					<td>
						<?= rupiah($bahan) ?>
					</td>
					<td>
						<?= rupiah($jasa) ?>
					</td>
					<td></td>
					<td style='text-align:right'>
						<?= rupiah($total) ?>
					</td>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td style='text-align:right'></td>
				</tr>

				<tr>
					<td colspan='5'>
						<div style='text-align:right'>Qty : </div>
					</td>
					<td style='text-align:right'>1</td>
				</tr>
				<tr>
					<td colspan='5'>
						<div style='text-align:right'>Diskon : </div>
					</td>
					<td style='text-align:right'>Rp0</td>
				</tr>
				<tr>
					<td colspan='5'>
						<div style='text-align:right'>PPN : </div>
					</td>
					<td style='text-align:right'>Rp0</td>
				</tr>
				<tr>
					<td colspan='5'>
						<div style='text-align:right'>Total : </div>
					</td>
					<td style='text-align:right'>
						<?= rupiah($total) ?>
					</td>
				</tr>
				<tr>
			</table>
			<td colspan='6'>
				<div style='text-align:center'>Terbilang :
					<?= terbilang($total) ?>
				</div>
			</td>
			<table style='width:650; font-size:7pt;' cellspacing='2'>
				<tr>
					<td align='center'>Diterima Oleh,</br></br><u>(............)</u></td>

				</tr>
			</table>
		</center>



	</body>
	<script>

		window.print();

	</script>

	</html>

	<?php
}
?>