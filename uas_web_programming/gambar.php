<?php 
session_start();
header("COntent-type: image/png");
$_SESSION["Captcha"] = "";

//Tentukan Ukuran gambar
$gbr = imagecreate(200, 50);

// Warna Background Gambar
imagecolorallocate($gbr, 167, 218, 239);
$grey = imagecolorallocate($gbr, 128, 128, 128);
$black = imagecolorallocate($gbr, 0, 0, 0);

// Tentukan FOnt
$font = 'C:\xampp\htdocs\Tugas8\monaco.ttf';

// membuat nomor acak dan tampilankan pada gambar
for ($i=0; $i <=5 ; $i++) { 
	// jumlah karakter
	$nomor=rand(0, 9);
	$_SESSION["Captcha"] .=$nomor;
	$sudut=rand(-25, 25);
	imagettftext($gbr, 20, $sudut, 8+15*$i, 25, $black, $font, $nomor);

	// efek shadow
	imagettftext($gbr, 20, $sudut, 8+15*$i, 26, $grey, $font, $nomor);
}

// untuk membuat gambar
imagepng($gbr);
imagedestroy($gbr);
 ?>