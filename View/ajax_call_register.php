<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<script type="text/javascript">
		
		$('#btn_register').click(function(){

			var username = $('#username').val();
			var email = $('#email').val();
			var password1 = $('#password1').val();
			var password2 = $('#password2').val();

			if (username != '') 
			{
				$('#error_username').html('');
			}
			else
			{
				$('#error_username').html('Please Enter User-Name').css("color","red");
			}

			if(email != '')
			{
				$('#error_email').html('');
			}
			else
			{
				$('#error_email').html('Please Enter valid E-mail').css("color","red");
			}

			if (password1 != '') 
			{
				$('#error_pass1').html('');
			}
			else
			{
				$('#error_pass1').html('Please Enter Password').css("color","red");
			}

			if (password2 != '') 
			{
				$('#error_passs').html('');
				if (password1 == password2) 
			{
				$('#error_passs').html('');

				$.ajax({
					url : '../Modal/add_user.php',
					method : 'post',
					data : {
						username : username,
						email : email,
						password2 : password2
					},
					success : function(data,status)
					{
						alert(data);
					}
				});
			}
			else
			{
				$('#error_passs').html('Password Does not match').css("color","red");
			}
			}
			else
			{
				$('#error_passs').html('Please Enter Password Again').css("color","red");
			}

			

		});



	</script>

</body>
</html>