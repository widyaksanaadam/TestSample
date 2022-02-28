<?php
    session_start();
    include"../include/Koneksi.php";
    $ide = $_POST['username'];
    $psw = $_POST['password'];

    $qlogin     = "SELECT * FROM `tb_user` WHERE username='$ide' AND password='$psw'";
    $datalogin  = mysqli_query($koneksi,$qlogin ) ;
    $hasil1     = mysqli_fetch_array($datalogin,MYSQLI_ASSOC);
    $adadata    = mysqli_num_rows($datalogin);

    if ($adadata==1) {
        $_SESSION['username'] = $hasil1['username'];
        echo"<meta http-equiv='refresh' content='0; url=../content/edit.php'>";
    }else {
        echo"login Gagal Periksa Username Atau Password";
        echo"<meta http-equiv='refresh' content='2; url=../content/login.php'>";
    }
?>
