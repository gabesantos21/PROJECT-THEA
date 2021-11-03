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
        ?>

         <div class="orderPage-table-container">
            <h4>Completed Orders</h4>
            <table class="orderPage-table">
                <th style="width:15%">Order ID</th>
                <th style="width:15%">Customer ID</th>
                <th style="width:35%">Order Date</th>
                <th style="width:10%">Total Amount</th>
                <th style="width:10%">Order Status</th>
                <tr class='clickable-row' data-href='OrderStatusPage.php?order=1'>
                        <td data-label="Order ID">click me</td>
                        <td data-label="Customer ID">2</td>
                        <td data-label="Order Date">06:06:30 PM, 3rd July 2021</td>
                        <td data-label="Total Amount">2</td>
                        <td data-label="Order Status">Completed</td>
                    </tr>
            </table>
        </div>
        <?php
            } else if ($_GET["list"] == "declined"){
        ?>
            <!-- Declined Orders Table -->
        <div class="orderPage-table-container">
        <h4>Cancelled Orders</h4>
            <table class="orderPage-table">
                <th style="width:15%">Order ID</th>
                <th style="width:15%">Customer ID</th>
                <th style="width:35%">Order Date</th>
                <th style="width:10%">Total Amount</th>
                <th style="width:10%">Order Status</th>
                    <tr class='clickable-row' data-href='OrderStatusPage.php?order=1'>
                        <td data-label="Order ID">click me</td>
                        <td data-label="Customer ID">2</td>
                        <td data-label="Order Date">06:06:30 PM, 3rd July 2021</td>
                        <td data-label="Total Amount">2</td>
                        <td data-label="Order Status">Cancelled</td>
                    </tr>
            </table>
        </div>
        <?php }
            }else if (!isset($_GET["list"]) && !isset($_GET["order"])){?>
            <!-- Pending Orders Table -->
        <div class="orderPage-table-container">
            <h4>Pending Orders</h4>
            <table class="orderPage-table">
                <th style="width:15%">Order ID</th>
                <th style="width:15%">Customer ID</th>
                <th style="width:35%">Order Date</th>
                <th style="width:10%">Total Amount</th>
                <th style="width:10%">Order Status</th>
                <!-- Automate rows -->
                    <tr class='clickable-row' data-href='OrderStatusPage.php?order=1'>
                        <td data-label="Order ID">click me</td>
                        <td data-label="Customer ID">2</td>
                        <td data-label="Order Date">06:06:30 PM, 3rd July 2021</td>
                        <td data-label="Total Amount">2</td>
                        <td data-label="Order Status">Pending</td>
                    </tr>
            </table>
        </div>
        <?php } else if (isset($_GET["order"])){?>
            <!-- Specific Order Table -->
        <div class="orderPage-table-container">
            <h4>Order id : <?php echo $_GET['order']?></h4>
            <table class="orderPage-table">
                <th style="width:10%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:10%">Quantity</th>
                <th style="width:10%">Total Amount</th>
                    <tr>
                        <td data-label="Product Name">Choco cookies</td>
                        <td data-label="Price">10$</td>
                        <td data-label="Quantity">3</td>
                        <td data-label="Total Amount">30$</td>
                    </tr>
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