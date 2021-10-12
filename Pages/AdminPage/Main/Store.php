
<?php include '../NavBar/AdminNavbar.php'; ?>

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

    if (isset($_GET["add"])) {
        if ($_GET["add"] == "success") {
          echo "<script>$('#add-success')
                  .fadeTo(2000, 500)
                  .slideUp(500, function () {
                    $('#success-alert').slideUp(500);
                  });
                </script>";
        } else{
            echo "<script>$('#error-alert')
                  .fadeTo(2000, 500)
                  .slideUp(500, function () {
                    $('#error-alert').slideUp(500);
                  });
                </script>";
        }
      }
      else if (isset($_GET["edit"])) {
        if ($_GET["edit"] == "success") {
          echo "<script>$('#edit-success')
                  .fadeTo(2000, 500)
                  .slideUp(500, function () {
                    $('#success-alert').slideUp(500);
                  });
                </script>";
        } else{
            echo "<script>$('#error-alert')
                  .fadeTo(2000, 500)
                  .slideUp(500, function () {
                    $('#error-alert').slideUp(500);
                  });
                </script>";
        }
      }
      else if (isset($_GET["delete"])) {
        if ($_GET["delete"] == "success") {
          echo "<script>$('#delete-success')
                  .fadeTo(2000, 500)
                  .slideUp(500, function () {
                    $('#success-alert').slideUp(500);
                  });
                </script>";
        } else{
            echo "<script>$('#error-alert')
                  .fadeTo(2000, 500)
                  .slideUp(500, function () {
                    $('#error-alert').slideUp(500);
                  });
                </script>";
        }
      }

  ?><?php 
    
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
                echo "         <form action='ProductVerify.php?action=add' method='post' class='card'>";
                echo "            <div class='product-image-container'> ";
                echo "              <img";
                echo "                class='card-img-top product-image'";
                echo "                src='../../../Assets/img/backgrounds/placeholder-img.jpg'";
                echo "                alt='Card image cap'";
                echo "               />";
                echo "                <input class='file-slider width-img-submit' style='color:white' id='input-b1' name='image' type='file' class='file' data-browse-on-zone-click='true'>";
                echo "             </div>";
                echo "            <div class='card-body card-product-container'>";  
                echo "              <div class='column-direction card-text center-title' style='height:auto;'>";
                echo "              <input type='text' class='column-margin form-control width-input' name='name' placeholder='Add Product Name'>";
                echo "              <input type='number' class='column-margin form-control width-input' name='price' placeholder='Add Price'>";
                echo "              <textarea type='text' class='column-margin form-control width-input' name='description' rows='5' value='' placeholder='Add Description'></textarea>";
                echo "              <div class='action-container' style='width: 40%;'>";
                echo "                    <input type='submit' class='cta-product add-to-cart-btn' value='Add' name='add_product'/>";
                echo "              </div>";
                echo "              </div>";
                echo "            </div>";
                echo "          </form>";
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
                      echo "                  <form action='Store.php?action=edit' method='post' class='form-add-to-cart'>";
                      echo "                    <input type='hidden' name='id' value='" . $row['id'] . "'>";
                      echo "                    <input type='hidden' name='name' value='" . $row['name'] . "'>";
                      echo "                    <input type='hidden' name='price' value='" . $row['price'] . "'>";
                      echo "                    <input type='hidden' name='image' value='" . $row['image'] . "'>";
                      echo "                    <input type='hidden' name='description' value='" . $row['description'] . "'>";
                      echo "                    <input type='submit' class='cta-product add-to-cart-btn' value='Edit' name='edit_product'/>";
                      echo "                  </form>";
                      echo "                  <form action='ProductVerify.php?action=delete' method='post' class='form-add-to-cart'>";
                      echo "                    <input type='hidden' name='id' value='" . $row['id'] . "'>";
                      echo "                    <input type='hidden' name='name' value='" . $row['name'] . "'>";
                      echo "                    <input type='hidden' name='price' value='" . $row['price'] . "'>";
                      echo "                    <input type='hidden' name='image' value='" . $row['image'] . "'>";
                      echo "                    <input type='hidden' name='description' value='" . $row['description'] . "'>";
                      echo "                    <input type='submit' class='cta-product add-to-cart-btn' value='Delete' name='delete_product'/>";
                      echo "                  </form>";
                      echo "              </div>";
                      echo "            </div>";
                      echo "          </div>";
                  }
                }
                ?>
      </div>
    </div>
    <?php }
    
    else if(!(isset($_GET["s"]))){
        if((isset($_GET["action"]) && $_GET["action"] == "edit")){ ?>
        <div class="section-page">
            <div class="container-fluid about-header header-division">Product</div>
                <form action="ProductVerify.php?action=edit" method="post" class="products-container">
                    <?php   echo "          <div class='card'>";
                            echo "            <div class='product-image-container'> ";
                            echo "              <img";
                            echo "                class='card-img-top product-image'";
                            echo "                src='../../../Assets/img/products/". $_POST['image']."'";
                            echo "                alt='Card image cap'";
                            echo "               />";
                            echo "                <input class='file-slider width-img-submit' style='color:white' id='input-b1' name='image' type='file' class='file' data-browse-on-zone-click='true'>";
                            echo "             </div>";
                            echo "            <div class='card-body card-product-container'>";  
                            echo "              <div class='column-direction card-text center-title' style='height:auto;'>";
                            echo "              <input type='hidden' class='column-margin form-control width-input' name='id' value='".$_POST['id']."'>";
                            echo "              <input type='text' class='column-margin form-control width-input' name='name' value='".$_POST['name']."'>";
                            echo "              <input type='number' class='column-margin form-control width-input' name='price' value='".$_POST['price']."'>";
                            echo "              <textarea type='text' class='column-margin form-control width-input' name='description' rows='5' value=''>".$_POST['description']."</textarea>";
                            echo "              <div class='action-container'>";
                            echo "                    <input type='submit' class='cta-product add-to-cart-btn' value='Save' name='edited_product'/>";
                            echo "                    <a href='store.php'>Go back</a>";
                            echo "              </div>";
                            echo "              </div>";
                            echo "            </div>";
                            echo "          </div>"; ?>
                </form>
        </div>
        <?php }else{ ?>
    <div class="section-page">
      <div class="container-fluid about-header header-division">Store</div>
      <div class="products-container">
        <?php
                      echo "         <form action='ProductVerify.php?action=add' method='post' class='card'>";
                      echo "            <div class='product-image-container'> ";
                      echo "              <img";
                      echo "                class='card-img-top product-image'";
                      echo "                src='../../../Assets/img/backgrounds/placeholder-img.jpg'";
                      echo "                alt='Card image cap'";
                      echo "               />";
                      echo "                <input class='file-slider width-img-submit' style='color:white' id='input-b1' name='image' type='file' class='file' data-browse-on-zone-click='true'>";
                      echo "             </div>";
                      echo "            <div class='card-body card-product-container'>";  
                      echo "              <div class='column-direction card-text center-title' style='height:auto;'>";
                      echo "              <input type='text' class='column-margin form-control width-input' name='name' placeholder='Add Product Name'>";
                      echo "              <input type='number' class='column-margin form-control width-input' name='price' placeholder='Add Price'>";
                      echo "              <textarea type='text' class='column-margin form-control width-input' name='description' rows='5' value='' placeholder='Add Description'></textarea>";
                      echo "              <div class='action-container' style='width: 40%;'>";
                      echo "                    <input type='submit' class='cta-product add-to-cart-btn' value='Add' name='add_product'/>";
                      echo "              </div>";
                      echo "              </div>";
                      echo "            </div>";
                      echo "          </form>";
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
                    echo "                  <form action='Store.php?action=edit' method='post' class='form-add-to-cart'>";
                    echo "                    <input type='hidden' name='id' value='" . $row['id'] . "'>";
                    echo "                    <input type='hidden' name='name' value='" . $row['name'] . "'>";
                    echo "                    <input type='hidden' name='price' value='" . $row['price'] . "'>";
                    echo "                    <input type='hidden' name='image' value='" . $row['image'] . "'>";
                    echo "                    <input type='hidden' name='description' value='" . $row['description'] . "'>";
                    echo "                    <input type='submit' class='cta-product add-to-cart-btn' value='Edit' name='edit_product'/>";
                    echo "                  </form>";
                    echo "                  <form action='ProductVerify.php?action=delete' method='post' class='form-add-to-cart'>";
                    echo "                    <input type='hidden' name='id' value='" . $row['id'] . "'>";
                    echo "                    <input type='hidden' name='name' value='" . $row['name'] . "'>";
                    echo "                    <input type='hidden' name='price' value='" . $row['price'] . "'>";
                    echo "                    <input type='hidden' name='image' value='" . $row['image'] . "'>";
                    echo "                    <input type='hidden' name='description' value='" . $row['description'] . "'>";
                    echo "                    <input type='submit' class='cta-product add-to-cart-btn' value='Delete' name='delete_product'/>";
                    echo "                  </form>";
                    echo "              </div>";
                    echo "            </di>";
                    echo "          </div>";
                }
                ?>
      </div>
    </div>
    <?php }
    }?>
  </body>
</html>