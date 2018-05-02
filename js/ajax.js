$(document).ready( function()
	{
		$('#form1').submit(function(e){
			e.preventDefault();
			if($('#form1').is(":visible")){
				$('#form1').hide();
			}
			else {
				$('form2').show();
			}	
		});
 
	 	
	});