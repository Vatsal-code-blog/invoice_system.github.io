<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<script type="text/javascript">
		
		$('#log_in_btn').click(function(){
			var log_email = $('#log_email').val();
			var log_password = $('#log_password').val();
			var set_cookie = $('#set_cookie').val();

			if (log_email && log_password != '') 
			{
				$.ajax({
					url : 'Modal/verify_log_in.php',
					method : 'post',
					data : {
						log_email : log_email,
						log_password : log_password

					},
					success : function(data,status)
					{
						if(data == 1)
						{
        					window.location = 'index.php';
        				}
        				else
        				{
							$('#error_msg').html(data).css("color","red");
						}
					}
				});
			}
			else
			{
				$('#error_msg').html('User-Name Password is blank').css("color","red");
			}
		});

	</script>

</body>
</html>