<?php
session_start();


include 'koneksi.php';


if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
	echo "<script>alert('keranjang kosong, silahkan belanja dulu');</script>";
	echo "<script>location='food.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Keranjang belanja</title>
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
        <li class="active"><a href="keranjang.php">Keranjang</a></li>
        <?php if (isset($_SESSION["pelanggan"])): ?>
        <li><a href="riwayat.php">Riwayat</a></li>
        <?php endif ?>
        <li><a href="about.php">About Us</a></li>
        <li><a href="info.php">Info</a></li>
        <?php if (isset($_SESSION["pelanggan"])): ?>
        	<li><a href="out.php">Logout</a></li>
        	<?php else: ?>
        	<li><a href="in.php">Login</a></li>
        	<?php endif ?>
      </ul>
	<div><br><br><br><br><br><br></div>
	<section class="konten">
		<div class="container">
			<h1>Keranjang Belanja</h1>
			<hr>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Produk</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Sub harga</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor=1; ?>
					<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
					<?php
					$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
					$pecah = $ambil->fetch_assoc();
					$subharga = $pecah["harga_produk"]*$jumlah;
			
					?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $pecah["nama_produk"]; ?></td>
						<td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
						<td><?php echo $jumlah; ?></td>
						<td>Rp. <?php echo number_format($subharga); ?></td>
						<td>
							<a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" class="btn btn-danger btn-xs">Hapus</a>
						</td>
					</tr>
					<?php $nomor++; ?>
				<?php endforeach ?>
				</tbody>
			</table>

			<a href="food.php" class="btn btn-default">Lanjutkan Belanja</a>
			<a href="checkout.php" class="btn btn-primary">Checkout</a>
		</div>
	</section>



</body>
</html>