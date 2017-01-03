<?php
include 'config/config.php';
session_name('pelatihankp');
session_start();
if (isset($_SESSION['pengguna_id'])) {
  $ambil_pengguna = mysqli_query($conn, "SELECT * FROM tb_pengguna WHERE pengguna_id='$_SESSION[pengguna_id]'");
  $pengguna       = mysqli_fetch_array($ambil_pengguna);
}
?>

<!doctype html>
<html lang="en">
<head>
  <title>
    <?php
    if (isset($_GET['p'])) {            
      if (isset($_GET['db'])) {       
        echo $_GET['db'];               
      } else {
        echo $_GET['p'];
      }
    } else {
      echo "Pelatihan Kerja Praktik";
    }
    ?>
    - Pelatihan Kerja Praktik
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- UNTUK MENGGANTI LOGO DI TAB BROSER -->
  <link rel="icon" href="assets/img/ummi.png">
  <!-- LINK CSS UNTUK MEMPERCANTIK TAMPILAN -->
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" media="screen">
  <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome.min.css" media="screen">
  <link rel="stylesheet" type="text/css" href="assets/fonts/simple-line-icons.css" media="screen">
  <link rel="stylesheet" type="text/css" href="assets/css/settings.css" media="screen">
  <link rel="stylesheet" type="text/css" href="assets/css/slicknav.css" media="screen">
  <link rel="stylesheet" type="text/css" href="assets/css/main.css" media="screen">
  <link rel="stylesheet" type="text/css" href="assets/css/responsive.css" media="screen">
  <link rel="stylesheet" type="text/css" href="assets/css/animate.css" media="screen">
  <link rel="stylesheet" type="text/css" href="assets/css/colors/red.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="assets/css/raleway.css" media="screen" />
</head>
<body>
  <div id="container">
    <div class="hidden-header"></div>
    <header class="clearfix">
      <!-- TOP BAR (ALAMAT DAN SOSMED) -->
      <div class="top-bar">
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-sm-9">
              <!-- INFO KONTAK -->
              <ul class="contact-details">
                <?php
                $ambil_kontak = mysqli_query($conn, "SELECT * FROM tb_kontak ORDER BY kontak_id LIMIT 1");
                $kontak       = mysqli_fetch_array($ambil_kontak);
                ?>
                <li><a href="#"><i class="icon-pointer"></i><?php echo $kontak['kontak_alamat']; ?></a></li>
                <li><a href="#"><i class="icon-call-out"></i><?php echo $kontak['kontak_tlp']; ?></a></li>
                <li><a href="#"><i class="icon-envelope"></i><?php echo $kontak['kontak_email']; ?></a></li>
              </ul>
              <!-- INFO KONTAK END -->
            </div>
            <div class="col-md-4 col-sm-3">
              <!-- SOSMED -->
              <ul class="social-list">
                <li>
                  <a class="facebook itl-tooltip" data-placement="bottom" title="Facebook" href="#">
                    <i class="fa fa-facebook"></i>
                  </a>
                </li>
                <li>
                  <a class="twitter itl-tooltip" data-placement="bottom" title="Twitter" href="#">
                    <i class="fa fa-twitter"></i>
                  </a>
                </li>
                <li>
                  <a class="google itl-tooltip" data-placement="bottom" title="Civic Education" href="#">
                    <i class="fa fa-globe"></i>
                  </a>
                </li>
              </ul>
              <!-- SOSMED END -->
            </div>
          </div>
        </div>
      </div>
      <!-- TOP BAR (ALAMAT DAN SOSMED) END -->

      <!-- LOGO DAN MENU  -->
      <div class="navbar navbar-default navbar-top">
        <div class="container">
          <div class="navbar-header">
            <!-- MENU TOGLE UNTUK TAMPILAN MOBILE -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
            <!-- LOGO WEBSITE -->
            <a class="navbar-brand" href="index.php"><h1>LOGO WEBSITE</h1></a>
          </div>
          <div class="navbar-collapse collapse">
            <!-- MENU UNTUK LAYAR LAPTOP/PC-->
            <ul class="nav navbar-nav navbar-right">
              <li id="menu-beranda"><a href="index.php">Beranda</a></li>
              <li id="menu-profil"><a href="index.php?p=Profil">Profil</a></li>
              <li id="menu-artikel"><a href="index.php?p=Artikel">Artikel</a></li>
              <li id="menu-galeri"><a href="index.php?p=Galeri">Galeri</a></li>
              <li id="menu-kontak"><a href="index.php?p=Kontak">Kontak</a></li>
              <li id="menu-masuk">
                <?php
                if (isset($_SESSION['pengguna_nama']) && isset($_SESSION['pengguna_status'])){
                  if ($_SESSION['pengguna_status'] == 'admin') {
                    echo "<a href='admin'><i class='fa fa-user fa-fw'></i> Administrator</a>";
                  } elseif ($_SESSION['pengguna_status'] == 'member') {
                    echo "<a href='admin/member'><i class='fa fa-user fa-fw'></i> Administrator</a>";
                  }
                } else {
                  ?>
                  <a href="index.php?p=Login"><i class="fa fa-user fa-fw"></i> Masuk</a>
                  <?php
                }
                ?>
              </li>
            </ul>

          </div>
        </div>

        <!-- MENU UNTUK LAYAR HP/TABLET -->
        <ul class="wpb-mobile-menu">
          <li id="menu-beranda"><a href="index.php">Beranda</a></li>
          <li id="menu-profil"><a href="index.php?p=Artikel">Profil</a></li>
          <li id="menu-artikel"><a href="index.php?p=Artikel">Artikel</a></li>
          <li id="menu-galeri"><a href="index.php?p=Galeri">Galeri</a></li>
          <li id="menu-kontak"><a href="index.php?p=Kontak">Kontak</a></li>
          <li id="menu-masuk">
            <?php
            if (isset($_SESSION['pengguna_nama']) && isset($_SESSION['pengguna_status'])){
              if ($_SESSION['pengguna_status'] == 'admin') {
                echo "<a href='admin'><i class='fa fa-sign-in fa-fw'></i> Administrator</a>";
              } elseif ($_SESSION['pengguna_status'] == 'member') {
                echo "<a href='admin/member'><i class='fa fa-sign-in fa-fw'></i> Administrator</a>";
              }
            } else {
              ?>
              <a href="index.php?p=Login"><i class="fa fa-sign-in fa-fw"></i> Masuk</a>
              <?php
            }
            ?>
          </li>
        </ul>
      </div>
      <!-- LOGO DAN MENU END -->
    </header>

    <!-- LINK MENU -->
    <?php

    if (empty($_GET['p'])) {
      include 'page/beranda.php';
    } elseif ($_GET['p'] == 'Profil') {
      include 'page/profil.php';
    } else if ($_GET['p'] == 'Artikel') {
      include 'page/artikel.php';
    } else if ($_GET['p'] == 'Galeri') {
      include 'page/galeri.php';
    } else if ($_GET['p'] == 'Kontak') {
      include 'page/kontak.php';
    } elseif ($_GET['p'] == 'Login') {
      include 'page/login.php';
    } else if ($_GET['p'] == 'Kosong') {
      include 'page/kosong.php';
    } else {
      include 'page/404.php';
    }

    include "footer.php"; 
    ?>
  </div>
  <!-- TOMBOL KEMBALI KE ATAS -->
  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
</body>
</html>