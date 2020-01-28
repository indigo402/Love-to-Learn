<?php
session_start();

include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>PROJECT UAS</title>
  <link rel="stylesheet" type="text/css" href="iya.css">
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
        <li class="active"><a href="about.php">About Us</a></li>
        <li><a href="info.php">Info</a></li>
        <?php if (isset($_SESSION["pelanggan"])): ?>
          <li><a href="out.php">Logout</a></li>
          <?php else: ?>
          <li><a href="in.php">Login</a></li>
          <?php endif ?>
      </ul>
<p>.</p>
<div class="flip-card">
    <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="rofiq.png" alt="Rofiq" style="width:300px;height:300px;">
    </div>
    <div class="flip-card-back">
      <br>
      <br>
      <br>
      <h1>Rofiq Wibawanto</h1>
      <br>
      <p>21 Tahun</p> 
      <br>
      <h3>Director & Founder</h3>
    </div>
    </div>
  </div>

  <div class="oflip-card">
    <div class="flip-card-inner">
    <div class="flip-card-front">

    <img src="digo.jpg" alt="Digo" style="width:300px;height:300px;">
    </div>
    <div class="flip-card-back">
      <br>
      <br>
      <br>
      <h1>Indigo Noor Muin</h1>
      <br> 
      <p>20 Tahun</p>
      <br> 
      <h3>General Manager & Founder</h3>
    </div>
    </div>
  </div>

  <div class="oflip-card">
    <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="joshua.png" alt="Joshua" style="width:300px;height:300px;">
    </div>
    <div class="flip-card-back">
      <br>
      <br>
      <br>
      <h1>Josua Hardi Arief</h1>
      <br> 
      <p>20 Tahun</p>
      <br> 
      <h3>Executive Chef & Founder</h3>
    </div>
    </div>
  </div>
    
  <div class="history">Waroeng Lapar pertama kali dibuka pada tahun 2019 oleh tiga orang pemuda bernama Indigo Noor Muin, Joshua Hardi dan Rofiq Wibawanto di Depok, Jawa Barat. Mereka bertiga merupakan mahasiswa jurusan Teknik Informatika di Politeknik Negeri Jakarta. Tujuan mereka bertiga mendirikan Waroeng Lapar adalah untuk membantu perekonomian mereka.<h1>HISTORY</h1>

</div>

      <p>.</p>
       <h2>Contact Us:
       <hr>
        Telp.  | 021-7718805
        Facebook: Waroeng Lapar |
        Twitter: @warlap |
        Instagram: @war_lap</h2> 
   
  </header>
</body>
</html>