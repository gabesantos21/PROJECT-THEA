<?php 
session_start();
if(!isset($_SESSION['userName'])){
    header("Location: ../../UserPage/Main/index.php?guest=fail" );
}
include '../NavBar/Navbar.php' ?>
<!DOCTYPE html>
<html>
<head>
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
	<div class="page-banner"><div class="banner-text">CHECKOUT</div></div>
</div>

 <?php
	$sql = "SELECT * from user_account where user_name = '" . $_SESSION['userName'] ."';";
	$result = $conn->query($sql);
	

	if($row = $result->fetch_assoc()){
	  $gname = $row['f_name'];
	  $sname = $row['l_name'];
	  $address = $row['address'];
	  $city = $row['city'];
	  $barangay = $row['barangay'];
	  $zip = $row['zip'];
	  $number = $row['phone_number'];
	}
?>

	<!-- Form to capture user input then refers to CheckoutVerify.php?action=checkout -->
	<!-- Should probably encrypt the personal info also if we have time -->
	<form enctype="multipart/form-data" action="CheckoutVerify.php?action=checkout" method="post" class="checkout-form">
		<div class="container-main">		
    		<div class="flex-box-1">
    			<h4>Billing Address</h4>
    			<div class ="flex-box-content">
    				<div class="sub-container">
    					<label for="given-Name">Given Name</label>
    					<input class="textBox-type-1" type="text" name="given-Name" value='<?php echo $gname ?>' required>
    				</div>
    				<div class="sub-container">
    					<label for="surname">Surname</label>
    					<input class="textBox-type-1" type="text" name="surname" value='<?php echo $sname ?>' required>
    				</div>
    				<label for="address">Address</label>
    				<input class="textBox-type-2" type="text" name="address" value='<?php echo $address ?>' required>
    				<div class="sub-container">
    					<label for="city">City</label>
    					<input class="textBox-type-1" type="text" name="city" value='<?php echo $city ?>' required>
    				</div>
    				<div class="sub-container">
    					<label for="barangay">Barangay</label>
    					<input class="textBox-type-1" type="text" name="barangay" value='<?php echo $barangay ?>' required>
    				</div>
    				<br>
    				<br>
    				<br>
    				<div class="sub-container">
    					<label for="zip">ZIP</label>
    					<input class="textBox-type-1" type="text" name="zip" value='<?php echo $zip ?>' required>
    				</div>
    				<div class="sub-container">
    					<label for="phone-Number">Phone Number</label>
    					<input class="textBox-type-1" type="tel" name="phone-Number" value='<?php echo $number ?>' required>
    				</div>
    					
    			</div>
            </div>	

			<!-- Section of the page that determines the payment method, options should save in a db -->
    		<div class="flex-box-2">	
    			<h4>Payment</h4>
    			<div class ="flex-box-content">
    				<input class="radio-button" type="radio" name="payment-type" value="cash-on-delivery">
					Cash on Delivery<br>
    				<input class="radio-button" type="radio" name="payment-type" value="GCash">
    				GCash<br>
    				<input class="radio-button" type="radio" name="payment-type" value="Paymaya">
    				Paymaya<br>
    				<br>
    				<label for="aname">Account Name</label>
    				<input class="textBox-type-1" type="text" name="aname">
    				<p style="font-size: 10px;">Name as displayed on<br>Paymaya/GCash account</p>
    				<label for="pay-number">Account Number</label>
    				<input class="textBox-type-1" type="number" name="pay-number">		
    			</div>
            </div>
			<!-- table that connects to the hbbns.sql DB that holds a table with the values -->
    		<div class="flex-box-3">		
    			<div class ="flex-box-content-table">
					<!-- rows should be automated -->
    				<table class="summary-table table table-sm table-hover">
						<tr>
							<th>Product Name</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Total</th>
							<th>Action</th>
						</tr>
						<?php
							if (!empty($_SESSION["shopping_cart"])) {
								$total = 0;
								foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                        ?>
						<tr>	
							<td><?php echo $values["item_name"]; ?></td>
							<td><?php echo $values["item_quantity"]; ?></td>
							<td>Php <?php echo $values["item_price"]; ?></td>
							<td>Php <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
							<td><a href="../Main/Checkout.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span style="color: #281816;">Remove</span></a></td>
						</tr>
						<?php $total = $total + ($values["item_quantity"] * $values["item_price"]);
								} 
							}?>
    				</table>
    			</div>
    		<div>
    			</div>

				<!-- Portion of the page that has the button to confirm the checkout -->
				<!-- Should save the user options in a DB -->
    			<div class="submit-field">	
					<p style="	display: inline; font-weight: bold;">Total Price: <span style="color: rgb(67 53 52);"><?php echo number_format(@$total, 2); ?></span></p>&nbsp;&nbsp;
					<input type="button" name="cancel" value="Cancel" class="button" style="background-color: white; color: #120B0A;">
					<input type="hidden" name="tprice" value="<?php echo @$total; ?>">
					<input <?php if(!isset($_SESSION['shopping_cart']) || empty($_SESSION['shopping_cart'])){ echo " disabled=\"disabled\" style=\"cursor: default;\""; } ?> type="Submit" name="Checkout" value="Checkout" class="button">			
    			</div>
    		</div>
    	</div>
        <div class="flex-border-contact">
		    <div class="footer" style="padding-right:5px;">
   		        <i class="fas fa-phone-alt"></i> <i class="fab fa-viber"></i> <i class="fab fa-facebook"></i><br>
   		        <div class="bottom-line"></div>
   		        <div><p>email@email.com 999-999-999<br>123 Street,  Manila, Metro Manila</p></div>
 		    </div>
        </div>
    </form>

	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</body>
</html>