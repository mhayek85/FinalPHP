<?php 
	session_start();
?>
<html>
	<head>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="js/index.js"></script>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="css/styles.css">
	</head>
	<body>
		<div class="content">
			<div id="company" class="w3-container w3-orange">
				<h1> Pi's Online Ordering System!<img src="css/images/pizzaheart.png" style="width:100px; height:100px;"/></h1>
			</div>

			<form id="form1" method="POST" class="w3-container">
				<div class="banner"><img src="css/images/pizza.jpg"/></div>
				<div class="cdiv">
					<h1>Welcome to Pi's Pizza!</h1>
					<input class="w3-btn w3-orange" type="submit" name="b_order" id="b_order" value="Begin Order">
				</div>
			</form>

			<form id="form2" method="POST" class="w3-container">
				<div class="cdiv">
					<div class="w3-light-grey w3-round-large">
						<div class="w3-container w3-orange w3-round-large" style="width:10%">10%</div>
					</div>
					<h1>Login or Register</h1>
					<p>Login with your email and password</p>
					<div id='form2Error' class='error'></div>
					<table>
						<tr>
							<td><label class="w3-text-orange" for="em_email">Email Address</label></td>
							<td><input class="w3-input w3-border" type="email" id="em_email" name="em_email" size="50" maxlength="50" ></td>
						</tr>
						<tr>
							<td><label class="w3-text-orange" for="password">Password</label></td>
							<td><input class="w3-input w3-border" type="password" id="password" name="password" size="50" maxlength="50"></td>
						</tr>
					</table>
					<input class="w3-btn w3-orange"  type="submit" name="login" id="btnLogin" value="Next">
				</div>
			</form>

			<form id="register1" class="w3-container">

			<div class="cdiv">
				<div class="w3-light-grey w3-round-large">
				<div class="w3-container w3-orange w3-round-large" style="width:15%">15%</div>
				</div>
				<h2> Please enter in your information to register</h2>
				<div id="register1Error" class='error'></div>
				<table>
					<tr>
						<td><label class="w3-text-orange"> Email</label></td>
						<td><input class="w3-input w3-border" type="text" id="email" name="email" size="50" maxlength="50"></td>
					</tr>
					<tr>
						<td><label class="w3-text-orange">Password</label></td>
						<td><input  class="w3-input w3-border" type="password" id="password" name="password" size="50" maxlength="50"></td>
					</tr>
					<tr>
						<td><label class="w3-text-orange">First Name</label></td>
						<td><input class="w3-input w3-border" type="text" id="first_name" name="first_name" size="30" maxlength="30"></td>
					</tr>
					<tr>
						<td><label class="w3-text-orange">Last Name</label></td>
						<td><input class="w3-input w3-border" type="text" id="last_name" name="last_name" size="30" maxlength="30"></td>
					</tr>
					<tr> 
						<td><label class="w3-text-orange">Address</label></td>
						<td><input class="w3-input w3-border" type="text" id="address_name" name="address_name" size="70" maxlength="70"></td>
					</tr>
					<tr>
						<td><label class="w3-text-orange">Apartment Number</label></td>
						<td><input class="w3-input w3-border" type="text" id="apartment_num" name="apartment_num" size="6" maxlength="6"></td>
					</tr>
					<tr>
						<td><label class="w3-text-orange">City</label></td>
						<td><input class="w3-input w3-border" type="text" id="city" name="city" size="40" maxlength="40"></td>
					</tr>
					<tr>
						<td><label class="w3-text-orange">Province<label></td>
						<td><input class="w3-input w3-border" type="text" id="province" name="province" size="2" maxlength="2"></td>
					</tr>
					<tr>
						<td><label class="w3-text-orange">Postal Code</label></td>
						<td><input class="w3-input w3-border" type="text" id="postal_code" name="postal_code" size="6" maxlength="6"></td>
					</tr>
					<tr>
						<td><label class="w3-text-orange">Phone Number</label></td>
						<td><input class="w3-input w3-border" type="tel" id="phone_number" name="phone_number" size="30" maxlength="30" ></td>
					</tr>
				</table>
				<br>
				<input class="w3-btn w3-orange"  type="submit" name="register" id="register" value="Register">
			</div>
			</form>

			<form id="newAdd" class="w3-container">
				<div class="cdiv">
				<div class="w3-light-grey w3-round-large">
					<div class="w3-container w3-orange w3-round-large" style="width:20%">20%</div>
				</div>

				<table>
					<h2>Select a delivery address</h2>
					<div id="useError" class='error'></div>
					<div id="info">	</div>
					<input class="w3-btn w3-orange" type="submit" name="use" id="use" value="Use">
					<hr>
					<h2>Or enter a new address</h2>
					<div id="newAddError" class='error'></div>
					<tr> 
						<td><label class="w3-text-orange">Address</label></td>
						<td><input class="w3-input w3-border" type="text" id="address_name1" name="address_name1" size="70" maxlength="70"></td>
					</tr>
					<tr>
						<td><label class="w3-text-orange">Apartment Number</label></td>
						<td><input class="w3-input w3-border" type="text" id="apartment_num1" name="apartment_num1" size="6" maxlength="6"></td>
					</tr>
					<tr>
						<td><label class="w3-text-orange">City</label></td>
						<td><input class="w3-input w3-border" type="text" id="city1" name="city1" size="40" maxlength="40"></td>
					</tr>
					<tr>
						<td><label class="w3-text-orange">Province</label></td>
						<td><input class="w3-input w3-border" type="text" id="province1" name="province1" size="2" maxlength="2"></td>
					</tr>
					<tr>
						<td><label class="w3-text-orange">Postal Code</label></td>
						<td><input class="w3-input w3-border" type="text" id="postal_code1" name="postal_code1" size="6" maxlength="6"></td>
					</tr>
				</table>
				<br>
				<input class="w3-btn w3-orange"  type="submit" name="add" id="add" value="Add">
				</div>
			</form>

			<form id="form3" method="POST" class="w3-container">
				<div class="cdiv">
					<div class="w3-light-grey w3-round-large">
						<div class="w3-container w3-orange w3-round-large" style="width:25%">25%</div>
					</div>
					<h2>Pizza Order</h2>
					<div id="form3Error" class="error"></div>
					<table>
						<tr>
							<td><h3 class="w3-text-orange typeLabel">Dough: </h3></td>
							<td><input class="w3-radio" type="radio" name="dough" value="White"> White</td>
							<td><input class="w3-radio" type="radio" name="dough" value="Whole Wheat"> Whole Wheat</td>
							<td><input class="w3-radio" type="radio" name="dough" value="Gluten Free"> Gluten Free</td>
						</tr>
						<tr>
							<td><h3 class="w3-text-orange typeLabel">Size: </h3></td>
							<td><input class="w3-radio" type="radio" name="size" value="small"> Small</td>
							<td><input class="w3-radio" type="radio" name="size" value="medium"> Medium</td>
							<td><input class="w3-radio" type="radio" name="size" value="large"> Large</td>
						</tr>
						<tr>
							<td><h3 class="w3-text-orange typeLabel">Sauce: </h3></td>
							<td><input class="w3-radio" type="radio" name="sauce" value="red"> Red</td>
							<td><input class="w3-radio" type="radio" name="sauce" value="white"> White</td>
							<td><input class="w3-radio" type="radio" name="sauce" value="bbq"> BBQ</td>
						</tr>
						<tr>
							<td><h3 class="w3-text-orange typeLabel">Cheese: </h3></td>
							<td><input class="w3-radio" type="radio" name="cheese" value="mozzarella"> Mozzarella</td>
							<td><input class="w3-radio" type="radio" name="cheese" value="goat"> Goat</td>
							<td><input class="w3-radio" type="radio" name="cheese" value="vegan"> Vegan</td>
						</tr>
					</table>
					<input class="w3-btn w3-orange"  type="submit" name="next_order" value="Next">
				</div>
			</form>

			<form id="form4" method="POST" class="w3-container">
				<div class="cdiv">
				<div class="w3-light-grey w3-round-large">
					<div class="w3-container w3-orange w3-round-large" style="width:50%">50%</div>
				</div>
				<h2>Toppings</h2>
				<br>
				<div id="form4Error" class='error'></div>
				<h3 class="w3-text-orange">Protein</h3>
				<input class="w3-check" type="checkbox" name="topping[]" id="topping" value="pepperoni"> Pepperoni
				<input class="w3-check" type="checkbox" name="topping[]" id="topping" value="sausage"> Sausage
				<input class="w3-check" type="checkbox" name="topping[]" id="topping" value="ham"> Ham
				<input class="w3-check" type="checkbox" name="topping[]" id="topping" value="chicken"> Chicken
				<input class="w3-check" type="checkbox" name="topping[]" id="topping" value="soyPepperoni"> Soy Pepperoni
				<input class="w3-check" type="checkbox" name="topping[]" id="topping" value="none"> None
				<br/>
				<h3 class="w3-text-orange">Vegetables</h3>
				<input class="w3-check" type="checkbox" name="topping[]" id="topping" value="greenPepper"> Green pepper
				<input class="w3-check" type="checkbox" name="topping[]" id="topping" value="spinach"> Spinach
				<input class="w3-check" type="checkbox" name="topping[]" id="topping" value="mushroom"> Mushrooms
				<input class="w3-check" type="checkbox" name="topping[]" id="topping" value="blackOlives"> Black olives
				<input class="w3-check" type="checkbox" name="topping[]" id="topping" value="pineapple"> Pineapples
				<input class="w3-check" type="checkbox" name="topping[]" id="topping" value="tomato"> Tomatoes
				<input class="w3-check" type="checkbox" name="topping[]" id="topping" value="none"> None
				<br>
				<br>
				<input class="w3-btn w3-orange" type="submit" name="next_order" value="Order Summary">
				</div>
			</form>

			<form id="form5" method="POST" class="w3-container">
				<div class="cdiv">
					<div class="w3-light-grey w3-round-large">
						<div class="w3-container w3-orange w3-round-large" style="width:75%">75%</div>
					</div>
					<h2>Order Summary</h2>
					<img src="css/images/loading.gif" class="loading"/>
					<br>
					<div id="form5Error" class="error"></div>
					<input class="w3-btn w3-orange" type="submit" id="complete" value="Complete Order" >
					<input class="w3-btn w3-orange" type="submit" id="completeEmpty" value="Complete Order without current Pizza" >
					<input class="w3-btn w3-orange" type="submit" id="addPizza" value="Add another pizza" >
					<input class="w3-btn w3-orange" type="submit" id="remakePizza" value="Remake Pizza" >
					<input class="w3-btn w3-orange" type="submit" id="cancelOrder" value="Cancel Order" >
				</div>
			</form>

			<form id="form6" method="POST" class="w3-container">
				<div class="cdiv">
					<div class="w3-light-grey w3-round-large">
						<div class="w3-container w3-orange w3-round-large" style="width:85%">85%</div>
					</div>
					<table border=1 id="orderSum">
						<tr><td>Order ID</td><td>Size</td><td>Sauce</td><td>Cheese</td><td>Dough</td><td>Toppings</td></tr>
					</table>
					<input class="w3-btn w3-orange" type="submit" id="placeOrder" value="Place Order" >
					<input class="w3-btn w3-orange" type="submit" id="cancelOrder" value="Cancel Order" >
				</div>
			</form>

			<form id="form7" method="POST" class="w3-container">
				<div class="cdiv">
					<div class="w3-light-grey w3-round-large">
						<div class="w3-container w3-orange w3-round-large" style="width:100%">100%</div>
					</div>
					<h2>Thank You for Ordering!</h2>
					<div id='estimate'></div>
					<img id='checkmark' src="css/images/checkmark.png"/>
					<input class="w3-btn w3-orange" type="submit" id="placeOrder" value="Place Another Order">
				</div>
			</form>
		</div>
	</body>
</html>