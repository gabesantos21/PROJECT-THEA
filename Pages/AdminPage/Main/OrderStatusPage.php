<?php include '../../AdminPage/NavBar/AdminNavbar.php' ?>
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
    //  gets status and displays alert (alerts are stored in the navbar)
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

      
        if (isset($_GET['update']) && $_GET['update'] == "success") {
          echo "<script>
          $(document).ready(function() {
          $('#update-status-success')
          .fadeTo(2000, 500)
          .slideUp(500, function () {
            $('#update-status-success').slideUp(500);
          });
        });
                </script>";
        }else if (isset($_GET['update']) &&  $_GET['update'] == 'fail'){
            echo "<script>
          $(document).ready(function() {
          $('#updatestatuserror-alert')
          .fadeTo(2000, 500)
          .slideUp(500, function () {
            $('#updatestatuserror-alert').slideUp(500);
          });
        });
                </script>";
        }

        if (isset($_GET['delete']) && $_GET['delete'] == "success") {
            echo "<script>
            $(document).ready(function() {
            $('#success-delete-orderitem')
            .fadeTo(2000, 500)
            .slideUp(500, function () {
              $('#success-delete-orderitem').slideUp(500);
            });
          });
                  </script>";
          }else if (isset($_GET['delete']) &&  $_GET['delete'] == 'fail'){
              echo "<script>
            $(document).ready(function() {
            $('#error-delete-orderitem')
            .fadeTo(2000, 500)
            .slideUp(500, function () {
              $('#error-delete-orderitem').slideUp(500);
            });
          });
                  </script>";
          }
      
    ?>

        <div class = "header-border">
            <div class="page-banner"><div class="banner-text">ORDERS</div></div>
        </div>

        <!-- buttons that load in the different tables-->
        <div class="order-list-nav">
            <a href="OrderStatusPage.php?list=completed">Completed Orders</a>
            <a href="OrderStatusPage.php">Pending Orders</a>
            <a href="OrderStatusPage.php?list=declined">Cancelled Orders</a>
        </div>

        <!-- TODO for backend - automate the rows -->
        <!-- TODO for backend - apply buttons should update the tables respective to the chosen change -->
        
        

        <!-- Completed Order Table -->
        <?php if(isset($_GET["list"])){
            
            if ($_GET["list"] == "completed"){
                $sql = "SELECT * from orders where status = 'Completed';";
                $result = $conn->query($sql);

                
            
        ?>

         <div class="orderPage-table-container">
            <h4>Completed Orders</h4>
            <table class="orderPage-table">

            <!-- form for this table to accept potential change in status of the orders -->
            <form action="StatusChangeVerify.php" method="post">
                <th style="width:15%">Order ID</th>
                <th style="width:15%">Customer ID</th>
                <th style="width:20%">Order Date</th>
                <th style="width:20%">Full Address</th>
                <th style="width:10%;text-align: center;" >Total Amount</th>
                <th style="width:10%">Order Status</th>
                <th style="width:15%">Update Status</th>
                <th style="width:15%">Action</th>
                <?php 
                    while($row = $result->fetch_assoc()){
                        $sql1 = "SELECT * from order_items where order_id = '". $row['order_id'] . "';";
                        $result1 = $conn->query($sql1);
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
                        <td data-label="Update Status">
                            <label style="color: black;" for="revert" >Revert</label>
                            <input type="radio" id="revert" name="status" value="Pending,<?php echo $row['order_id']; ?>"/>
                        </td>
                            
                        <td data-label="View"><a href="OrderStatusPage.php?order=<?php echo $row['order_id'] ?>">View Order</a></td>
                        </tr>
                <?php }?>
            </table>
            <div class="orderPage-table-foot">
                <div style="float:right">Apply Change:<input type="submit" value="Apply" name="statuschange" class="orderPage-table-input"></div>
                <div style="float:right">Reset Button:<input type="button" value="Reset" class="orderPage-table-input" onclick="clearSelection('orderComplete');"></div>     
            </div>
            </form>
        </div>
        <?php
            } else if ($_GET["list"] == "declined"){
                $sql = "SELECT * from orders where status = 'Cancelled';";
                $result = $conn->query($sql);
        ?>
            <!-- Declined Orders Table -->
        <div class="orderPage-table-container">
        <h4>Cancelled Orders</h4>
            <table class="orderPage-table">

            <!-- form for this table to accept potential change in status of the orders -->
            <form action="StatusChangeVerify.php" method="post">
                 <th style="width:15%">Order ID</th>
                <th style="width:15%">Customer ID</th>
                <th style="width:20%">Order Date</th>
                <th style="width:20%">Full Address</th>
                <th style="width:10%;text-align: center;">Total Amount</th>
                <th style="width:10%">Order Status</th>
                <th style="width:15%">Update Status</th>
                <th style="width:15%">Action</th>

                <?php 
                    while($row = $result->fetch_assoc()){
                        $sql1 = "SELECT * from order_items where order_id = '". $row['order_id'] . "';";
                        $result1 = $conn->query($sql1);
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
                        <td data-label="Update Status">
                            <label style="color: black;" for="revert" >Revert</label>
                            <input type="radio" id="revert" name="status" value="Pending,<?php echo $row['order_id']; ?>"/>
                        </td>
                        <td data-label="View"><a href="OrderStatusPage.php?order=<?php echo $row['order_id'] ?>">View Order</a></td>
                    </tr>
                <?php }?>
            </table>
            <div class="orderPage-table-foot">
                <div style="float:right">Apply Change:<input type="submit" value="Apply" name="statuschange" class="orderPage-table-input"></div>
                <div style="float:right">Reset Button:<input type="button" value="Reset" class="orderPage-table-input" onclick="clearSelection('orderDecline');">
            </div>     
            </div>
            </form>
        </div>

        <?php }
            }else if (!isset($_GET["list"]) && !isset($_GET["order"])){
                
                $sql = "SELECT * from orders where status = 'Pending';";
                $result = $conn->query($sql);

            
        ?>
            <div class="orderPage-table-container">
            <h4>Pending Orders</h4>
            <table class="orderPage-table">

            <!-- form for this table to accept potential change in status of the orders -->

            <form action="StatusChangeVerify.php" method="post">
                <th style="width:15%">Order ID</th>
                <th style="width:15%">Customer ID</th>
                <th style="width:20%">Order Date</th>
                <th style="width:20%">Full Address</th>
                <th style="width:10%;text-align: center;">Total Amount</th>
                <th style="width:10%">Order Status</th>
                <th style="width:15%">Update Status</th>
                <th style="width:15%">Action</th>

                <?php 
                    while($row = $result->fetch_assoc()){
                        $sql1 = "SELECT * from order_items where order_id = '". $row['order_id'] . "';";
                        $result1 = $conn->query($sql1);
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
                        <td data-label="Update Status">
                            <label style="color: black;" for="complete" >Complete</label>
                            <input type="radio" id="complete" name="status" value="Completed,<?php echo $row['order_id']; ?>"/>
                            <label style="color: black;" for="decline">Cancel</label>
                            <input type="radio" id="decline" name="status" value="Cancelled,<?php echo $row['order_id']; ?>"/>
                            
                        </td>
                        <td data-label="View"><a href="OrderStatusPage.php?order=<?php echo $row['order_id'] ?>">View Order</a></td>
                    </tr>

                <?php }?>
            </table>
            <div class="orderPage-table-foot">
                <div style="float:right">Apply Change:<input type="submit" value="Apply" name="statuschange" class="orderPage-table-input"></div>
                <div style="float:right">Reset Button:<input type="button" value="Reset" class="orderPage-table-input" onclick="clearSelection('orderPending');"></div>     
            </div>
            </form>
        </div>
        <?php } else if (isset($_GET["order"])){
                $sql = "SELECT order_id, product_id, name, price, quantity 
                        FROM order_items INNER JOIN product_list 
                        ON order_items.product_id = product_list.id WHERE order_id = '" . $_GET['order'] . "';";
                $result = $conn->query($sql);
            ?>
            <!-- Specific Order Table -->
        <div class="orderPage-table-container">
            <h4>Order id : <?php echo $_GET['order']?></h4>
            <table class="orderPage-table">
                <th style="width:10%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:10%">Quantity</th>
                <th style="width:10%">Total Amount</th>
                <th style="width:10%">Action</th>
                <?php 
                
                    while($row = $result->fetch_assoc()){
                        $total = $row['price'] * $row['quantity'];
                ?>
                    <tr>
                        <td data-label="Product Name"><?php echo $row['name']; ?></td>
                        <td data-label="Price"><?php echo $row['price']; ?> PHP</td>
                        <td data-label="Quantity"><?php echo $row['quantity']; ?></td>
                        <td data-label="Total Amount"><?php echo $total; ?> PHP</td>
                        <td data-label="Action"><a href="DeleteOrderItem.php?productid=<?php echo $row['product_id']; ?>&orderid=<?php echo $row['order_id']; ?>">Remove Item</a></td>
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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    </body>
</html>