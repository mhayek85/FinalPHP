$(document).ready( function(){
	$('#form1').submit(function(e){
		e.preventDefault();
		$('#form1').hide();
		$('#form2').show();
	});
	
	

	$('#form2').submit(function(e){
		e.preventDefault();
		$('#form2').hide();
		data = $(this).serialize();
		$.ajax({
			type: 'POST',
			url: 'emailHandle.php', 
			data: data,
			success: function (data) {
				console.log(data);
				if(data.status == "OK"){
					$('#newAdd').show();
					for(r in data.posts){ 
						var radioAdd = "\n<div class='adresses'><input type = 'radio' name='radioAdd' id='radioAddress" + r;
						radioAdd += "' value = '" + data.posts[r].address_name + "'>" + data.posts[r].address_name + "</div>";
						$('#info').append(radioAdd);
					}         			
				} else if (data.status == "INVALID EMAIL: PLEASE ENTER AN EMAIL ADDRESS") {
					$('#form2').show();
					$('#form2Error').html('');
					$('#form2Error').append("Please enter an email");
				} else if (data.status == "INVALID PASSWORD: PLEASE ENTER A PASSWORD") {
					$('#form2').show();
					$('#form2Error').html('');
					$('#form2Error').append("Please enter a password");
				} else if(data.status == "INVALID PASSWORD: PLEASE ENTER BOTH"){
					$('#form2').show();
					$('#form2Error').html('');
					$('#form2Error').append("Please enter an email and password");
				} else{
					$('#form2Error').html('');
					$('#register1').show();          			
				}	
			}
		})
	});
	
	$('#newAdd').submit(function(e){
		e.preventDefault();
		var action=($(document.activeElement).val());
		$('#newAdd').hide();
		if(action == "Add"){
			data = $(this).serialize();
			$.ajax({
				type: 'POST',
				url: 'newAddressHandle.php', 
				data: data,
				success: function (data) {
					if(data == "INVALID"){
						$('#newAddError').html('');
						$('#useError').html('');
						$('#newAddError').append("Please fill out all the applicable sections to add a new address");
						$('#newAdd').show();          			
					} else {
						$('#newAddError').html('');
						$('#useError').html('');
						$('#form3').show();
					}          			
				}
			})			
		}
		else if(action == "Use"){
			data=$(this).serialize();
			$.ajax({
				type: 'POST',
				url: 'oldAddressHandle.php',				
				data: data,
				success:function (data){
					if(data == "ok"){
						$('#newAddError').html('');
						$('#useError').html('');
						$('#form3').show();						
					} else {
						$('#newAddError').html('');
						$('#useError').html('');
						$('#useError').append("Please select an existing address or add a new one!");
						$('#newAdd').show();
					}			
				}
			})			
		}
	});
	
	$('#register1').submit(function(e){
		e.preventDefault();
		$('#register1').hide();
		data = $(this).serialize();
		$.ajax({
			type: 'POST',
			url: 'registerHandle.php', 
			data: data,
			success: function (data) {
				console.log(data);
				if(data == "OK"){
					$('#form3').show();
				} else if(data == "INVALID"){
					$('#register1').show();
					$('#register1Error').html('');
					$('#register1Error').append("Please ensure the correct data is in all the fields")  ;          			
				} else if(data == "INVALID: PHONE"){
					$('#register1').show();
					$('#register1Error').html('');
					$('#register1Error').append("Please ensure your phone number is in the correct format");           			
				}	
			}
		})		
	});
	
	$('#form3').submit(function(e){
		e.preventDefault();
		$('#form3').hide();
		data = $(this).serialize();
		$.ajax({
			type: 'POST',
			url: 'pizzaHandle.php', 
			data: data,
			success: function (data) {
				if (data == "INVALID") {
					$('#form3').show();
					$('#form3Error').html('');
					$('#form3Error').append("Please make sure you select one of each: size, dough, sauce, and cheese")
				} else {
					$('#form3Error').html('');
					$('#form4').show();
				}
			}
		})		
	});
	
	$('#form4').submit(function(e){
		e.preventDefault();
		$('#form4').hide();
		data = $(this).serialize();
		$.ajax({
			type: 'POST',
			url: 'toppingHandle.php', 
			data: data,
			success: function (data) {
				if(data == "OK" ){
					$('#form5').show();
				} else if(data == "INVALID: TOO MANY"){
					$('#form4').show();
					$('#form4Error').html('');
					$('#form4Error').append("Please select a maximum of 7 toppings")
				} else {
					$('#form4').show();	
					$('#form4Error').html('');
					$('#form4Error').append("You have not selected anything!");
				}
			}
		})		
	});
	
	$('#form5').submit(function(e){
		e.preventDefault();
		var action=($(document.activeElement).val());
		$('#form5').hide();
		if(action == "Complete Order"){
			data = $(this).serialize();
			$.ajax({
				type: 'POST',
				url: 'completeOrder.php',
				data: data,
				success: function(data) {
					console.log(data);	
					$('#form6').show();		
					for(r in data.posts){					
						$('#orderSum').append(
							"<tr><td>" + data.posts[r].sum_order_ID + "</td><td>" + data.posts[r].pizza_size
							+ "</td><td>" + data.posts[r].sauce_type + "</td><td>" + data.posts[r].cheese_type
							+ "</td><td>" + data.posts[r].dough_type + "</td><td>" + data.posts[r].topping + "</td></tr>" 
						);
					}		
				}
			})		
		} else if(action == "Complete Order without current Pizza"){
			data = $(this).serialize();
			$.ajax({
				type: 'POST',
				url: 'orderWOCurrent.php',
				data: data,
				success: function(data){
					if(data.status == "OK"){
						console.log(data);	
						$('#form6').show();
						for(r in data.posts){					
							$('#orderSum').append(
								"<tr><td>" + data.posts[r].sum_order_ID + "</td><td>" + data.posts[r].pizza_size
								+ "</td><td>" + data.posts[r].sauce_type + "</td><td>" + data.posts[r].cheese_type
								+ "</td><td>" + data.posts[r].dough_type + "</td><td>" + data.posts[r].topping + "</td></tr>" 
							);
						}		
					} else{
						$('#form5').show();	
						$('#form5Error').html('');
						$('#form5Error').append("No previous pizzas!");
					}					
				}
			})
		} else if(action == "Add another pizza"){
			data = $(this).serialize();
			$.ajax({
				type: 'POST',
				url: 'completeOrder.php',
				data: data,
				success: function(data) {
					console.log(data);					
				}
			})
			$('#form3').show();
		} else if(action == "Remake Pizza"){
			$('#form3').show();
		} else if(action == "Cancel Order"){
			alert("order cancelled");
			data = $(this).serialize();
			$.ajax({
				type: 'POST',
				url: 'cancelOrder.php',
				data:data,
				success: function(data) {
					console.log(data);
					if(data == "NO PIZZA"){
						$('#form1').show();					
					}else if(data == "DELETED"){
						$('#form1').show();					
					}		
				}
			})
		}
	});
	
	$('#form6').submit(function(e){
		e.preventDefault();
		var action=($(document.activeElement).val());
		if (action == "Place Order") {
			data = $(this).serialize();
			$.ajax({
				type: 'POST',
				url: 'finalPage.php',
				data: data,
				success: function(data){
					console.log(data);
					$('#form6').hide();
					$('#form7').show();
					$('#estimate').append(data);				
				}			
			})
		} else if(action == "Cancel Order"){
			data = $(this).serialize();
			$.ajax({
				type: 'POST',
				url: 'cancelOrder.php',
				data:data,
				success: function(data){
					console.log(data);
					$('#form6').hide();
					$('#form1').show();				
				}			
			})
		}
	});	
});