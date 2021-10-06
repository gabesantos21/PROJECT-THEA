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
    <link rel="stylesheet" href="../../../Css/styles.css?v=<?php echo time(); ?>">
    <title>Landing Page</title>
  </head>
  <body onload="onload()">
  
  <?php 
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
     Lorem ipsum dolor sit, amet consectetur adipisicing elit. In ipsum eum commodi placeat aspernatur nulla id eos aliquam dolorem ex, quia facere sint, minus explicabo ut modi! Ea, nesciunt minima.
     Lorem ipsum dolor sit, amet consectetur adipisicing elit. In ipsum eum commodi placeat aspernatur nulla id eos aliquam dolorem ex, ";
     $section_header_contact = "Contact us";
     $header_contact1 = "Shoot us a Message";
     $contact_name = "Name";
     $contact_email = "Email";
     $contact_message = "Message";
     $cta_submit = "Submit";
     $header_contact2 = "Lets Work Together";
     $contact2_text = "Help us improve your experience by providing feedback.";
     $contact2_email = "email@email.com";
     $contact2_number = "999-999-999";
     $contact2_address = "123 Street, Manila, Metro Manila";
  ?>

    <div class="section-page">
      <main>
        <section class="presentation">
          <div class="cover slider1">
            <img src="../../../Assets/img/backgrounds/Chocobananabread.jpg" alt="" />
          </div>
          <div class="cover slider2">
            <img src="../../../Assets/img/backgrounds/chococookies.jpg" alt=""/>
          </div>
          <div class="cover slider3">
            <img src="../../../Assets/img/backgrounds/nuttyOats.jpg" alt=""/>
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
                  <button class="cta-add" type="submit"><?php echo $cta_store ?></button>
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
          <img src="../../../Assets/img/logo/HomeBakedByNingning.png" alt="" />
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
    <div class="bottom-border"></div>
  </body>
</html>