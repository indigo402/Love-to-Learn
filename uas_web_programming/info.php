<?php
session_start();

include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>LAPERRR</title>
  <link rel="stylesheet" type="text/css" href="iyo.css">
</head>
<body>
   <header>
    <div class="row">
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
        <li class="active"><a href="info.php">Info</a></li>
        <?php if (isset($_SESSION["pelanggan"])): ?>
          <li><a href="out.php">Logout</a></li>
          <?php else: ?>
          <li><a href="in.php">Login</a></li>
          <?php endif ?>
      </ul>

<p>.</p>
<div class="kotak_login">
<h1>Order Online</h1>
Jika Anda ingin memesan makanan lewat online, Anda harus mendaftar dulu menjadi member. Caranya gampang anda hanya harus daftar di halaman web ini dan biaya ongkir nya pun gratis.
<br>
<br>
<h1>Makanan yang Kami Jual</h1>
Kami menjual berbagai makanan lezat yang berbahan dasar daging. Kenapa kami memilih daging? karena daging mempunyai manfaat seperti:
<li>Sumber protein Daging mengandung protein dalam jumlah besar sehingga bahan pangan ini termasuk penting. Protein sangat penting untuk memperbaiki dan membangun jaringan, produksi antibodi serta menguatkan sistem imun tubuh sehingga kita tak mudah sakit. Yang paling penting adalah daging mengandung asam amino esensial, karena itu daging boleh dibilang sebagai sumber protein terbaik.</li> 
<li>Sumber mineral Dari berbagai zat gizi yang terkandung dalam daging, kandungan zat besi, zinc, juga seleniumnya tak boleh disepelekan. Zat besi membantu pembentukan sel darah merah untuk mengangkut oksigen ke seluruh tubuh. Sementara itu zinc membantu pembentukan jaringan dan metabolisme. Selenium sendiri berperan dalam memecah lemak dan zat-zat kimia dalam tubuh.</li>
<li>Kaya vitamin Kita bisa mendapatkan vitamin A, B, dan D dalam daging. Vitamin tersebut bukan cuma menyehatkan penglihatan tetapi juga menguatkan gigi, tulang, serta menyokong sistem saraf. Manfaat lain dari konsumsi daging adalah menjaga kesehatan kulit dan mental.</li>
Daging yang kami pakai adalah daging sapi dan kambing yang tentunya halal dan dijamin kualitasnya karena kami bekerja sama dengan beberapa peternakan terbaik yang ada di dunia.
<br>
<br>
<h1>Minuman yang Kami Jual</h1>
Minuman yang kami jual pun tak kalah bermanfaat. Kami menjual aneka macam minuman yang menyehatkan dan membuat anda rileks serta santai setelah anda beraktivitas seharian.
</div>

</body>
</html>