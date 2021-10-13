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
      $_SESSION['userLogged'] = "false";

      $dropdown_user = "User"; 
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
      $modal_username = "User Name";
      $modal_password = "Password";
      $modal_submit = "Submit";
      $modal_checkout = "Checkout";
      $modal_close = "Close";
      $modal_givenName = "Name";
      $modal_surname = "Surname";
      $modal_CPassword = "Confirm Password";
      $modal_number = "Phone Number";
      $modal_save = "Save Changes";
      $modal_user = "User";
      $modal_address = "Address";
      $modal_city = "City";
      $modal_barangay = "Barangay";
      $modal_zip = "ZIP";

      if (isset($_POST["add_to_cart"])) {
        if (isset($_SESSION["shopping_cart"])) {
            $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
            if (!in_array($_GET["id"], $item_array_id)) {
                $count = count($_SESSION["shopping_cart"]);
                $item_array = array(
                    'item_id'           =>    $_GET["id"],
                    'item_name'         =>    $_POST["productName"],
                    'item_price'        =>    $_POST["productPrice"],
                    'item_quantity'     =>    $_POST["productQuantity"],
                    'item_image'        =>    $_POST["productImage"],
                );
                $_SESSION["shopping_cart"][$count] = $item_array;
            } else{
            echo '<script>alert("Item Already Added")</script>';
            }
        } else {
            $item_array = array(
                'item_id'           =>    $_GET["id"],
                'item_name'         =>    $_POST["productName"],
                'item_price'        =>    $_POST["productPrice"],
                'item_quantity'     =>    $_POST["productQuantity"],
                'item_image'        =>    $_POST["productImage"],
            );
            $_SESSION["shopping_cart"][0] = $item_array;
        }

    }else if (isset($_POST["checkout"])) {
      if (isset($_SESSION["shopping_cart"])) {
          $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
          if (!in_array($_GET["id"], $item_array_id)) {
              $count = count($_SESSION["shopping_cart"]);
              $item_array = array(
                  'item_id'           =>    $_GET["id"],
                  'item_name'         =>    $_POST["productName"],
                  'item_price'        =>    $_POST["productPrice"],
                  'item_quantity'     =>    $_POST["productQuantity"],
                  'item_image'        =>    $_POST["productImage"],
              );
              $_SESSION["shopping_cart"][$count] = $item_array;
              header("Location: checkout.php" );
          } else{
          echo '<script>alert("Item Already Ready for checkout!")</script>';
          }
      } else {
          $item_array = array(
              'item_id'           =>    $_GET["id"],
              'item_name'         =>    $_POST["productName"],
              'item_price'        =>    $_POST["productPrice"],
              'item_quantity'     =>    $_POST["productQuantity"],
              'item_image'        =>    $_POST["productImage"],
          );
          $_SESSION["shopping_cart"][0] = $item_array;
      }
  }
    if (isset($_GET["action"])) {
        if ($_GET["action"] == "deleteCart" || $_GET["action"] == "delete") {
            foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                if ($values["item_id"] == $_GET["id"]) {
                    unset($_SESSION["shopping_cart"][$keys]);
                }
            }
        }
    } 

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
              <li><a href="../../UserPage/Main/index.php" class="nav-home-link"><?php echo $nav_link_home ?><img src="../../../Assets/img/icons/dropdown.svg" alt=""> |</a></li>
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
            <a href="" data-toggle="modal" data-target=".cart-modal-container">
              <img src="../../../Assets/img/icons/cart.svg" alt="">
            </a>
          </li>
          <li class="nav-user">
              <img src="../../../Assets/img/icons/user.svg" alt="">
            <div class="dropdown-user-control">
              <?php if (@$_SESSION['userLogged'] == "true") { ?>
                <a href=""class="dropdown-items" style="letter-spacing: 0px" data-toggle="modal" data-target=".user-modal-container"><?php echo $dropdown_greet_user?></a>   
                <form action="">
                <a href=""class="dropdown-items" style="letter-spacing: 0px" ><?php echo $dropdown_user_logout?></a>
                </form>
                    <?php
                }
                    else{?>
                <a href=""class="dropdown-items" style="letter-spacing: 0px" data-toggle="modal" data-target=".login-modal-container"><?php echo $dropdown_user_login?></a>
                <a href=""class="dropdown-items" style="letter-spacing: 0px" data-toggle="modal" data-target=".register-modal-container"><?php echo $dropdown_user_signup?></a>
          <?php } ?>
            </div>  
          </li>
        </ul>
    </nav>

    <div class="alert-container-nav" id="success-alert">
      <div class="alert alert-success alert-dismissible success-alert-gold">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Successfully added to cart!
      </div>
    </div>

    <div class="alert-container-nav" id="success-remove-alert">
      <div class="alert alert-success alert-dismissible ">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Successfully removed from Checkout!
      </div>
    </div>

    <div class="alert-container-nav" id="success-remove-alert-cart">
      <div class="alert alert-success alert-dismissible ">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Successfully removed from Cart!
      </div>
    </div>

    <!-- <div class="alert-container-nav" id="duplicate-item-alert">
      <div class="alert alert-danger alert-dismissible ">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Uh oh! That item has already been added to the cart!
      </div>
    </div> -->

    <script>$("#success-alert").hide();</script>
    <script>$("#success-remove-alert").hide();</script>
    <script>$("#success-remove-alert-cart").hide();</script>

    <!-- <script>$("#duplicate-item-alert").hide();</script> -->

      <!-- Cart Modal -->
  <div class="modal fade bd-example-modal-lg cart-modal-container" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content modal-container">
          <div class="modal-header modal-header-center">
            <h5 class="modal-title modal-title-size">Cart</h5>
          </div>
          <div class="modal-body">
            <table class="table table-sm table-hover">
              <thead class="dark">
                <?php if (!empty($_SESSION["shopping_cart"])) {
                  $total = 0;?>
                <tr>
                  <th scope="col">Product Name</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Price</th>
                  <th scope="col">Total</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody> <?php foreach ($_SESSION["shopping_cart"] as $keys => $values) { ?>
                <tr>
                  <td scope="row" style="vertical-align: middle;"><?php echo $values["item_name"]; ?></td>
                  <td><?php echo $values["item_quantity"]; ?></td>
                  <td>Php <?php echo $values["item_price"]; ?></td>
                  <td>Php <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                  <td><a href="../Main/index.php?action=deleteCart&id=<?php echo $values["item_id"]; ?>"><span style="color: #281816;">Remove</span></a></td>
                </tr><?php @$total = @$total + ($values["item_quantity"] * $values["item_price"]); 
                      }?>
                <tr>
                  <td colspan="3"></td>
                  <td style="color: rgb(67 53 52); font-weight: bold;">Php <?php echo number_format(@$total, 2); ?></td>
                  <td colspan="1"></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
            <?php
              if (empty($_SESSION["shopping_cart"])){ ?>
                <div class="no-item-cart">
                  You have nothing in your cart. Click <a href="../Main/Store.php">store</a> to add items to your cart!
                </div>
            <?php } ?>
            <div class="modal-footer">
              <form action="Checkout.php" method="post">
                  <button type="submit" class="submit-btn" name="submit"><?php echo  $modal_checkout ?></button>
              </form>
                  <button type="button" class="submit-btn" style="color: #433534; background: #fbfdfe;" data-dismiss="modal"><?php echo $modal_close ?></button>
            </div>
          </div>
        </div>
      </div>
    </div>

     <!-- Login Modal -->
     <div class="modal fade bd-example-modal login-modal-container" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal modal-dialog-centered">
        <div class="modal-content modal-container">
          <div class="modal-header modal-header-center">
            <h5 class="modal-title modal-title-size"><?php echo $dropdown_user_login ?></h5>
            <button type="button" class="gmail-login"><?php echo $modal_login_gmail ?></button>
            <button type="button" class="facebook-login"><?php echo $modal_login_facebook ?></button>
          </div>
          <div class="modal-body">
            <form action="" method="post">
              <div class="user-form">
                <div class="form-group">
                  <label for="inputUsername"><?php echo $modal_username ?></label>
                  <input type="text" class="form-control" id="inputUsername" name="name" placeholder="" required>
                </div>
                <div class="form-group">
                  <label for="inputPassword"><?php echo $modal_password ?></label>
                  <input type="password" class="form-control" id="inputPassword" name="password" placeholder="" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="submit-btn" name="submit"><?php echo  $modal_submit ?></button>
                <button type="button" class="submit-btn" style="color: #433534; background: #fbfdfe;" data-dismiss="modal"><?php echo $modal_close ?></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

      <!-- Register Modal -->
      <div class="modal fade bd-example-modal register-modal-container" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal modal-dialog-centered">
        <div class="modal-content modal-container">
          <div class="modal-header modal-header-center">
            <h5 class="modal-title modal-title-size"><?php echo $dropdown_user_signup ?></h5>
            <button type="button" class="gmail-login"><?php echo $modal_register_gmail ?></button>
            <button type="button" class="facebook-login"><?php echo $modal_register_facebook ?></button>
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
                  <label for="inputUsername"><?php echo $modal_username ?></label>
                  <input type="tel" class="form-control" id="inputUsername" name="username" placeholder="" required>
                </div>
                <div class="form-group">
                  <label for="inputNumber"><?php echo $modal_number ?></label>
                  <input type="tel" class="form-control" id="inputNumber" name="number" placeholder="" required>
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
                  <label for="inputConfirmPassword"><?php echo $modal_CPassword ?></label>
                  <input type="password" class="form-control" id="inputConfirmPassword" name="confirmPassword" placeholder="" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="submit-btn" name="submit"><?php echo $modal_submit ?></button>
                <button type="button" class="submit-btn" style="color: #433534; background: #fbfdfe;" data-dismiss="modal"><?php echo $modal_close?></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

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
  	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
