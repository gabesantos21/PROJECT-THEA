<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../../../Css/styles.css">
    <title></title>
  </head>
  <body>

      <?php 
      // if true loads registered user navbar else guest navbar
      $_SESSION['userLogged'] = "true";

      $dropdown_user = "You";
      $dropdown_user_login = "Log In";
      $dropdown_user_signup = "Sign Up";
      $nav_link_home = "Home";
      $nav_link_store = "Store";
      ?>
 
    <nav>
    <div class="burger">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
    </div>
    <ul class="nav-links">
    <form action="/" method="GET" class="search-bar" style="margin: 30px 0 0 0;">
        <input type="search" placeholder="Search" class="search-field-responsive"/>
        <button type="submit" class="search-button">
          <img src="../../../Assets/img/icons/search2.svg">
        </button>
    </form>
        <li><a href="">About Us</a></li>
        <li><a href="">Contact Us</a></li>
        <li><a href="" class="nav-home-link"><img src="../../../Assets/img/icons/storefront.svg" alt="">&nbsp;Shop</a></li>
      </ul>
      <ul class="search">
      <form action="/" method="GET" class="search-bar">
        <input type="search" placeholder="Search" name="search-item" class="search-field"/>
        <button type="submit" class="search-button">
          <img src="../../../Assets/img/icons/search.svg">
        </button>
      </form>
      </ul>
      <div class="logo">
        <div style="position: relative" class="nav-home">
            <li><a href="" class="nav-home-link">Home <img src="../../../Assets/img/icons/dropdown.svg" alt=""> |</a></li>
            <div class="dropdown-content">
                <a href="#" class="dropdown-items" style="color: #c8b8b2">About Us</a>
                <a href="#" class="dropdown-items" style="color: #c8b8b2">Contact Us</a>
             </div>
        </div>
        <img src="../../../Assets/img/logo/text-logo.png" alt="Heavenly Baked By Ningning">
        <li><a href="">| Store</a></li>
      </div>
      <ul class="user-nav-links" style="display: relative">
        <li><a href=""><img src="../../../Assets/img/icons/cart.svg" alt=""></a></li>
        <li  class="nav-user"><a href=""><img src="../../../Assets/img/icons/user.svg" alt=""></a>
        <div class="dropdown-user-control">
            <?php 
            if (@$_SESSION['userLogged'] == "true") {
                ?>
                <h3 class="dropdown-items">Hi User</h3>
                <form action="/" method="GET">
                    <input type="submit" style="color: #c8b8b2;cursor: pointer;" class="dropdown-items" name="logout" value="Logout">
                </form
                <?php
            }
            else{?>
                <form action="/" method="GET">
                    <input type="submit" style="color: #c8b8b2;cursor: pointer;" class="dropdown-items" name="login" value="Login">
                </form>
                <form action="/" method="GET">
                    <input type="submit" style="color: #c8b8b2;cursor: pointer;" class="dropdown-items" name="register" value="Register">
                </form>
                <?php } ?>
             </div>  
             </li>
    </ul>
    </nav>

   
    <script src="../../../Js/app.js"></script>
  </body>
</html>
