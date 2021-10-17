<?php session_start(); ?>
<?php include '../../../Sql/dbConnection.php'; ?>

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
    <link rel="stylesheet" href="../../../Css/styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title></title>
  </head>
  <body>

      <?php 

      // if true loads registered user navbar else guest navbar
      $_SESSION['userLogged'] = "true";

      $dropdown_user = "Admin"; //must be retrieved from database
      $dropdown_greet_user = "Hi, " . $dropdown_user;
      $dropdown_user_login = "Login";
      $dropdown_user_signup = "Register";
      $dropdown_user_logout = "Logout";
      $nav_link_home = "Home";
      $nav_link_store = "Store";
      $nav_link_contact = "Contact Us";
      $nav_link_about = "About Us";
      $nav_search_placeholder = "Search";
      $modal_login_gmail = "Login with Gmail";
      $modal_login_facebook = "Login with Facebook";      
      $modal_register_gmail = "Register with Gmail";
      $modal_register_facebook = "Register with Facebook";
      $modal_email = "Email";
      $modal_password = "Password";
      $modal_submit = "Submit";
      $modal_checkout = "Checkout";
      $modal_close = "Close";
      $modal_givenName = "Name";
      $modal_surname = "Surname";
      $modal_CPassword = "Confirm Password";
      $modal_number = "Phone Number";
      $modal_save = "Save Changes";
      $modal_user = "Admin";
      $modal_address = "Address";
      $modal_city = "City";
      $modal_barangay = "Barangay";
      $modal_zip = "ZIP";
      ?>
      
    <nav>
      <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
      </div>
      <ul class="nav-links">
        <form action="store.php" method="GET" class="search-bar" style="margin: 30px 0;">
            <input type="search" name="s" placeholder="<?php echo $nav_search_placeholder?>" class="search-field-responsive"/>
            <button type="submit" class="search-button">
              <img src="../../../Assets/img/icons/search2.svg">
            </button>
        </form>
          <li><a href="../Main/index.php#AboutUs" class="home-link-about"><?php echo $nav_link_about?></a></li>
          <li><a href="../Main/index.php#ContactUs" class="home-link-contact"><?php echo $nav_link_contact?></a></li>
          <li><a href="../Main/Store.php" class="nav-home-link"><img src="../../../Assets/img/icons/storefront.svg" alt="">&nbsp;<?php echo $nav_link_store?></a></li>
      </ul>

        <ul class="search">
        <form action="store.php" method="GET" class="search-bar">
          <input type="search" placeholder="<?php echo $nav_search_placeholder?>" name="s" class="search-field"/>
          <button type="submit" class="search-button">
            <img src="../../../Assets/img/icons/search.svg">
          </button>
        </form>
        </ul>

        <div class="logo">
          <div style="position: relative" class="nav-home">
              <li><a href="../Main/index.php" class="nav-home-link"><?php echo $nav_link_home ?><img src="../../../Assets/img/icons/dropdown.svg" alt=""> |</a></li>
              <div class="dropdown-content">
                  <a href="../Main/index.php#AboutUs" class="dropdown-items" style="letter-spacing: 1px;"><?php echo $nav_link_about?></a>
                  <a href="../Main/index.php#ContactUs" class="dropdown-items" style="letter-spacing: 1px;"><?php echo $nav_link_contact?></a>
              </div>
          </div>
          <div class=logo-img-container>
            <a href="../Main/index.php"><img src="../../../Assets/img/logo/text-logo.png" alt="Heavenly Baked By Ningning"></a>
          </div>
          <li>
            <a href="../Main/Store.php">| <?php echo $nav_link_store?></a>
          </li>
        </div>

        <ul class="user-nav-links" style="display: relative">
          <li>
            <a href="OrderStatusPage.php">
              <img src="../../../Assets/img/icons/orders.svg" alt="">
            </a>
          </li>
          <li class="nav-user">
              <img src="../../../Assets/img/icons/user.svg" alt="">
            <div class="dropdown-user-control">
              <?php if (@$_SESSION['userLogged'] == "true") { ?>
                <a href=""class="dropdown-items" style="letter-spacing: 0px" data-toggle="modal" data-target=".user-modal-container"><?php echo $dropdown_greet_user?></a>   
                <form action="">
                <a href="../../UserPage/Main/index.php"class="dropdown-items" style="letter-spacing: 0px" ><?php echo $dropdown_user_logout?></a>
                </form>
                    <?php
                    }
                    else{
                        $_SESSION['userLogged'] == "false";
                        header("Location: ../../UserPage/Main/index.php");
                        exit();
                    }
                        ?>
            </div>  
          </li>
        </ul>
    </nav>

    <div class="alert-container-nav" id="success-alert">
      <div class="alert alert-success alert-dismissible success-alert-gold">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Successfully Modified Page!
      </div>
    </div>

    <div class="alert-container-nav" id="error-alert">
      <div class="alert alert-danger alert-dismissible ">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Error! Failed to do task.
      </div>
    </div>

    <div class="alert-container-nav" id="delete-success">
      <div class="alert alert-success alert-dismissible success-alert-gold">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Successfully Deleted Product!
      </div>
    </div>

    <div class="alert-container-nav" id="edit-success">
      <div class="alert alert-success alert-dismissible success-alert-gold">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Successfully Modified Product!
      </div>
    </div>

    <div class="alert-container-nav" id="add-success">
      <div class="alert alert-success alert-dismissible success-alert-gold">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Successfully Added Product!
      </div>
    </div>

    <script>$("#add-success").hide();</script>
    <script>$("#delete-success").hide();</script>
    <script>$("#edit-success").hide();</script>
    <script>$("#success-alert").hide();</script>
    <script>$("#error-alert").hide();</script>

    <!-- User Modal -->
    <div class="modal fade bd-example-modal user-modal-container" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal modal-dialog-centered">
        <div class="modal-content modal-container">
          <div class="modal-header modal-header-center">
            <h5 class="modal-title modal-title-size"><?php echo $modal_user ?></h5>
          </div>
          <div class="modal-body">
            <form action="" method="post">
              <div class="user-form">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputName"><?php echo $modal_givenName ?></label>
                    <input type="text" class="form-control" id="inputName" name="name" placeholder="" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputSurname"><?php echo $modal_surname ?></label>
                    <input type="text" class="form-control" id="inputSurname" name="surname" placeholder="" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail"><?php echo $modal_email ?></label>
                  <input type="email" class="form-control" id="inputEmail" name="email" placeholder="" required>
                </div>
                <div class="form-group">
                  <label for="inputPassword"><?php echo $modal_password ?></label>
                  <input type="password" class="form-control" id="inputPassword" name="password" placeholder="" required>
                </div>
                <div class="form-group">
                  <label for="inputAddress"><?php echo $modal_address ?></label>
                  <input type="text" class="form-control" id="inputAddress" name="address" placeholder="" required>
                </div>
                <div class="form-group">
                  <label for="inputCity"><?php echo $modal_city ?></label>
                  <input type="text" class="form-control" id="inputCity" name="city" placeholder="" required>
                </div>
                <div class="form-group">
                  <label for="inputBarangay"><?php echo $modal_barangay ?></label>
                  <input type="text" class="form-control" id="inputAddress" name="barangay" placeholder="" required>
                </div>
                <div class="form-group">
                  <label for="inputZIP"><?php echo $modal_zip ?></label>
                  <input type="text" class="form-control" id="inputZIP" name="ZIP" placeholder="" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="submit-btn" name="submit"><?php echo $modal_save ?></button>
                <button type="button" class="submit-btn" style="color: #433534; background: #fbfdfe;" data-dismiss="modal"><?php echo $modal_close ?></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
   
    <script src="../../../Js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
