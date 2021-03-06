<?php include '../NavBar/Navbar.php' ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../../../Css/styles.css">
    <title>Home</title>
  </head>
  <body onload="onload()">

  <?php 

     $sql = 'SELECT * from index_text;';
     $result = $conn->query($sql);
     $results = array();

     while($row = $result->fetch_assoc()){
       $results[] = $row['text'];
     }

     $product1 = $results[0];
     $carousel_slider1_header = $results[1];
     $carousel_slider1_text = $results[2];
     $cta_store = $results[3];
     $product2 = $results[4];
     $carousel_slider2_header = $results[5];
     $carousel_slider2_text = $results[6];
     $product3 = $results[7];
     $carousel_slider3_header = $results[8];
     $carousel_slider3_text = $results[9];
     $section_header_about = $results[10];
     $about_img = $results[11];
     $header_about = $results[12];
     $text_about = $results[13];
     $section_header_contact = $results[14];
     $header_contact1 = $results[15];
     $header_contact2 = $results[16];
     $contact2_text = $results[17];
     $contact2_email = $results[18];
     $contact2_number = $results[19];
     $contact2_address = $results[20];
     $cta_submit = "Submit";
     $contact_name = "Name";
     $contact_email = "Email";
     $contact_message = "Message";


     
    //  gets status and displays alert (alerts are stored in the navbar)
     if(isset($_POST["submitlogin"])){
        if($isAuthenticated){
          echo "<script>
        $(document).ready(function() {
        $('#loginsuccess-alert')
        .fadeTo(2000, 500)
        .slideUp(500, function () {
          $('#loginsuccess-alert').slideUp(500);
        });
      });
              </script>";
        }
     }
     if(isset($_POST["usersubmit"]) && $passwordConfirmed){
      
        echo "<script>
      $(document).ready(function() {
      $('#success-update')
      .fadeTo(2000, 500)
      .slideUp(500, function () {
        $('#success-update').slideUp(500);
      });
    });
            </script>";
      
   }
     if(isset($_POST["submitregister"])){
        if($passwordConfirmed && !$sameUser){
          echo "<script>
        $(document).ready(function() {
        $('#regsuccess-alert')
        .fadeTo(2000, 500)
        .slideUp(500, function () {
          $('#regsuccess-alert').slideUp(500);
        });
      });
              </script>";
        }
     }
     if (!isset($_SESSION["userName"])) {
      if(isset($_GET['logout']) && $_GET['logout'] = 'success'){
        echo "<script>
        $(document).ready(function() {
        $('#success-logout')
        .fadeTo(2000, 500)
        .slideUp(500, function () {
          $('#success-logout').slideUp(500);
        });
      });
              </script>";
      }
    }
     if (isset($_GET["action"])) {
      if ($_GET["action"] == "deleteCart") {
        echo "<script>
        $(document).ready(function() {
        $('#success-remove-alert-cart')
        .fadeTo(2000, 500)
        .slideUp(500, function () {
          $('#success-remove-alert-cart').slideUp(500);
        });
      });
              </script>";
      }
      else if ($_GET["action"] == "checkout") {
        echo "<script>
        $(document).ready(function() {
        $('#checkout-alert')
        .fadeTo(2000, 500)
        .slideUp(500, function () {
          $('#checkout-alert').slideUp(500);
        });
      });
              </script>";
      }
    }
  ?>

  <!-- Sliders / Carousel -->

    <div class="section-page">
      <main>
        <section class="presentation">
          <div class="cover slider1">
            <img src="../../../Assets/img/products/<?php echo $product1 ?>" alt="" />
          </div>
          <div class="cover slider2">
            <img src="../../../Assets/img/products/<?php echo $product2 ?>" alt=""/>
          </div>
          <div class="cover slider3">
            <img src="../../../Assets/img/products/<?php echo $product3 ?>" alt=""/>
          </div>
          <div class="introduction">
            <div class="intro-text slider-info1">
              <h1><?php echo $carousel_slider1_header ?></h1>
              <div class="carousel-info">
                <img src="../../../Assets\img\icons\arrow-left.svg" alt="" class="prev-arrow" onclick="slideFunction(-1)"/>
                <p><?php echo $carousel_slider1_text ?></p>
                <img src="../../../Assets\img\icons\arrow-right.svg" alt="" class="next-arrow" onclick="slideFunction(1)"/>
              </div>
            </div>

            <div class="intro-text slider-info2">
              <h1><?php echo $carousel_slider2_header ?></h1>
              <div class="carousel-info">
                <img src="../../../Assets\img\icons\arrow-left.svg" alt="" class="prev-arrow" onclick="slideFunction(-1)"/>
                <p><?php echo $carousel_slider2_text ?></p>
                <img src="../../../Assets\img\icons\arrow-right.svg" alt="" class="next-arrow" onclick="slideFunction(1)"/>
              </div>
            </div>

            <div class="intro-text slider-info3">
              <h1><?php echo $carousel_slider3_header ?></h1>
              <div class="carousel-info">
                <img src="../../../Assets\img\icons\arrow-left.svg" alt="" class="prev-arrow" onclick="slideFunction(-1)"/>
                <p><?php echo $carousel_slider3_text ?></p>
                <img src="../../../Assets\img\icons\arrow-right.svg" alt="" class="next-arrow" onclick="slideFunction(1)"/>
              </div>
            </div>
            <div class="cta">
              <form action="" method>
                  <a class="cta-add" type="submit" href="store.php"><?php echo $cta_store ?></a>
              </form>
              <div class="slider-select">
                <span class="dot active" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
              </div>
            </div>
          </div>
        </section>
      </main>
    </div>

    <!-- About Section -->

    <div class="section-page" id="AboutUs">
      <div class="container-fluid about-header header-division"><?php echo $section_header_about ?></div>
      <div class="about-content">
        <div class="about-image">
          <img src="../../../Assets/img/logo/<?php echo $about_img ?>" alt="" />
        </div>
        <div class="about-text-container">
          <div class="about-text-header"><?php echo $header_about ?></div>
          <div class="about-text-content">
          <?php echo $text_about ?>
          </div>
        </div>
      </div>
    </div>

    <!-- Contact us! Section -->
    
    <div class="section-page last-section" id="ContactUs">
      <div class="container-fluid contact-header header-division">
      <?php echo $section_header_contact ?>
      </div>
      <div class="about-content">
        <form action="mailto:homebakedbyningning@gmail.com" class="contact-form-container" method="POST" enctype=???multipart/form-data???>
          <h2><?php echo $header_contact1 ?></h2>
          <div class="contact-form">
            <label for="inputName"><?php echo $contact_name ?></label>
            <input
              type="text"
              class="form-control"
              id="inputName"
              name="name"
              required
            />
          </div>
          <div class="contact-form">
            <label for="inputEmail"><?php echo $contact_email ?></label>
            <input
              type="text"
              class="form-control"
              id="inputEmail"
              name="email"
              required
            />
          </div>
          <div class="contact-form">
            <label for="inputMessage"><?php echo $contact_message ?></label>
            <textarea
              class="form-control"
              id="inputMessage"
              name="message"
              rows="3"
              required
            ></textarea>
          </div>
          <button class="message-btn" type="submit"><?php echo $cta_submit ?></button>
        </form>
        <div class="contact-text-container">
          <h2><?php echo $header_contact2 ?></h2>
          <h3><?php echo $contact2_text ?></h3>
          <div class="social-icons">
            <a href="tel:+09156316975">
            <img src="../../../Assets/img/icons/call.svg" alt="" />
            </a>
            <a href="viber://add?number=09156316975">
            <img src="../../../Assets/img/icons/viber.svg" alt="" />
            </a>
            <a href="https://www.facebook.com/HeavenlyBakedByNingning" target="_blank">
            <img src="../../../Assets/img/icons/facebook.svg" alt="" />
            </a>
          </div>
          <div class="contact-information">
            <h3><?php echo $contact2_email ?></h3>
            <h3><?php echo $contact2_number ?></h3>
            <h3><?php echo $contact2_address ?></h3>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>