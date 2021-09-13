<div class="panel panel-default">
<div class="panel-heading">
        Tambah Data
 </div>
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                   
                                    <form method="POST" >
                                        <div class="form-group">
                                            <label>Nik</label>
                                            <input class="form-control" name="nik" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" name="nama" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Tempat_Lahir</label>
                                            <input class="form-control" name="tempat_lahir" />
                                            
                                        </div>

                                         <div class="form-group">
                                            <label>Tanggal_Lahir</label>
                                            <input class="form-control" type="date" name="tgl_lahir" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Jenis Kelamin</label><br>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="l" name="jk" /> Laki-laki
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="p" name="jk" /> Perempuan
                                            </label>
                                           

                                        </div>

                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select class="form-control" name="kategori">
                                                <option value="u">Umum</option>
                                                <option value="p">Pelajar</option>
                                            </select>
                                        </div>



                                        <div>
                                         
                                            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary"
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

       $sql = $koneksi->query("insert into tb_anggota (nik, nama, tempat_lahir, tgl_lahir, jk, kategori )values('$nik', '$nama', '$tempat_lahir', 
       '$tgl_lahir', '$jk', '$kategori')");

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