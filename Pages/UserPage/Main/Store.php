<?php include '../NavBar/Navbar.php'; ?>

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
    <title>Store</title>
  </head>
  <body onload="onload()">

  <?php 
    $store_header = "Shop";

    // if (isset($_SESSION["shopping_cart"])) {
    //   $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
    //   if (in_array(@$_GET["id"], $item_array_id)) {
    //     echo "<script>
    //       $('#duplicate-item-alert')
    //         .fadeTo(2000, 500)
    //         .slideUp(500, function () {
    //           $('#duplicate-item-alert').slideUp(500);
    //         });
    //           </script>";
    //   } 
    // }

    //  gets status and displays alert (alerts are stored in the navbar)
    if (isset($_GET["action"])) {
      if ($_GET["action"] == "add") {
        echo "<script>$('#success-alert')
                .fadeTo(2000, 500)
                .slideUp(500, function () {
                  $('#success-alert').slideUp(500);
                });
              </script>";
      }
    }?>
    
    <?php 
    
    if(isset($_GET["s"])){
      $productName = $_GET["s"];
      $productName = htmlspecialchars($productName);
      $productName = mysqli_real_escape_string($conn, $productName); 

      $sql = "SELECT * FROM product_list WHERE (`name` LIKE '%" . $productName . "%') OR (`Name` LIKE '%" . $productName . "%')";
      $result = mysqli_query($conn, $sql);

      $sql2 = "SELECT * FROM product_list WHERE (`name` LIKE '%" . $productName . "%') OR (`Name` LIKE '%" . $productName . "%')";
      $ifExists = mysqli_query($conn, $sql2);

    ?>
    <div class="section-page">
      <div class="container-fluid about-header header-division"><?php echo $store_header ?></div>
      <div class="products-container">
        <?php

            if(!($row = mysqli_fetch_array($ifExists))){
              echo "<div class='no-product'><p>The product '<span class='product-search'>". $productName."</span>' does not exist!</p></div>";
            }
            else{
              while ($row = mysqli_fetch_array($result)) {
                      echo "          <div class='card'>";
                      echo "            <div class='product-image-container'> ";
                      echo "              <img";
                      echo "                class='card-img-top product-image'";
                      echo "                src='../../../Assets/img/products/". $row['image']."'";
                      echo "                alt='Card image cap'";
                      echo "               />";
                      echo "             </div>";
                      echo "            <div class='card-body card-product-container'>";
                      echo "              <h3 class='card-title center-title'>".$row['name']."</h3>";
                      echo "              <div class='card-text center-title'>";
                      echo "                <h5>PHP ".$row['price']."</h5>";
                      echo "              </div>";
                      echo "              <p class='card-text justify-text'>";
                      echo "                 ".$row['description']."";
                      echo "              </p>";
                      echo "              <div class='action-container'>";
                      echo "                  <form action='store.php?action=add&id=".$row['id']."' method='post' class='form-add-to-cart'>";
                      echo "                    <input type='hidden' value='1' id='quantity' name='productQuantity'>";
                      echo "                    <input type='hidden' name='productName' value='" . $row['name'] . "'>";
                      echo "                    <input type='hidden' name='productPrice' value='" . $row['price'] . "'>";
                      echo "                    <input type='hidden' name='productImage' value='" . $row['image'] . "'>";
                      echo "                    <input type='submit' class='cta-product add-to-cart-btn' value='Add to Cart' name='add_to_cart'/>";
                      echo "                  </form>";
                      echo "                  <form action='Checkout.php?action=add&id='" . $row['id'] . "' method='post' class='form-add-to-cart'>";
                      echo "                    <input type='hidden' value='1' id='quantity' name='productQuantity'>";
                      echo "                    <input type='hidden' name='productName' value='" . $row['name'] . "'>";
                      echo "                    <input type='hidden' name='productPrice' value='" . $row['price'] . "'>";
                      echo "                    <input type='hidden' name='productImage' value='" . $row['image'] . "'>";
                      echo "                    <input type='submit' class='cta-product checkout-btn' value='Checkout' name='checkout'/>";
                      echo "                  </form>";
                      echo "              </div>";
                      echo "            </div>";
                      echo "          </div>";
                  }
                }
                ?>
      </div>
    </div>
    <?php 
    }
    else{ ?>
    <div class="section-page">
      <div class="container-fluid about-header header-division">Store</div>
      <div class="products-container">
        <?php
            $sql = "SELECT * FROM product_list";
            $result = mysqli_query($conn, $sql);
            $row_size = mysqli_num_rows($result);
            while ($row = mysqli_fetch_array($result)) {
                    echo "          <div class='card'>";
                    echo "            <div class='product-image-container'> ";
                    echo "              <img";
                    echo "                class='card-img-top product-image'";
                    echo "                src='../../../Assets/img/products/". $row['image']."'";
                    echo "                alt='Card image cap'";
                    echo "               />";
                    echo "             </div>";
                    echo "            <di`v class='card-body card-product-container'>";
                    echo "              <h3 class='card-title center-title'>".$row['name']."</h3>";
                    echo "              <div class='card-text center-title'>";
                    echo "                <h5>PHP ".$row['price']."</h5>";
                    echo "              </div>";
                    echo "              <p class='card-text justify-text'>";
                    echo "                 ".$row['description']."";
                    echo "              </p>";
                    echo "              <div class='action-container'>";
                    echo "                  <form action='store.php?action=add&id=".$row['id']."' method='post' class='form-add-to-cart'>";
                    echo "                    <input type='number' class='form-control' value='1' min='1' name='productQuantity' required'>";
                    echo "                    <input type='hidden' name='productName' value='" . $row['name'] . "'>";
                    echo "                    <input type='hidden' name='productPrice' value='" . $row['price'] . "'>";
                    echo "                    <input type='hidden' name='productImage' value='" . $row['image'] . "'>";
                    echo "                    <input type='submit' class='cta-product add-to-cart-btn' value='Add to Cart' name='add_to_cart'/>";
                    echo "                  </form>";
                    echo "                  <form action='Checkout.php?action=checkout&id=" . $row['id'] . "' method='post' class='form-add-to-cart'>";
                    echo "                    <input type='number' class='form-control' value='1' min='1' name='productQuantity' required>";
                    echo "                    <input type='hidden' name='productName' value='" . $row['name'] . "'>";
                    echo "                    <input type='hidden' name='id' value='" . $row['id'] . "'>";
                    echo "                    <input type='hidden' name='productPrice' value='" . $row['price'] . "'>";
                    echo "                    <input type='hidden' name='productImage' value='" . $row['image'] . "'>";
                    echo "                    <input type='submit' class='cta-product checkout-btn' value='Checkout' name='checkout'/>";
                    echo "                  </form>";
                    echo "              </div>";
                    echo "            </di>";
                    echo "          </div>";
                }
                ?>
      </div>
    </div>
      <?php 
    } ?>
  </body>
</html>