<?php include '../NavBar/AdminNavbar.php' ?>

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

  //initialize this vars into a db

     $carousel_slider1_header = "Try our bestseller!";
     $carousel_slider1_text = "CHOCOLATE BANANA BREAD";
     $carousel_slider2_header = "Try our Tasty Cookies!";
     $carousel_slider2_text = "CHOCOLATE COOKIES";
     $carousel_slider3_header = "Craving that Nutty Flavor?";
     $carousel_slider3_text = "Craving that Nutty Flavor?";
     $cta_store = "Go to Store";
     $section_header_about = "About us";
     $header_about = "Quality is our recipe";
     $text_about = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus doloremque in non? Autem nemo, voluptatum, sequi aliquam eligendi dolore quibusdam a perferendis fugit provident, nesciunt dignissimos neque corporis quo labore?
     Lorem ipsum dolor sit, amet consectetur adipisicing elit. In ipsum eum commodi placeat aspernatur nulla id eos aliquam dolorem ex, quia facere sint, minus explicabo ut modi! Ea, nesciunt minima";
     $header_contact2 = "Lets Work Together";
     $contact2_text = "Help us improve your experience by providing feedback.";
     $contact2_email = "email@email.com";
     $contact2_number = "999-999-999";
     $contact2_address = "123 Street, Manila, Metro Manila";
     $section_header_contact = "Contact us";
     $header_contact1 = "Shoot us a Message";
     $contact_name = "Name";
     $contact_email = "Email";
     $contact_message = "Message";
     $cta_submit = "Submit";
     $product1 = "Chocobananabread.jpg";
     $product2 = "chococookies.jpg";
     $product3 = "chococookies.jpg";
     $product_logo_img = "HomeBakedByNingning.png";

    //  gets status and displays alert (alerts are stored in the navbar)
     if (isset($_GET["status"])) {
        if ($_GET["status"] == "success") {
          echo "<script>$('#success-alert')
                  .fadeTo(2000, 500)
                  .slideUp(500, function () {
                    $('#success-alert').slideUp(500);
                  });
                </script>";
        }
        else{
            echo "<script>$('#error-alert')
                  .fadeTo(2000, 500)
                  .slideUp(500, function () {
                    $('#error-alert').slideUp(500);
                  });
                </script>";
        }
      }
  ?>

    <?php if(!(isset($_GET["editMode"]))){?>
    <div class="sticky-button">
        <a href="index.php?editMode">
            <img src="../../../Assets/img/icons/edit.svg" alt="">
        </a>
    </div>
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

    <div class="section-page" id="AboutUs">
      <div class="container-fluid about-header header-division"><?php echo $section_header_about ?></div>
      <div class="about-content">
        <div class="about-image">
          <img src="../../../Assets/img/logo/<?php echo $product_logo_img ?>" alt="" />
        </div>
        <div class="about-text-container">
          <div class="about-text-header"><?php echo $header_about ?></div>
          <div class="about-text-content">
          <?php echo $text_about ?>
          </div>
        </div>
      </div>
    </div>

    <div class="section-page" id="ContactUs">
      <div class="container-fluid contact-header header-division">
      <?php echo $section_header_contact ?>
      </div>
      <div class="about-content">
        <form action="" method="" class="contact-form-container">
          <h2><?php echo $header_contact1 ?></h2>
          <div class="contact-form">
            <label for="inputName"><?php echo $contact_name ?></label>
            <input
              type="text"
              class="form-control"
              id="inputName"
              name="name"
              disabled
            />
          </div>
          <div class="contact-form">
            <label for="inputEmail"><?php echo $contact_email ?></label>
            <input
              type="text"
              class="form-control"
              id="inputEmail"
              name="email"
              disabled
            />
          </div>
          <div class="contact-form">
            <label for="inputMessage"><?php echo $contact_message ?></label>
            <textarea
              class="form-control"
              id="inputMessage"
              name="message"
              rows="3"
              disabled
            ></textarea>
          </div>
          <button class="message-btn" type="submit" disabled><?php echo $cta_submit ?></button>
        </form>
        <div class="contact-text-container">
          <h2><?php echo $header_contact2 ?></h2>
          <h3><?php echo $contact2_text ?></h3>
          <div class="social-icons">
            <img src="../../../Assets/img/icons/call.svg" alt="" />
            <img src="../../../Assets/img/icons/viber.svg" alt="" />
            <img src="../../../Assets/img/icons/facebook.svg" alt="" />
          </div>
          <div class="contact-information">
            <h3><?php echo $contact2_email ?></h3>
            <h3><?php echo $contact2_number ?></h3>
            <h3><?php echo $contact2_address ?></h3>
          </div>
        </div>
      </div>
    </div>
    <?php }
    else{?>

    <!-- Dont forget to set the names of each input -->

    <form action="indexVerifyChanges.php?action=edit" method="POST">
    <div class="exit-edit-mode">
        <a href="index.php">
        <img src="../../../Assets/img/icons/cancel.svg" alt="">
        </a>
    </div>
    <div class="sticky-button">
            <input type="image" class="image-submit" name="submit" src="../../../Assets/img/icons/check.svg" alt="submit">
    </div>
    <div class="section-page">
      <main>
        <section class="presentation">
          <div class="cover slider1 white-border-cover">
            <input class="file-slider width-img-submit" id="input-b1" name="productFile1" type="file" class="file" data-browse-on-zone-click="true">
          </div>
          <div class="cover slider2 white-border-cover">
            <input class="file-slider width-img-submit" id="input-b2" name="productFile2" type="file" class="file" data-browse-on-zone-click="true">
          </div>
          <div class="cover slider3 white-border-cover">
            <input class="file-slider width-img-submit" id="input-b3" name="productFile3" type="file" class="file" data-browse-on-zone-click="true">
          </div>
          <div class="introduction">
            <div class="intro-text slider-info1">
            <input type="text" class="form-control margin-input width-input" name="" value="<?php echo $carousel_slider1_header ?>">
              <div class="carousel-info">
                <img src="../../../Assets\img\icons\arrow-left.svg" alt="" class="prev-arrow" onclick="slideFunction(-1)"/>
                <input type="text" class="form-control margin-input width-input"  name="" value="<?php echo $carousel_slider1_text ?>">
                <img src="../../../Assets\img\icons\arrow-right.svg" alt="" class="next-arrow" onclick="slideFunction(1)"/>
              </div>
            </div>
            <div class="intro-text slider-info2">
            <input type="text" class="form-control margin-input width-input"  name="" value="<?php echo $carousel_slider2_header ?>">
              <div class="carousel-info">
                <img src="../../../Assets\img\icons\arrow-left.svg" alt="" class="prev-arrow" onclick="slideFunction(-1)"/>
                <input type="text" class="form-control margin-input width-input"  name="" value="<?php echo $carousel_slider2_text ?>">
                <img src="../../../Assets\img\icons\arrow-right.svg" alt="" class="next-arrow" onclick="slideFunction(1)"/>
              </div>
            </div>
            <div class="intro-text slider-info3">
            <input type="text" class="form-control margin-input width-input"  name="" value="<?php echo $carousel_slider3_header ?>">
              <div class="carousel-info">
                <img src="../../../Assets\img\icons\arrow-left.svg" alt="" class="prev-arrow" onclick="slideFunction(-1)"/>
                <input type="text" class="form-control margin-input width-input"  name="" value="<?php echo $carousel_slider3_text ?>">
                <img src="../../../Assets\img\icons\arrow-right.svg" alt="" class="next-arrow" onclick="slideFunction(1)"/>
              </div>
            </div>
            <div class="cta">
              <input type="text" class="form-control margin-input width-input"  name="" value="<?php echo $cta_store ?>">
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
    <div class="section-page" id="AboutUs">
      <div class="container-fluid about-header header-division">
        <input type="text" class="form-control width-input"  name="" value="<?php echo $section_header_about ?>">
      </div>
      <div class="about-content">
        <div class="about-image white-border-cover">
          <input class="file-slider width-img-submit" id="input-b4" name="productFile4" type="file" class="file" data-browse-on-zone-click="true">
        </div>
        <div class="about-text-container">
        <input type="text" class="form-control width-input"  name="" value="<?php echo $header_about ?>">
          <div class="about-text-content">
          <textarea
              class="form-control"
              id="inputMessage"
              name="message"
              rows="5"
            ><?php echo $text_about ?></textarea>
          </div>
        </div>
      </div>
    </div>
    <div class="section-page" id="ContactUs">
      <div class="container-fluid contact-header header-division">
      <input type="text" class="form-control margin-input width-input"  name="" value="<?php echo $section_header_contact ?>">
      </div>
      <div class="about-content">
        <div class="contact-form-container">
            <input type="text" class="form-control margin-input width-input"  name="" value="<?php echo $header_contact1 ?>">
            <div class="contact-form">
                <label for="inputName"><?php echo $contact_name ?></label>
                <input
                type="text"
                class="form-control"
                id="inputName"
                name="name"
                disabled
                />
            </div>
            <div class="contact-form">
                <label for="inputEmail"><?php echo $contact_email ?></label>
                <input
                type="text"
                class="form-control"
                id="inputEmail"
                name="email"
                disabled
                />
            </div>
            <div class="contact-form">
                <label for="inputMessage"><?php echo $contact_message ?></label>
                <textarea
                class="form-control"
                id="inputMessage"
                name="message"
                rows="3"
                disabled
                ></textarea>
          </div>
          <button class="message-btn" type="submit" disabled><?php echo $cta_submit ?></button>
        </div>
        <div class="contact-text-container">
          <input type="text" class="form-control margin-input width-input" name="" value="<?php echo $header_contact2 ?>">
          <input type="text" class="form-control margin-input width-input" name="" value="<?php echo $contact2_text ?>">
          <div class="social-icons">
            <img src="../../../Assets/img/icons/call.svg" alt="" />
            <img src="../../../Assets/img/icons/viber.svg" alt="" />
            <img src="../../../Assets/img/icons/facebook.svg" alt="" />
          </div>
          <div class="contact-information">
            <input type="text" class="form-control width-input" name=""  value="<?php echo $contact2_email ?>">
            <input type="text" class="form-control width-input" name="" value="<?php echo $contact2_number ?>">
            <input type="text" class="form-control width-input" name="" value="<?php echo $contact2_address ?>">
          </div>
        </div>
      </div>
    </div>
    </form>
    <?php }?>
  </body>
</html>