<!DOCTYPE html>
<html>

<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="../css/style.css" rel="stylesheet">

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<title>PT. Globalindo Intimates</title>

<body id="home" class="scrollspy">

  <!-- navbar -->
  <div class="navbar-fixed">
    <nav>
      <!-- <div class="container"> -->
      <div class="nav-wrapper navbar deep-purple">
        <a style="padding-left: 30px;" href="#home" class="brand-logo">PT. Globalindo Intimates</a>
        <a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="#home">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="home_product.php">Product</a></li>
          <li><a href="achievement.php">Achievement</a></li>
          <li><a href="event.php">Event</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="visitor.php">Visitor</a></li>
          <li><a href="login.php">Login</a></li>
        </ul>
      </div>
      <!-- </div> -->
    </nav>
  </div>
  <!-- akhir navbar -->

  <!-- side-nav -->
  <ul class="sidenav" id="mobile">
    <li><a href="#home">Home</a></li>
    <li><a href="#about">About Us</a></li>
    <li><a href="#product">Product</a></li>
    <li><a href="#">Achievement</a></li>
    <li><a href="event.php">Event</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="visitor.php">Visitor</a></li>
    <li><a href="login.php">Login</a></li>
  </ul>
  <!-- akhir side-nav -->

  <!-- slider -->
  <div class="slider">
    <ul class="slides">
      <li>
        <img src="img/home/Fabric Molding Section.jpg" style="opacity: 0.5;">
        <div class="caption center-align">
          <h1 style="font-weight: bold;">WELCOME TO <br> PT. GLOBALINDO INTIMATES</h1>
        </div>
      </li>
      <li>
        <img src=" img/home/Fabric Storage.jpg" style="opacity: 0.5;">
        <div class="caption right-align">
          <h1 style="font-weight: bold;">We serve the best quality product</h1>
        </div>
      </li>
      <li>
        <img src="img/home/Lace cutter with Laser Technology.jpg" style="opacity: 0.5;">
        <div class="caption left-align">
          <h1 style="font-weight: bold;">We serve the best quality product</h1>
        </div>
      </li>
  </div>
  <!-- akhir slider -->

  <?php
  include "connection.php";
  ?>

  <!-- about -->
  <?php
  $queryAbout = mysqli_query($kon, "SELECT * FROM tabel_about ORDER BY idAbout DESC LIMIT 1");
  if (mysqli_num_rows($queryAbout) > 0) {

    while ($dataAbout = mysqli_fetch_array($queryAbout)) {

      $visiAbout = $dataAbout["visiAbout"];
      $misiAbout = $dataAbout["misiAbout"];
    }
  }
  ?>

  <section class="about scrollspy" id="about">
    <div class="container" style="height: 600px;">
      <div class="row">
        <div class="col m12">
          <h4 style="font-weight: bold;" class="center">Vision</h4>
          <hr class="center" style="width: 150px; margin-bottom: 50px; border-top: 3px solid black">
          <p style="text-align: justify; font-size:20px"><?php echo $visiAbout ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col m12">
          <h4 style="font-weight: bold;" class="center">Mission</h4>
          <hr class="center" style="width: 150px; margin-bottom: 50px; border-top: 3px solid black">
          <p style="text-align: justify; font-size:20px"><?php echo $misiAbout ?></p>
        </div>
      </div>
      <div style="float: right;">
        <a class="hoverable" href="company_background.php">Read More</a>
      </div>
    </div>
  </section>
  <!-- end-about -->

  <!-- product -->
  <div class="parallax-container" style="height: 300px;">
    <div class="parallax"><img src="img/home/Fabric Storage.jpg"></div>
  </div>
  <section class="scrollspy" id="product">
    <div class="container">
      <h2 class="center">Newest Product</h2>
      <hr class="center" style="width: 300px; margin-bottom: 50px; border-top: 3px solid black;">

      <table>
        <?php
        $kolom = 5;
        $i = 1;
        $upload_dir = 'img/product/';
        $sqlProduk = "SELECT * FROM tabel_produk ORDER BY id DESC LIMIT 8";
        $rslt = mysqli_query($kon, $sqlProduk);
        while ($data = mysqli_fetch_array($rslt)) {

          if (($i) % $kolom == 1) {
            echo '<tr>';
          } ?>
          <td>
            <div class="card small">
              <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src=<?php echo $upload_dir . $data["image"] ?>>
              </div>
              <div class="card-content">
                <span class="card-title activator grey-text text-darken-4 center" style="font-weight: bold;"><?php echo $data['name'] ?></span>
              </div>
              <div class="card-reveal">
                <span class="card-title grey-text text-darken-4"><?php echo $data['name'] ?><i class="material-icons right">close</i></span>
              </div>
            </div>
          </td>

        <?php
          if (($i) % $kolom == 0) {
            echo '</tr>';
          }
          $i++;
        }
        ?>
      </table>

    </div>
  </section>
  <!-- end-product -->

  <!-- clients -->
  <div class="section" id="clients">
    <div class="parallax-container" style="height: 100px;">
      <div class="parallax"><img src="img/home/Automated Strap making section.jpg"></div>
    </div>
    <div class="section white">
      <div class="row container">
        <h2 class="header">Clients</h2>
        <p class="grey-text text-darken-3 lighten-3">Parallax is an effect where the background content or image in this case, is moved at a different speed than the foreground content while scrolling.</p>
      </div>
    </div>
    <div class="parallax-container" style="height: 100px;">
      <div class="parallax"><img src="img/home/Automated Strap making section.jpg"></div>
    </div>
  </div>
  <!-- end clients -->

  <!-- achievement -->
  <div class="slider">
    <ul class="slides">

      <?php
      $upload_dir = 'img/achievement/';
      $sqlAchi = "SELECT * FROM tabel_achi ORDER BY idAchi DESC LIMIT 4";
      $rsltAchi = mysqli_query($kon, $sqlAchi);
      while ($dataAchi = mysqli_fetch_array($rsltAchi)) {


        echo '<li>';
        echo '<img src=' . $upload_dir . $dataAchi["fotoAchi"], ' style="opacity: 0.5;">';
        echo '<div class="caption center-align">';
        echo '<h3>Our Achievement</h3>';
        echo '<h5 class="light grey-text text-lighten-3">' . $dataAchi['namaAchi'] . '</h5>';
        echo '</div>';
        echo '</li>';
      } ?>

  </div>
  <section class="scrollspy" id="product">
    <div class="container">
      <h2 class="center">Achievement</h2>
      <hr class="center" style="width: 300px; margin-bottom: 50px; border-top: 3px solid black;">

      <table>
        <?php
        include 'connection.php';
        $kolom = 5;
        $i = 1;
        $upload_dir = 'img/achievement/';
        $sqlEvent = "SELECT * FROM tabel_achi ORDER BY idAchi DESC LIMIT 4";
        $rslt = mysqli_query($kon, $sqlEvent);
        while ($data = mysqli_fetch_array($rslt)) {

          if (($i) % $kolom == 1) {
            echo '<tr>';
          }

          echo '<td>
                <img src=' . $upload_dir . $data["fotoAchi"], ' class="responsive-img materialboxed", width="200px"/>
                <p class="center" style="font-weight: bold">' . $data['namaAchi'] . '</p>
                </td>';

          if (($i) % $kolom == 0) {
            echo '</tr>';
          }
          $i++;
        }
        ?>
      </table>

    </div>
  </section>
  <!-- end-achievement -->

  <!-- contact -->
  <section class="contact scrollspy" id="contact">
    <div class="container" style="height: 600px;">
      <h2 class="center">Contact Us</h2>
      <hr class="center" style="width: 300px; margin-bottom: 50px; border-top: 3px solid black">
      <div class="row">
        <div class="col m7 12">
          <form action="adapter_form_kontak.php" method="post">
            <div class="card-panel">
              <div class="input-field">
                <input type="email" name="nama" class="validate">
                <label for="nama">Name</label>
              </div>
              <div class="input-field">
                <input type="email" name="emailKontak" class="validate">
                <label for="email">Email</label>
              </div>
              <div class="input-field">
                <input type="text" name="telephoneKontak" require>
                <label for="telephone">Telephone Number</label>
              </div>
              <div class="input-field">
                <textarea type="text" name="messageKontak" class="materialize-textarea" style="height: 88px;"></textarea>
                <label for="message">Message</label>
              </div>
              <button type="submit" class="btn deep-purple waves-effect" style="width:25%;">Send</button>
            </div>
          </form>
        </div>

        <div class="col m5 12">
          <div class="card-panel">
            <ul class="collection with-header">
              <li class="collection-header" style="font-weight: bold;">Our Office</li>
              <li class="collection-item">Jl. Raya Solo-Yogya, Mlese, Ceper, Klaten, Central Java - Indonesia</li>
              <li class="collection-header" style="font-weight: bold;">Contact Person</li>
              <li class="collection-item">(+62 - 272) 331120 / 331121</li>
              <li class="collection-item">Fax. (+62 - 272) 331130</li>
              <li class="collection-item">info@globalindointimates.com</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end-contact -->

  <!-- footer -->
  <footer class="red darken-1 white-text center deep-purple" style="padding: 10px 0;">
    <p>Copyright ©2021 All rights reserved | Made PT. Globalindo Intimates</p>
  </footer>
  <!-- end-footer -->

  <!--JavaScript at end of body for optimized loading-->
  <script type="text/javascript" src="js/materialize.min.js"></script>

  <!-- script-side-nav -->
  <script>
    const sideNav = document.querySelectorAll('.sidenav');
    M.Sidenav.init(sideNav);
  </script>
  <!-- akhir script-nav -->

  <!-- script-slider -->
  <script>
    const slideBar = document.querySelectorAll('.slider');
    M.Slider.init(slideBar, {
      indicators: false,
      height: 600
    });
  </script>
  <!-- end-script-slider -->

  <!-- script materialbox -->
  <script>
    const imageBox = document.querySelectorAll('.materialboxed');
    M.Materialbox.init(imageBox);
  </script>
  <!-- end-materialbox -->

  <!-- scrollspy -->
  <script>
    const scroll = document.querySelectorAll('.scrollspy');
    M.ScrollSpy.init(scroll, {
      scrollOffset: 65
    });
  </script>
  <!-- end-scrollspy -->

  <!-- paralax -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.parallax');
      var instances = M.Parallax.init(elems);
    });
  </script>
  <!-- end paralax -->

</body>

</html>