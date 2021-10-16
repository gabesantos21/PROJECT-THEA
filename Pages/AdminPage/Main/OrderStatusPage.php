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


        <div class="orderPage-table-container">
            <table class="orderPage-table">
                <th style="width:15%">Order ID</th>
                <th style="width:15%">Customer ID</th>
                <th style="width:40%">Order Date</th>
                <th style="width:15%">Total Amount</th>
                <th style="width:15%">Order Status</th>
                    <tr>
                        <td data-label="Order ID">1</td>
                        <td data-label="Customer ID">1</td>
                        <td data-label="Order Date">06:06:30 PM, 3rd July 2021</td>
                        <td data-label="Total Amount">1</td>
                        <td data-label="Order Status">Confirmed</td>
                    </tr>
                    <tr>
                        <td data-label="Order ID">2</td>
                        <td data-label="Customer ID">2</td>
                        <td data-label="Order Date">06:06:30 PM, 3rd July 2021</td>
                        <td data-label="Total Amount">2</td>
                        <td data-label="Order Status">Pending</td>
                    </tr>
                    <tr>
                        <td data-label="Order ID">3</td>
                        <td data-label="Customer ID">3</td>
                        <td data-label="Order Date">06:06:30 PM, 3rd July 2021</td>
                        <td data-label="Total Amount">3</td>
                        <td data-label="Order Status">Pending</td>
                    </tr>
            </table>
        </div>
    </body>
</html>