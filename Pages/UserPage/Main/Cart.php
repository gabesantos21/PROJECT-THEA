<?php session_start(); ?>

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
    <link rel="stylesheet" href="../../../Css/styles.css?>
    <title>Cart</title>

    <?php 
    if (isset($_POST["add_to_cart"])) {
        if (isset($_SESSION["shopping_cart"])) {
            $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
            if (!in_array($_GET["id"], $item_array_id)) {
                $count = count($_SESSION["shopping_cart"]);
                $item_array = array(
                    'item_id'            =>    $_GET["id"],
                    'item_name'            =>    $_POST["productName"],
                    'item_price'        =>    $_POST["productPrice"],
                    'item_quantity'        =>    $_POST["productQuantity"],
                    'item_image'        =>    $_POST["productImage"],
                );
                $_SESSION["shopping_cart"][$count] = $item_array;
            } else {
                echo '<script>alert("Item Already Added")</script>';
            }
        } else {
            $item_array = array(
                'item_id'            =>    $_GET["id"],
                'item_name'            =>    $_POST["productName"],
                'item_price'        =>    $_POST["productPrice"],
                'item_quantity'        =>    $_POST["productQuantity"],
                'item_image'        =>    $_POST["productImage"],
            );
            $_SESSION["shopping_cart"][0] = $item_array;
        }
    }

    if (isset($_GET["action"])) {
        if ($_GET["action"] == "delete") {
            foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                if ($values["item_id"] == $_GET["id"]) {
                    unset($_SESSION["shopping_cart"][$keys]);
                    echo '<script>alert("Item Removed")</script>';
                    echo '<script>window.location="Cart.php"</script>';
                }
            }
        }
    }
  ?>
  </head>
  <body onload="onload()">

  <div class="section-page">
      <div class="container-fluid about-header header-division">CART</div>
      <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <td scope="col">Product Name</td>
                    <td scope="col">Image</td>
                    <td scope="col">Quantity</td>
                    <td scope="col">Price</td>
                    <td scope="col">Total</td>
                    <td scope="col">Action</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    if (!empty($_SESSION["shopping_cart"])) {
                        $total = 0;
                        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                    ?>
                <tr>
                    <td scope="row" style="vertical-align: middle;"><?php echo $values["item_name"]; ?></td>
                    <td style="vertical-align: middle;"><img src="../../../Assets/img/backgrounds/<?php echo $values["item_image"]; ?>" alt="" width="100rem"></a></td>
                    <td style="vertical-align: middle;"><?php echo $values["item_quantity"]; ?></td>
                    <td style="vertical-align: middle;">$ <?php echo $values["item_price"]; ?></td>
                    <td style="vertical-align: middle; color: green;">Php <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                    <td style="vertical-align: middle;"><a href="checkout.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                </tr>
            <?php
                            $total = $total + ($values["item_quantity"] * $values["item_price"]);
                        }
            ?>
            <tr>
                <td colspan="4" align="right"></td>
                <td align="right" style="color: green;"> <b>$ <?php echo number_format($total, 2); ?></b></td>
                <td><button style=" border-radius: 10px;" onclick="location.href = 'checkoutPayment.php'"> Confirm checkout</button></td>
            </tr>
        <?php
                    }
        ?>
            </tbody>
        </table>
    </div>
  </div>

  

  
    <div class="bottom-border"></div>
  </body>
</html>