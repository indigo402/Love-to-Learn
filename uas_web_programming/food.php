<?php
session_start();

include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>LAPERRR</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap7.css">
</head>
<body>
	<header>
    <div class="row">
      <div class="logo">
        <img src="lapar.jpeg">        
      </div>
      <ul class="main-nav">
        <li><a href="home.php">Home</a></li>
        <li class="active"><a href="food.php">Menu</a></li>
        <li><a href="keranjang.php">Keranjang</a></li>
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


		<section class="konten">
			<div class="container">
				<h1>FOOD & DRINK</h1>
				<br>
				<br>
				<br>
				<br>
				<div class="woy">

					<?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
					<?php while ($perproduk = $ambil->fetch_assoc()) { ?>
					<div class="col-md-3">
						<div class="thumbnail">
							<img src="foto_produk/<?php echo $perproduk['foto_produk'] ?>" alt="">
							<div class="caption">
								<h3><?php echo $perproduk['nama_produk'];?></h3>
								<h5>Rp. <?php echo number_format ($perproduk['harga_produk']);?></h5>
								<a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary">Beli</a>		
							</div>						
						</div>
					</div>
					<?php } ?>


				</div>
			</div>	
		</section>
		
	
</body>
</html>