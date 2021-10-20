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
        ?>

         <div class="orderPage-table-container">
            <h4>Completed Orders</h4>
            <table class="orderPage-table">
            <!-- form for this table to accept potential change in status of the orders -->
            <form action="" method="">
                <th style="width:15%">Order ID</th>
                <th style="width:15%">Customer ID</th>
                <th style="width:35%">Order Date</th>
                <th style="width:10%">Total Amount</th>
                <th style="width:10%">Order Status</th>
                <th style="width:15%">Update Status</th>
                    <tr>
                        <td data-label="Order ID">1</td>
                        <td data-label="Customer ID">1</td>
                        <td data-label="Order Date">06:06:30 PM, 3rd July 2021</td>
                        <td data-label="Total Amount">1</td>
                        <td data-label="Order Status">Completed</td>
                        <td data-label="Update Status">
                            <input type="radio" id="revert" name="orderComplete" value="revert"/>Revert</td>
                    </tr>
                    <tr>
                        <td data-label="Order ID">2</td>
                        <td data-label="Customer ID">2</td>
                        <td data-label="Order Date">06:06:30 PM, 3rd July 2021</td>
                        <td data-label="Total Amount">2</td>
                        <td data-label="Order Status">Completed</td>
                        <td data-label="Update Status">
                            <input type="radio" id="revert" name="orderComplete" value="revert"/>Revert</td>
                    </tr>
                    <tr>
                        <td data-label="Order ID">3</td>
                        <td data-label="Customer ID">3</td>
                        <td data-label="Order Date">06:06:30 PM, 3rd July 2021</td>
                        <td data-label="Total Amount">3</td>
                        <td data-label="Order Status">Completed</td>
                        <td data-label="Update Status">
                            <input type="radio" id="revert" name="orderComplete" value="revert"/>Revert</td>
                    </tr>
            </table>
            <div class="orderPage-table-foot">
                <div style="float:right">Apply Change:<input type="submit" value="Apply" class="orderPage-table-input"></div>
                <div style="float:right">Reset Button:<input type="button" value="Reset" class="orderPage-table-input" onclick="clearSelection('orderComplete');"></div>     
            </div>
            </form>
        </div>
        <?php
            } else if ($_GET["list"] == "declined"){
        ?>
            <!-- Declined Orders Table -->
        <div class="orderPage-table-container">
        <h4>Cancelled Orders</h4>
            <table class="orderPage-table">
            <!-- form for this table to accept potential change in status of the orders -->
            <form action="" method="">
                <th style="width:15%">Order ID</th>
                <th style="width:15%">Customer ID</th>
                <th style="width:35%">Order Date</th>
                <th style="width:10%">Total Amount</th>
                <th style="width:10%">Order Status</th>
                <th style="width:15%">Update Status</th>
                    <tr>
                        <td data-label="Order ID">1</td>
                        <td data-label="Customer ID">1</td>
                        <td data-label="Order Date">06:06:30 PM, 3rd July 2021</td>
                        <td data-label="Total Amount">1</td>
                        <td data-label="Order Status">Cancelled</td>
                        <td data-label="Update Status">
                            <input type="radio" id="revert" name="orderDecline" value="revert"/>Revert</td>
                    </tr>
                    <tr>
                        <td data-label="Order ID">2</td>
                        <td data-label="Customer ID">2</td>
                        <td data-label="Order Date">06:06:30 PM, 3rd July 2021</td>
                        <td data-label="Total Amount">2</td>
                        <td data-label="Order Status">Cancelled</td>
                        <td data-label="Update Status">
                            <input type="radio" id="revert" name="orderDecline" value="revert"/>Revert</td>
                    </tr>
                    <tr>
                        <td data-label="Order ID">3</td>
                        <td data-label="Customer ID">3</td>
                        <td data-label="Order Date">06:06:30 PM, 3rd July 2021</td>
                        <td data-label="Total Amount">3</td>
                        <td data-label="Order Status">Cancelled</td>
                        <td data-label="Update Status">
                            <input type="radio" id="revert" name="orderDecline" value="revert"/>Revert</td>
                    </tr>

            </table>
            <div class="orderPage-table-foot">
                <div style="float:right">Apply Change:<input type="submit" value="Apply" class="orderPage-table-input"></div>
                <div style="float:right">Reset Button:<input type="button" value="Reset" class="orderPage-table-input" onclick="clearSelection('orderDecline');"></div>     
            </div>
            </form>
        </div>
        <?php }
            }else{?>
            <!-- Pending Orders Table -->
        <div class="orderPage-table-container">
            <h4>Pending Orders</h4>
            <table class="orderPage-table">
            <!-- form for this table to accept potential change in status of the orders -->
            <form action="" method="">
                <th style="width:15%">Order ID</th>
                <th style="width:15%">Customer ID</th>
                <th style="width:35%">Order Date</th>
                <th style="width:10%">Total Amount</th>
                <th style="width:10%">Order Status</th>
                <th style="width:15%">Update Status</th>
                    <tr>
                        <td data-label="Order ID">2</td>
                        <td data-label="Customer ID">2</td>
                        <td data-label="Order Date">06:06:30 PM, 3rd July 2021</td>
                        <td data-label="Total Amount">2</td>
                        <td data-label="Order Status">Pending</td>
                        <td data-label="Update Status">
                            <input type="radio" id="complete" name="orderPending" value="complete"/>Complete
                            <input type="radio" id="decline" name="orderPending" value="decline"/>Decline

                    </tr>
                    <tr>
                        <td data-label="Order ID">2</td>
                        <td data-label="Customer ID">2</td>
                        <td data-label="Order Date">06:06:30 PM, 3rd July 2021</td>
                        <td data-label="Total Amount">2</td>
                        <td data-label="Order Status">Pending</td>
                        <td data-label="Update Status">
                            <input type="radio" id="complete" name="orderPending" value="complete"/>Complete
                            <input type="radio" id="decline" name="orderPending" value="decline"/>Decline

                    </td>
                    </tr>
                    <tr>
                        <td data-label="Order ID">3</td>
                        <td data-label="Customer ID">3</td>
                        <td data-label="Order Date">06:06:30 PM, 3rd July 2021</td>
                        <td data-label="Total Amount">3</td>
                        <td data-label="Order Status">Pending</td>
                        <td data-label="Update Status">
                            <input type="radio" id="complete" name="orderPending" value="complete"/>Complete
                            <input type="radio" id="decline" name="orderPending" value="decline"/>Decline
         
                    </td>
                    </tr>
                    </tr>

            </table>
            <div class="orderPage-table-foot">
                <div style="float:right">Apply Change:<input type="submit" value="Apply" class="orderPage-table-input"></div>
                <div style="float:right">Reset Button:<input type="button" value="Reset" class="orderPage-table-input" onclick="clearSelection('orderPending');"></div>     
            </div>
            </form>
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
    </script>
    </body>
</html>