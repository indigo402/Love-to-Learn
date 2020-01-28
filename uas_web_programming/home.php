<?php
session_start();

include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>PROJECT UAS</title>
	<link rel="stylesheet" type="text/css" href="setail.css">
</head>
<body>
	<header>
    <div class="row">
      <div class="logo">
        <img src="lapar.jpeg">        
      </div>
      <ul class="main-nav">
        <li class="active"><a href="home.php">Home</a></li>
        <li><a href="food.php">Menu</a></li>
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


		</div class="hero">
			<div>.</div>>
			<h1>AMAZING</h1>
			<h2>TASTY</h2>
		</div>
		<div class="button">
			<a href="#SCHEDULE" class="btn btn-one">Our Schedule</a>
			<a href="in.php" class="btn btn-two">Member</a>
		</div>
		</div>
<br><br><br><br><br><br>
<br><br><br><br><br>
<hr>
	<h3><a name="SCHEDULE">OUR SCHEDULE</a></h3>
	<br>
	<br>
	<p>Monday - Friday : Open from 07.00 WIB - 21.00 WIB</p>
	<p>Saturday - Sunday : Open from 09.00 WIB - 03.00 WIB</p>
	<br><br><br><br><br><br>
	<center><div class="button">
		<a href="home.php" class="btn btn-one">/\</a>
	</div></center>
	</header>

</body>
</html>