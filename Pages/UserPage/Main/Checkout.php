<?php include '../NavBar/Navbar.php' ?>
<!DOCTYPE html>
<html>
<head>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/37cafce672.js" crossorigin="anonymous"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>test</title>
	<link rel="stylesheet" href="../../../Css/styles-for-checkout.css">
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Alata&display=swap');  
	</style>
</head>
<body>
<div class="page-header"><div class="header-text">CHECKOUT</div></div>
	<form>
		<div class="container-main">		
    		<div class="flex-box-1">
    			<h4>Billing Address</h4>
    			<div class ="flex-box-content">
    				<div class="sub-container">
    					<label for="given-Name">Given Name</label>
    					<input class="textBox-type-1" type="text" name="given-Name">
    				</div>
    				<div class="sub-container">
    					<label for="surname">Surname</label>
    					<input class="textBox-type-1" type="text" name="surname">
    				</div>

    				<label for="address">Address</label>
    				<input class="textBox-type-2" type="text" name="address">
    				<label for="address-2">Address 2</label>
    				<input class="textBox-type-2" type="text" name="address-2">

    				<div class="sub-container">
    					<label for="city">City</label>
    					<input class="textBox-type-1" type="text" name="city">
    				</div>
    				<div class="sub-container">
    					<label for="barangay">Barangay</label>
    					<input class="textBox-type-1" type="text" name="barangay">
    				</div>
    				<br>
    				<br>
    				<br>
    				<div class="sub-container">
    					<label for="zip">ZIP</label>
    					<input class="textBox-type-1" type="number" name="zip">
    				</div>
    				<div class="sub-container">
    					<label for="phone-Number">Phone Number</label>
    					<input class="textBox-type-1" type="number" name="phone-Number">
    				</div>
    					
    			</div>
    		</div>
    		<div class="flex-box-2">
    			<h4>Payment</h4>
    			<div class ="flex-box-content">
    				<input class="radio-button" type="radio" name="paymet-type-cash-on-delivery">
					Cash on Delivery<br>
    				<input class="radio-button" type="radio" name="paymet-type-cash-on-delivery">
    				GCash<br>
    				<input class="radio-button" type="radio" name="paymet-type-cash-on-delivery">
    				Paymaya<br>

    				<br>
    				<label for="zip">Account Name</label>
    				<input class="textBox-type-1" type="text" name="zip">
    				<p style="font-size: 10px;">Name as displayed on <br>	Paymaya/GCash account</p>
    				<label for="phone-Number">Account Number</label>
    				<input class="textBox-type-1" type="number" name="phone-Number">		
    			</div>
    		</div>	
    		<div class="flex-box-3">		
    			<div class ="flex-box-content-table" style="background-color: #C8B8B2;">
    				<table class="summary-table">
    				<th class="tc-1">Name:</th>
    				<th>Qty.</th>
    				<th>Price.</th>
    				<tr>	
    					<td>
    					test		
    					</td>
    					<td>
    						2
    					</td>
    					<td>
    						300	
    					</td>
    				</tr>
    				<tr>	
    					<td>
    					test		
    					</td>
    					<td>
    						2
    					</td>
    					<td>
    						300	
    					</td>
    				</tr>
    			</table>
    			</div>
    			<div>
    				
    			</div>
    			<div class="submit-field">	
    					<p style="	display: inline;">Total Price: </p><input type="button" name="cancel" value="Cancel" class="button" style="	 background-color: white; color: #120B0A;"><input type="Submit" name="Checkout" value="Checkout" class="button">			
    			</div>
    		</div>
    	</div>
    </form>



    <div class="footer" style="padding-right:5px;">
    <i class="fas fa-phone-alt"></i> <i class="fab fa-viber"></i> <i class="fab fa-facebook"></i><br>
    <div class="bottom-line"></div>
    <div><p>email@email.com 999-999-999<br>123 Street,  Manila, Metro Manila</p></div>
 	</div>

</body>
</html>