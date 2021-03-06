<?php @session_start();?>
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
      if(isset($_GET["action"]) && $_GET["action"] == 'checkout'){
          if(!isset($_SESSION['userName'])){
            header("Location: index.php?checkout=fail" );
          }
        }
      
      $dropdown_user = "User";
      $dropdown_user_login = "Login";
      $dropdown_user_signup = "Register";
      $dropdown_user_logout = "Logout";
      $nav_link_home = "Home";
      $nav_link_store = "Store";
      $nav_link_contact = "Contact Us";
      $nav_link_about = "About Us";
      $nav_link_check_orders = "Check Orders";
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


      
     
      
      //Login logic
          $isAuthenticated =  false;
          
          if(isset($_POST['submitlogin'])){
            $loginUser = $_POST['logname'];
            $loginPass = $_POST['logpassword'];

            $sql = 'SELECT * from user_account;';
            $result = $conn->query($sql);

            while($row = $result->fetch_assoc()){
            
              if($row['user_name'] == $loginUser && password_verify($loginPass, $row['password'])){
                $_SESSION['userLogged'] = "true";
                $_SESSION['userName'] = $loginUser;
                $_SESSION['userId'] = $row['user_id'];
                $_SESSION['isAdmin'] = false;
                $isAuthenticated = true;
                if(is_null($row['f_name']) && is_null($row['l_name']) && is_null($row['phone_number']) && is_null($row['e_mail'])){
                  $_SESSION['isAdmin'] = true;
                }
                break;
              }
              
              
            }
            
          }
          if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']){
              header("Location: ../../AdminPage/Main/index.php?login=success" );
          }
          

          if(isset($_SESSION['userName'])){
            
            $dropdown_greet_user = "Hi, " . $_SESSION['userName'];

          }

     
      // Add to cart session are stored with this code

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
              header("Location: ../Main/store.php?addcart=fail" );
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
            header("Location: ../Main/store.php?checkout=ready" );
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
              <?php if (isset($_SESSION['userLogged'])) { ?>
                <a href=""class="dropdown-items" style="letter-spacing: 0px" data-toggle="modal" data-target=".user-modal-container"><?php echo $dropdown_greet_user?></a>  
                <a href="OrderStatusPage.php"class="dropdown-items" style="letter-spacing: 0px"><?php echo $nav_link_check_orders?></a> 
                <form action="../Main/Logout.php?action=logout" method="post">
                <input type="submit"class="dropdown-items" style="letter-spacing: 0px" value="<?php echo $dropdown_user_logout?>">
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

    <!-- Alerts initialized in the nav -->

    <div class="alert-container-nav" id="success-alert">
      <div class="alert alert-success alert-dismissible success-alert-gold">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Successfully added to cart!
      </div>
    </div>
    
    <div class="alert-container-nav" id="success-update">
      <div class="alert alert-success alert-dismissible success-alert-gold">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Successfully updated your credentials!
      </div>
    </div>
    <div class="alert-container-nav" id="success-logout">
      <div class="alert alert-success alert-dismissible success-alert-gold">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Logged out of your account!
      </div>
    </div>

    <div class="alert-container-nav" id="regsuccess-alert">
      <div class="alert alert-success alert-dismissible success-alert-gold">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Successfully created your account!
      </div>
    </div>

    <div class="alert-container-nav" id="loginsuccess-alert">
      <div class="alert alert-success alert-dismissible success-alert-gold">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php echo "Successfully logged in! Hi, " . $_SESSION['userName'] . "!";?>
      </div>
    </div>
    
    <div class="alert-container-nav" id="addcart-error">
      <div class="alert alert-danger alert-dismissible ">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Item already inside the cart!
      </div>
    </div>
    
    <div class="alert-container-nav" id="checkout-error">
      <div class="alert alert-danger alert-dismissible ">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Item already ready for checkout!
      </div>
    </div>            

    <div class="alert-container-nav" id="checkout-alert">
      <div class="alert alert-success alert-dismissible success-alert-gold">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Successfully checked out!
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

    <!-- Hide at start -->
    <script>$("#success-alert").hide();</script>
    <script>$("#addcart-error").hide();</script>
    <script>$("#checkout-error").hide();</script>
    <script>$("#success-logout").hide();</script>
    <script>$("#success-update").hide();</script>
    <script>$("#regsuccess-alert").hide();</script>
    <script>$("#loginsuccess-alert").hide();</script>
    <script>$("#checkout-alert").hide();</script>
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
              <form action="Checkout.php?action=checkout" method="post">
                  <input  <?php if(!isset($_SESSION['shopping_cart']) || empty($_SESSION['shopping_cart'])){ echo " disabled=\"disabled\"  style=\"cursor: default;\""; } ?> type="submit" class="submit-btn" name="submitcart" value="<?php echo  $modal_checkout ?>"">
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
            <!-- You may do it here or add another php file to do the processing of the login (after successful, redirects to index) -->
            <!-- if error persists in making changes create an error alert -->
            <form action="" method="post">
              <div class="user-form">
              <?php
                    if(isset($_POST['submitlogin'])){
                        
                      if(!$isAuthenticated){
                        echo "<script type='text/javascript'>
                        
                          $(document).ready(function(){
                            jQuery.noConflict();
                            $('.login-modal-container').modal('show');
                            });
                       </script>";
                        echo "<div class='alert alert-danger' role='alert'> 
                        Username or Password is incorrect!
                        </div>";
                      }
                      

                    }
                    if(isset($_GET['checkout']) && $_GET['checkout'] == 'fail' && !isset($_POST['submitlogin'])){
                      echo "<script type='text/javascript'>
                                      
                                        $(document).ready(function(){
                                          jQuery.noConflict();
                                          $('.login-modal-container').modal('show');
                                          });
                                     </script>";
                                      echo "<div class='alert' role='alert'> 
                                      Please log in before checking out.
                                      </div>";
                    }
                    if(isset($_GET['guest']) && $_GET['guest'] == 'fail' && !isset($_POST['submitlogin'])){
                      echo "<script type='text/javascript'>
                                      
                                        $(document).ready(function(){
                                          jQuery.noConflict();
                                          $('.login-modal-container').modal('show');
                                          });
                                     </script>";
                                      
                    }
                ?>
                <div class="form-group">
                  <label for="inputUsername"><?php echo $modal_username ?></label>
                  <input type="text" class="form-control" id="inputUsername" name="logname" placeholder="" required>
                </div>
                <div class="form-group">
                  <label for="inputPassword"><?php echo $modal_password ?></label>
                  <input type="password" class="form-control" id="inputPassword" name="logpassword" placeholder="" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="submit-btn" name="submitlogin"><?php echo  $modal_submit ?></button>
                <button type="button" class="submit-btn" style="color: #433534; background: #fbfdfe;" data-dismiss="modal"><?php echo $modal_close ?></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
      

      <!--Registration Logic -->
    <?php

      if(isset($_POST['submitregister'])){
            $fname = $_POST['name'];
            $sname = $_POST['surname'];
            $uname = $_POST['username'];
            $number = $_POST['number'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password2 = $_POST['confirmPassword'];


            $sql = 'SELECT * from user_account;';
            $result = $conn->query($sql);
            $sameUser = false;
            $passwordConfirmed = true;

            while($row = $result->fetch_assoc()){
              if($row['user_name'] == $uname){
                $sameUser = true;
                break;
              }
            }
            
            if($password != $password2){
              $passwordConfirmed = false;
            }
              
            

            if(!$sameUser && $passwordConfirmed){
              $hashed = password_hash($password, PASSWORD_DEFAULT);
              $sql = "INSERT INTO user_account(f_name, l_name, user_name, phone_number, e_mail, password) 
              VALUES (?, ?, ?, ?, ?, ?);";
              $stmt = $conn->prepare($sql);
              $stmt->bind_param("ssssss", $fname, $sname, $uname, $number, $email, $hashed);
              $stmt->execute();
            }
            
      }

    ?>
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
              <?php
                    if(isset($_POST['submitregister'])){
                        
                      if(!$passwordConfirmed || $sameUser){
                        echo "<script type='text/javascript'>
                        
                          $(document).ready(function(){
                            jQuery.noConflict();
                            $('.register-modal-container').modal('show');
                            });
                       </script>";
                        
                        
                      }
                      if($sameUser){
                        echo "<p style='color:red;'>An account with the username " . $uname;
                        echo " already exists!</p>";
                      }
                      if(!$passwordConfirmed){
                        echo "<p style='color:red;'>The passwords you entered are not the same!</p>";
                      }

                    }
                ?>
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
                <button type="submit" class="submit-btn" name="submitregister"><?php echo $modal_submit ?></button>
                <button type="button" class="submit-btn" style="color: #433534; background: #fbfdfe;" data-dismiss="modal"><?php echo $modal_close?></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- User Modal Logic -->
    <?php
    
      $userFname = '';
      $userLname = '';
      $userEmail = '';
      $userAddress ='';
      $userCity = '';
      $userBarangay = '';
      $userZip = '';
      
      
      if(isset($_POST['usersubmit'])){
        $uname = $_SESSION['userName'];
        $userFname = $_POST['name'];
        $userLname = $_POST['surname'];
        $userEmail = $_POST['email'];
        $userAddress = $_POST['address'];
        $userCity = $_POST['city'];
        $userBarangay = $_POST['barangay'];
        $userZip = $_POST['ZIP'];
        $password1 = $_POST['password'];
        $password2 = $_POST['confirmPassword'];
        $passwordConfirmed = true;
        if(isset($password1) && isset($password2) && !empty($password1) && !empty($password2)){
          if($password1 == $password2){
            $passwordConfirmed = true;
            $hashed = password_hash($password1, PASSWORD_DEFAULT);

            $userSql = "UPDATE user_account SET f_name = ? , l_name = ? , e_mail = ? , 
            address = ? , city = ? , barangay = ? , zip = ? , password = ?
            WHERE user_name = ? ;";
            $stmt = $conn->prepare($userSql);
            $stmt->bind_param("sssssssss", $userFname, $userLname, $userEmail, 
            $userAddress, $userCity, $userBarangay, $userZip, $hashed, $uname);
            $stmt->execute();
          }else{
            $passwordConfirmed = false;
          }
          
        }else{
          $userSql = "UPDATE user_account SET f_name = ? , l_name = ? , e_mail = ? , 
          address = ? , city = ? , barangay = ? , zip = ? 
          WHERE user_name = ? ;";
          $stmt = $conn->prepare($userSql);
          $stmt->bind_param("ssssssss", $userFname, $userLname, $userEmail, 
          $userAddress, $userCity, $userBarangay, $userZip, $uname);
          $stmt->execute();

        }
        
      }

      if(isset($_SESSION['userName'])){
        $userSql = "SELECT * from user_account WHERE user_name = '" . $_SESSION['userName'] . "';";
        $userResult = $conn->query($userSql);
        if($userRow = $userResult->fetch_assoc()){
          $userFname = $userRow['f_name'];
          $userLname = $userRow['l_name'];
          $userEmail = $userRow['e_mail'];
          @$userAddress = $userRow['address'];
          @$userCity = $userRow['city'];
          @$userBarangay = $userRow['barangay'];
          @$userZip = $userRow['zip'];
          
        }
        
      }
      
    
    ?>

    <!-- User Modal -->
    <div class="modal fade bd-example-modal user-modal-container" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal modal-dialog-centered">
        <div class="modal-content modal-container">
          <div class="modal-header modal-header-center">
            <h5 class="modal-title modal-title-size"><?php echo $modal_user ?></h5>
          </div>
          <div class="modal-body">
            <!-- You may do it here or add another php file to do the processing of the saving user changes (if error persists in making changes create an error alert) -->
            <form action="" method="post">
              <div class="user-form">
              <?php
                    if(isset($_POST['usersubmit'])){
                        
                      if(!$passwordConfirmed){
                        echo "<script type='text/javascript'>
                        
                          $(document).ready(function(){
                            jQuery.noConflict();
                            $('.user-modal-container').modal('show');
                            });
                       </script>";
                        
                        echo "<p style='color:red;'>The passwords you entered are not the same!</p>";
                        
                      }
                    

                    }
                ?>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputName"><?php echo $modal_givenName ?></label>
                    <input type="text" class="form-control" id="inputName" name="name" value="<?php echo  $userFname ?>" placeholder="">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputSurname"><?php echo $modal_surname ?></label>
                    <input type="text" class="form-control" id="inputSurname" name="surname" value="<?php echo  $userLname ?>" placeholder="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail"><?php echo $modal_email ?></label>
                  <input type="email" class="form-control" id="inputEmail" name="email" value="<?php echo  $userEmail ?>" placeholder="">
                </div>
                <div class="form-group">
                  <label for="inputPassword"><?php echo $modal_password ?></label>
                  <input type="password" minlength="8" class="form-control" id="inputPassword" name="password" placeholder="" >
                </div>
                <div class="form-group">
                  <label for="inputConfirmPassword"><?php echo $modal_CPassword ?></label>
                  <input type="password" minlength="8" class="form-control" id="inputConfirmPassword" name="confirmPassword" placeholder="">
                </div>
                <div class="form-group">
                  <label for="inputAddress"><?php echo $modal_address ?></label>
                  <input type="text" class="form-control" id="inputAddress" name="address" value="<?php echo  $userAddress ?>" placeholder="" >
                </div>
                <div class="form-group">
                  <label for="inputCity"><?php echo $modal_city ?></label>
                  <input type="text" class="form-control" id="inputCity" name="city" value="<?php echo  $userCity ?>" placeholder="" >
                </div>
                <div class="form-group">
                  <label for="inputBarangay"><?php echo $modal_barangay ?></label>
                  <input type="text" class="form-control" id="inputAddress" name="barangay" value="<?php echo  $userBarangay ?>" placeholder="">
                </div>
                <div class="form-group">
                  <label for="inputZIP"><?php echo $modal_zip ?></label>
                  <input type="text" class="form-control" id="inputZIP" name="ZIP" value="<?php echo  $userZip ?>" placeholder="" >
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="submit-btn" name="usersubmit"><?php echo $modal_save ?></button>
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
