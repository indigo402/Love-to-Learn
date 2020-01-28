<?php
session_start();

include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Pelanggan</title>
	<link rel="stylesheet" type="text/css" href="goyo.css">
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
        <?php if (isset($_SESSION["pelanggan"])): ?>
       	<li><a href="riwayat.php">Riwayat</a></li>
       	<?php endif ?>
        <li><a href="about.php">About Us</a></li>
        <li><a href="info.php">Info</a></li>
        <?php if (isset($_SESSION["pelanggan"])): ?>
        	<li class="active"><a href="out.php">Logout</a></li>
        	<?php else: ?>
        	<li class="active"><a href="in.php">Login</a></li>
        	<?php endif ?>
      </ul>

<p>.</p>
		<div class="kotak_login">
		<p class="tulisan_login">Silahkan login</p>
		<br>
		<form method="post">
			<label for="nama_pelanggan">Username :</label>
			<input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form_login" placeholder="Username ..">

			<label for="password_pelanggan">Password :</label>
			<input type="password" name="password_pelanggan" id="password_pelanggan" class="form_login" placeholder="Password ..">

			<button type="submit" class="tombol_login" name="login">LOGIN</button>
			<br>
			<br>
			
			 <p>Isikan Captcha</p>
                  <!-- kita tentukan letak dari skrip generate gambar -->
                  <td><img src="gambar.php" alt="gambar" /></td>
              

              <tr>
               
                <td><input name="nilaiCaptcha" value="" maxlength="6" /></td>
              </tr>		
			
			<center>
				<a class="link" href="daftar.php">Daftar</a>
			</center>
		</form>
		</div>

<?php
if (isset($_POST["login"])) 
{

	$nama_pelanggan = $_POST["nama_pelanggan"];
	$password_pelanggan = $_POST["password_pelanggan"];
	$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE nama_pelanggan='$nama_pelanggan' AND password_pelanggan='$password_pelanggan'");

	$akunyangcocok = $ambil->num_rows;

	if ($akunyangcocok==1)
	{
		$akun = $ambil->fetch_assoc();
		$_SESSION["pelanggan"] = $akun;
		echo "<script>alert('Anda sukses login')</script>";
		echo "<script>location='keranjang.php';</script>";
	}
	else
	{
		echo "<script>alert('Username / Password salah')</script>";
		echo "<script>location='in.php';</script>";
	}
}
?>

</body>
</html>