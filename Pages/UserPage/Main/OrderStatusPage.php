<?php include '../../UserPage/NavBar/Navbar.php' ?>
<html>
    <head>
        <title>ORDERS</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/37cafce672.js" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Checkout</title>
    <link rel="stylesheet" href="../../../Css/styles-for-checkout.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../../../Css/styles.css?v=<?php echo time(); ?>">
    </head>

    <body>

    <?php 
    if (isset($_GET["action"])) {
        if ($_GET["action"] == "delete") {
          echo "<script>
          $(document).ready(function() {
          $('#success-remove-alert')
          .fadeTo(2000, 500)
          .slideUp(500, function () {
            $('#success-remove-alert').slideUp(500);
          });
        });
                </script>";
        }
      }


    ?>

        <div class = "header-border">
            <div class="page-banner"><div class="banner-text">ORDERS</div></div>
        </div>

        <div class="order-list-nav">
            <a href="OrderStatusPage.php?list=completed">Completed Orders</a>
            <a href="OrderStatusPage.php">Pending Orders</a>
            <a href="OrderStatusPage.php?list=declined">Cancelled Orders</a>
        </div>

        <!-- TODO for backend - automate the rows -->


        <!-- Completed Order Table -->
        <?php if(isset($_GET["list"])){
            if ($_GET["list"] == "completed"){

                $sql1 = "SELECT user_id from user_account where user_name = '" .  $_SESSION['userName'] . "';"; 
                $thisUser = $conn->query($sql1);
                $userID;
                if($userRow = $thisUser->fetch_assoc()){
                    $userID = $userRow['user_id'];
                }
                $sql = "SELECT * from orders where status = 'Completed' AND user_id = '". $userID ."';";
                $result = $conn->query($sql);
                
        ?>

         <div class="orderPage-table-container">
            <h4>Completed Orders</h4>
            <table class="orderPage-table">
                <th style="width:15%">Order ID</th>
                <th style="width:15%">Customer ID</th>
                <th style="width:20%">Order Date</th>
                <th style="width:20%">Full Address</th>
                <th style="width:10%;text-align: center;" >Total Amount</th>
                <th style="width:10%">Order Status</th>
                <th style="width:15%">Action</th>
                
                        <?php 
                            while($row = $result->fetch_assoc()){
                            $sql2 = "SELECT * from order_items where order_id = '". $row['order_id'] . "';";
                            $result1 = $conn->query($sql2);
                            $count = 0;

                            while($row1 = $result1->fetch_assoc()){
                                $count += $row1['quantity'];
                            }
                        
                        ?>


                        <tr>
                        <td data-label="Order ID"><?php echo $row['order_id']; ?></td>
                        <td data-label="Customer ID"><?php echo $row['user_id']; ?></td>
                        <td data-label="Order Date"><?php echo $row['order_date']; ?></td>
                        <td data-label="Full Address"><?php echo $row['f_address']; ?></td>
                        <td data-label="Total Amount" style="text-align: center;"><?php echo $count; ?></td>
                        <td data-label="Order Status"><?php echo $row['status']; ?></td>
                            
                        <td data-label="View"><a href="OrderStatusPage.php?order=<?php echo $row['order_id'] ?>">View Order</a></td>
                    </tr>
                    <?php }?>
            </table>
        </div>
        <?php
            } else if ($_GET["list"] == "declined"){

                    $sql1 = "SELECT user_id from user_account where user_name = '" .  $_SESSION['userName'] . "';"; 
                    $thisUser = $conn->query($sql1);
                    $userID;
                    if($userRow = $thisUser->fetch_assoc()){
                        $userID = $userRow['user_id'];
                    }
                    $sql = "SELECT * from orders where status = 'Cancelled' AND user_id = '". $userID ."';";
                    $result = $conn->query($sql);
                    
        ?>
            <!-- Declined Orders Table -->
        <div class="orderPage-table-container">
        <h4>Cancelled Orders</h4>
            <table class="orderPage-table">
                <th style="width:15%">Order ID</th>
                <th style="width:15%">Customer ID</th>
                <th style="width:20%">Order Date</th>
                <th style="width:20%">Full Address</th>
                <th style="width:10%;text-align: center;" >Total Amount</th>
                <th style="width:10%">Order Status</th>
                <th style="width:15%">Action</th>
                <?php 
                            while($row = $result->fetch_assoc()){
                            $sql2 = "SELECT * from order_items where order_id = '". $row['order_id'] . "';";
                            $result1 = $conn->query($sql2);
                            $count = 0;

                            while($row1 = $result1->fetch_assoc()){
                                $count += $row1['quantity'];
                            }
                        
                        ?>


                        <tr>
                        <td data-label="Order ID"><?php echo $row['order_id']; ?></td>
                        <td data-label="Customer ID"><?php echo $row['user_id']; ?></td>
                        <td data-label="Order Date"><?php echo $row['order_date']; ?></td>
                        <td data-label="Full Address"><?php echo $row['f_address']; ?></td>
                        <td data-label="Total Amount" style="text-align: center;"><?php echo $count; ?></td>
                        <td data-label="Order Status"><?php echo $row['status']; ?></td>
                            
                        <td data-label="View"><a href="OrderStatusPage.php?order=<?php echo $row['order_id'] ?>">View Order</a></td>
                    </tr>
                    <?php }?>
            </table>
        </div>
        <?php }
            }else if (!isset($_GET["list"]) && !isset($_GET["order"])){
                $sql1 = "SELECT user_id from user_account where user_name = '" .  $_SESSION['userName'] . "';"; 
                $thisUser = $conn->query($sql1);
                $userID;
                if($userRow = $thisUser->fetch_assoc()){
                    $userID = $userRow['user_id'];
                }
                $sql = "SELECT * from orders where status = 'Pending' AND user_id = '". $userID ."';";
                $result = $conn->query($sql);
                ?>
            <!-- Pending Orders Table -->
        <div class="orderPage-table-container">
            <h4>Pending Orders</h4>
            <table class="orderPage-table">
            <th style="width:15%">Order ID</th>
                <th style="width:15%">Customer ID</th>
                <th style="width:20%">Order Date</th>
                <th style="width:20%">Full Address</th>
                <th style="width:10%;text-align: center;" >Total Amount</th>
                <th style="width:10%">Order Status</th>
                <th style="width:15%">Action</th>
                <?php 
                            while($row = $result->fetch_assoc()){
                            $sql2 = "SELECT * from order_items where order_id = '". $row['order_id'] . "';";
                            $result1 = $conn->query($sql2);
                            $count = 0;

                            while($row1 = $result1->fetch_assoc()){
                                $count += $row1['quantity'];
                            }
                        
                        ?>


                        <tr>
                        <td data-label="Order ID"><?php echo $row['order_id']; ?></td>
                        <td data-label="Customer ID"><?php echo $row['user_id']; ?></td>
                        <td data-label="Order Date"><?php echo $row['order_date']; ?></td>
                        <td data-label="Full Address"><?php echo $row['f_address']; ?></td>
                        <td data-label="Total Amount" style="text-align: center;"><?php echo $count; ?></td>
                        <td data-label="Order Status"><?php echo $row['status']; ?></td>
                            
                        <td data-label="View"><a href="OrderStatusPage.php?order=<?php echo $row['order_id'] ?>">View Order</a></td>
                    </tr>
                    <?php }?>
            </table>
        </div>
        <?php } else if (isset($_GET["order"])){
                   $sql2 = "SELECT order_id, name, price, quantity 
                FROM order_items INNER JOIN product_list 
                ON order_items.product_id = product_list.id WHERE order_id = '" . $_GET['order'] . "';";
                 $result1 = $conn->query($sql2);
            ?>
            <!-- Specific Order Table -->
        <div class="orderPage-table-container">
            <h4>Order id : <?php echo $_GET['order']?></h4>
            <table class="orderPage-table">
                <th style="width:10%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:10%">Quantity</th>
                <th style="width:10%">Total Amount</th>
                <?php 
                
                    while($row = $result1->fetch_assoc()){
                        $total = $row['price'] * $row['quantity'];
                ?>
                    <tr>
                        <td data-label="Product Name"><?php echo $row['name']; ?></td>
                        <td data-label="Price"><?php echo $row['price']; ?> PHP</td>
                        <td data-label="Quantity"><?php echo $row['quantity']; ?></td>
                        <td data-label="Total Amount"><?php echo $total; ?> PHP</td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <?php }?>


    <!-- Resets radio buttons -->
    <script>
        const clearSelection = (name) => {
            const radio = document.querySelectorAll("input[type='radio'][name='" + name + "']");
            radio.forEach(radio => {
                if(radio.checked === true)radio.checked = false;
            });
        };

        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
    </script>
    </body>
</html>