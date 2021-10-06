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
    <title>Store</title>
  </head>
  <body onload="onload()">
  <?php 
    $store_header = "Shop"
  ?>

<div class="section-page">
      <div class="container-fluid about-header header-division">Store</div>
      <div class="products-container">
          <div class="card">
            <img
              class="card-img-top product-image"
              src="../../../Assets/img/backgrounds/Chocobananabread.jpg"
              alt="Card image cap"
            />
            <div class="card-body card-product-container">
              <h3 class="card-title center-title">Choco Banana Bread</h3>
              <div class="card-text center-title">
                <h5>PHP 100</h5>
              </div>
              <p class="card-text justify-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Inventore, aut deserunt? Minima ipsa, ab iusto perferendis
                repellendus sequi nesciunt dolor numquam veniam praesentium
                error accusamus, eum delectus dignissimos natus nisi?
              </p>
              <div class="action-container">
                <input
                  type="submit"
                  class="cta-product add-to-cart-btn"
                  value="Add to Cart"
                />
                <input
                  type="submit"
                  class="cta-product checkout-btn"
                  value="Checkout"
                />
              </div>
            </div>
          </div>
          <div class="card">
            <img
              class="card-img-top product-image"
              src="../../../Assets/img/backgrounds/chococookies.jpg"
              alt="Card image cap"
            />
            <div class="card-body card-product-container">
              <h3 class="card-title center-title">Chocolate Cookies</h3>
              <div class="card-text center-title">
                <h5>PHP 100</h5>
              </div>
              <p class="card-text justify-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Inventore, aut deserunt? Minima ipsa, ab iusto perferendis
                repellendus sequi nesciunt dolor numquam veniam praesentium
                error accusamus, eum delectus dignissimos natus nisi?
              </p>
              <div class="action-container">
                <input
                  type="submit"
                  class="cta-product add-to-cart-btn"
                  value="Add to Cart"
                />
                <input
                  type="submit"
                  class="cta-product checkout-btn"
                  value="Checkout"
                />
              </div>
            </div>
          </div>
          <div class="card">
            <img
              class="card-img-top product-image"
              src="../../../Assets/img/backgrounds/nuttyOats.jpg"
              alt="Card image cap"
            />
            <div class="card-body card-product-container">
              <h3 class="card-title center-title">Nutty Oats</h3>
              <div class="card-text center-title">
                <h5>PHP 100</h5>
              </div>
              <p class="card-text justify-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Inventore, aut deserunt? Minima ipsa, ab iusto perferendis
                repellendus sequi nesciunt dolor numquam veniam praesentium
                error accusamus, eum delectus dignissimos natus nisi?
              </p>
              <div class="action-container">
                <input
                  type="submit"
                  class="cta-product add-to-cart-btn"
                  value="Add to Cart"
                />
                <input
                  type="submit"
                  class="cta-product checkout-btn"
                  value="Checkout"
                />
              </div>
            </div>
          </div>
      </div>
    </div>
  </body>
</html>