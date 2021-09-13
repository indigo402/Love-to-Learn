<?php


    $nik = $_GET['id'];

    $sql = $koneksi->query("select * from tb_anggota where nik = '$nik'");

    $tampil = $sql->fetch_assoc();

    $jkl = $tampil['jk'];
    $kategori = $tampil['kategori'];


?>

<div class="panel panel-default">
<div class="panel-heading">
        Ubah Data
 </div>
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                   
                                    <form method="POST" >
                                        <div class="form-group">
                                            <label>Nik</label>
                                            <input class="form-control" name="nik" value="<?php echo $tampil['nik']?>" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" name="nama" value="<?php echo $tampil['nama']?>" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Tempat_Lahir</label>
                                            <input class="form-control" name="tempat_lahir" value="<?php echo $tampil['tempat_lahir']?>" />
                                            
                                        </div>

                                         <div class="form-group">
                                            <label>Tanggal_Lahir</label>
                                            <input class="form-control" type="date" name="tgl_lahir" value="<?php echo $tampil['tgl_lahir']?>" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Jenis Kelamin</label><br>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="l" name="jk" <?php echo($jkl==l)?"checked":""?> /> 
                                                Laki-laki
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="p" name="jk" name="jk" <?php echo($jkl==p)?"checked":"" ?> /> 
                                                Perempuan
                                            </label>
                                           

                                        </div>

                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select class="form-control" name="kategori">
                                                <option value="u" <?php if ($kategori=='u') {
                                                    echo "selected";
                                                } ?>>Umum</option>
                                                <option value="p" <?php if ($kategori=='p') {
                                                    echo "selected";
                                                }  ?>>Pelajar</option>
                                            </select>
                                        </div>



                                        <div>
                                         
                                            <input type="submit" name="simpan" value="Ubah" class="btn btn-primary"
                                        </div>
                                </div>

                                </form>
                            </div>
</div>
</div>
</div>


<?php

   $nik = $_POST ['nik'];
   $nama = $_POST ['nama'];
   $tempat_lahir = $_POST ['tempat_lahir'];
   $tgl_lahir = $_POST ['tgl_lahir'];
   $jk = $_POST ['jk'];
   $kategori = $_POST ['kategori'];

   $simpan = $_POST ['simpan'];


   if ($simpan) {

       $sql = $koneksi->query("update tb_anggota set nama='$nama', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', jk='$jk',
          kategori='$kategori' where nik='$nik' ");

       if ($sql) {
           ?>
                <script type="text/javascript">

                    alert ("Data Berhasil Disimpan");
                    window.location.href="?page=anggota";

                </script>
            <?php
       }
   }

?>