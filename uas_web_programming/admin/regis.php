<?php
session_start();

$koneksi = new mysqli("localhost", "root", "", "laper");

?>
<!DOCTYPE html>
<html>
<head>
  <title>Daftar untuk Login</title>
  <link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap8.css">
</head>
<body>
  <center>
<div><br><br><br><br><br><br></div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Daftar Admin</h3>
              </div> 
              <div class="panel-body">
                <form method="post" class="form-horizontal">
                  <div class="form-group">
                    <label class="control-label col-md-3">Username</label>
                    <div class="col-md-7">
                      <input type="text" class="form-control" name="username" required>                    
                    </div>                  
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Nama Lengkap</label>
                    <div class="col-md-7">
                      <input type="text" class="form-control" name="nama_lengkap">                    
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Password</label>
                    <div class="col-md-7">
                      <input type="password" class="form-control" name="password" required>                    
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-md-7 col-md-offset-3">
                      <button class="btn btn-primary" name="daftar">Daftar</button>                    
                    </div>                  
                  </div>
                </form>
                </center>
                <?php
                if (isset($_POST["daftar"])) 
                {
                  $username = $_POST["username"];
                  $nama_lengkap = $_POST["nama_lengkap"];
                  $password = $_POST["password"];

                  $ambil = $koneksi->query("SELECT * FROM admin WHERE username='$username'");
                  $yangcocok = $ambil->num_rows;
                  if ($yangcocok==1) 
                  {
                    echo "<script>alert('pendaftaran gagal, username sudah digunakan');</script>";
                    echo "<script>location='regis.php';</script>";
                  }
                  else
                  {
                    $koneksi->query("INSERT INTO admin(username,nama_lengkap,password) VALUES ('$username','$nama_lengkap','$password') ");

                       echo "<script>alert('pendaftaran sukses, silahkan login');</script>";
                    echo "<script>location='masuk.php';</script>";
                  }
                }
                ?>               
              </div>
        </div>
        </div>
        </div>
        </div>
      </div>