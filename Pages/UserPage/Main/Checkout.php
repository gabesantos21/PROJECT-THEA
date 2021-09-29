<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>test</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="page-header"><div class="header-text"><h2>CHECKOUT</h2></div></div>
	<form>
		<div class="container-main">		
    		<div class="flex-box">
    			<h4 class="contain-header">Billing Address</h4>
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
    		<div class="flex-box">
    			<h4 class="contain-header">Payment</h4>
    			<div class ="flex-box-content">
    				<input class="radio-button" type="radio" name="paymet-type-cash-on-delivery">
    				<label for="paymet-type-cash-on-delivery">Cash of Delivery</label>
    				<input class="radio-button" type="radio" name="paymet-type-cash-on-delivery">
    				<label for="paymet-type-gcash">GCash</label>
    				<input class="radio-button" type="radio" name="paymet-type-cash-on-delivery">
    				<label for="paymet-type-paymaya">Paymaya</label>

    				<br>
    				<label for="zip">Account Name</label>
    				<input class="textBox-type-1" type="text" name="zip">
    				<label for="phone-Number">Account Number</label>
    				<input class="textBox-type-1" type="number" name="phone-Number">		
    			</div>
    		</div>
    	</div>
    </form>
</body>
</html>