<?php

include('connection.php');

class Register extends Connection
{
	
	function add_user()
	{
		if (isset($_POST['username'])) 
		{
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password2'];

			$add_record = " INSERT INTO `register_tbl`(`username`, `email`, `password`) VALUES ('$username','$email','$password') ";

			$results=($row=mysqli_query($this->con,$add_record));
    			if (!$results) 
    			{
    				die("Error : " . mysqli_error());
    			}	
    			else
    			{
    				echo "Registration succsess";
    			}
		}
   	}
}

$user = new Register();
$user -> add_user();

?>