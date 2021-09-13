<?php

    $nik = $_GET ['id'];

    $koneksi->query("delete from tb_anggota where nik ='$nik'");

?>


<script type="text/javascript">
        window.location.href="?page=anggota";
</script>