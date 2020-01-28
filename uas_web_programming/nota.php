<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Nota Pembelian</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap4.css">
</head>
<body>
<header>
    <div class="woy">
      <div class="logo">
        <img src="lapar.jpeg">        
      </div>
      <ul class="main-nav">
        <li><a href="home.php">Home</a></li>
        <li><a href="food.php">Menu</a></li>
        <li><a href="keranjang.php">Keranjang</a></li>
        <?php if (isset($_SESSION["pelanggan"])): ?>
        <li><a href="riwayat.php">Riwayat</a></li>
        <?php endif ?>
        <li><a href="about.php">About Us</a></li>
        <li><a href="info.php">Info</a></li>
        <li><a href="out.php">Logout</a></li>
      </ul>

      <section class="konten">
      	<div class="container">
      		
      		<h2>Detail Pembelian</h2>
      		<br><br><br><br><br>
<?php
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>


<?php
$idpelangganyangbeli = $detail["id_pelanggan"];
$idpelangganyanglogin = $_SESSION["pelanggan"]["id_pelanggan"];
if ($idpelangganyangbeli!==$idpelangganyanglogin) {
	echo "<script>alert('jangan nakal');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}

?>
<div class="row">
	<div class="col-md-4">
		<h3>Pembelian</h3>
		<strong>No. Pembelian: <?php echo $detail['id_pembelian'] ?></strong><br>
		Tanggal: <?php echo $detail['tanggal_pembelian']; ?><br>
		Total: Rp. <?php echo number_format($detail['total_pembelian']) ?>
	</div>
		<div class="col-md-4">
			<h3>Pelanggan</h3>
			<strong><?php echo $detail['nama_pelanggan']; ?></strong><br>
			<p>
			<?php echo $detail['telepon_pelanggan']; ?> <br>
			<?php echo $detail['email_pelanggan']; ?>
			</p>		
		</div>
		<div class="col-md-4">
		<h3>Pengiriman</h3>
		<Strong>
Alamat: <?php echo $detail['alamat_pengiriman'] ?></Strong>	
		</div>		
	</div>	
</div>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
		<?php while ($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama']; ?></td>
			<td>Rp. <?php echo number_format($pecah['harga']); ?></td>
			<td><?php echo $pecah['jumlah']; ?></td>
			<td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>

<div class="row">
	<div class="col-md-7">
		<div class="alert alert-info">
			<p>
				Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']) ;?> <br>
				<strong>BANK BNI 123-031423-1441 Waroeng Lapar</strong>
			</p>
		</div>
	</div>
</div>

      	</div>
      </section>
</body>
</html>