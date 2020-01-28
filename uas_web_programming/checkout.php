<?php 
session_start();

include 'koneksi.php';

if (!isset($_SESSION["pelanggan"])) 
{
	echo "<script>alert('Silahkan Login');</script>";
	echo "<script>location='in.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Checkout</title>
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
        <li><a href="food.php">Menu</a>
        </li>
        <li><a href="keranjang.php">Keranjang</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="info.php">Info</a></li>
        <li class="active"><a href="checkout.php">Checkout</a></li>
        <?php if (isset($_SESSION["pelanggan"])): ?>
        	<li><a href="out.php">Logout</a></li>
        	<?php else: ?>
        	<li><a href="in.php">Login</a></li>
        	<?php endif ?>
      </ul>
      <div><br><br><br><br><br></div>

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
					</tr>
				</thead>
				<tbody>
					<?php $nomor=1; ?>
					<?php $totalbelanja = 0; ?>
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
					</tr>
					<?php $nomor++; ?>
					<?php $totalbelanja+=$subharga; ?>
				<?php endforeach ?>
				</tbody>
				<tfoot>
					<tr>
						<th colspan="4">Total Belanja</th>
						<th>Rp. <?php echo number_format($totalbelanja) ?></th>
					</tr>
				</tfoot>
			</table>

			<form method="post">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<input type="text" readonly value="<?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?>" class="form-control">					
						</div>					
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<input type="text" readonly value="<?php echo $_SESSION['pelanggan']['telepon_pelanggan'] ?>" class="form-control">					
						</div>	
				</div>
				<button class="btn btn-primary" name="checkout">Checkout</button>
			</form>
			<div><br></div>
			<div class="form-group">
				<label>Alamat Lengkap Pengiriman</label>
				<textarea class="form-control" name="alamat_pengiriman" placeholder="masukkan alamat lengkap pengiriman (termasuk kode pos)"></textarea>				
			</div>

			<?php
			if (isset($_POST["checkout"])) {
				$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
				$tanggal_pembelian = date("y-m-d");
				$total_pembelian = $totalbelanja;
				$alamat_pengiriman = $_POST['alamat_pengiriman'];

				$koneksi->query("INSERT INTO pembelian (id_pelanggan,tanggal_pembelian,total_pembelian,alamat_pengiriman) VALUES ('$id_pelanggan','$tanggal_pembelian','$total_pembelian','$alamat_pengiriman') "); 

				$id_pembelian_barusan = $koneksi->insert_id;
				{
					foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) 
					{

						$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
						$perproduk = $ambil -> fetch_assoc();

						$nama = $perproduk['nama_produk'];
						$harga = $perproduk['harga_produk'];

						$subharga = $perproduk['harga_produk']*$jumlah;

						$koneksi->query("INSERT INTO pembelian_produk(id_pembelian,id_produk,nama,harga,subharga,jumlah) VALUES ('$id_pembelian_barusan','$id_produk','$nama','$harga','$subharga','$jumlah') ");
					}

					
				}

				unset($_SESSION["keranjang"]);

				echo "<script>alert('Pembelian sukses');</script>";
				echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
			}
						?>


</body>
</html>