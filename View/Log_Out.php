<?php
session_start();
session_destroy();

setcookie("log_email", "", time() - 3600);
setcookie("log_password", "", time() - 3600);
	
	echo "Logged-Out Your Account.<br><br>";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<button class=" btn btn-danger" onclick="window.location.href='../log_in.php'">Log-In</button><br><br>
</body>
</html>

