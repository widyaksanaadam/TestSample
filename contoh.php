<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        include"../action/session.php";
    }
    include"../include/Koneksi.php";

    $qdetail    = "SELECT * FROM tb_sekilas";
    $hasil      = mysqli_query($koneksi,$qdetail);
    $data       = mysqli_fetch_array($hasil,MYSQLI_ASSOC);

    $filename="";
    unlink("../images/".$data['foto']);
    $qupdate = "UPDATE tb_sekilas SET foto='$filename'";
    $act     = mysqli_query($koneksi, $qupdate)or die(mysqli_error($koneksi));
    
    if ($act=="true") {
        echo"Gambar Berhasil Terhapus";
        echo"<meta http-equiv='refresh' content='0; url=../content/edit.php'>";
    }else {
        echo"Data Gagal Terupdate";
        echo"<meta http-equiv='refresh' content='2; url=../content/edit.php'>";
    }
?>
