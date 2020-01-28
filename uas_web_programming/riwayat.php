<?php
session_start();

include 'koneksi.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>LAPERRR</title>
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
       	<li class="active"><a href="riwayat.php">Riwayat</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="info.php">Info</a></li>
        <?php if (isset($_SESSION["pelanggan"])): ?>
        	<li><a href="out.php">Logout</a></li>
        	<?php else: ?>
        	<li><a href="in.php">Login</a></li>
        	<?php endif ?>
      </ul>
      <div><br><br><br><br><br><br></div>
      <section class="riwayat">
      	<div class="container">
      		<h3>Riwayat Belanja <?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?></h3>      	
      		<table class="table table-bordered">
      			<thead>
      				<tr>
      				<td>No</td>
      				<td>Tanggal</td>
      				<td>Status</td>
      				<td>Total</td>
      				<td>Opsi</td>
      				</tr>
      			</thead>
      			<tbody>
      				<?php
      				$nomor=1;
      				$id_pelanggan = $_SESSION["pelanggan"]['id_pelanggan'];

      				$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan'");
      				while($pecah = $ambil->fetch_assoc()){
      				?>
      				<tr>
      					<td><?php echo $nomor; ?></td>
      					<td><?php echo $pecah["tanggal_pembelian"] ?></td>
      					<td><?php echo $pecah["status_pembelian"] ?></td>
      					<td><?php echo number_format($pecah["total_pembelian"]) ?></td>
      					<td>
      						<a href="nota.php?id=<?php echo $pecah['id_pembelian'] ?>" class="btn btn-info">Nota</a>
      					</td>
      				</tr>
      				<?php $nomor++ ?>
      				<?php } ?>
      			</tbody>
      		</table>
      	</div>
      </section>
</body>
</html>