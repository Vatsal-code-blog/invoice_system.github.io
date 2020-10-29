<?php
session_start();
include('connection.php');
class Log_in_verify extends Connection
{
	
	function verify()
	{
		if (isset($_POST['log_email']))
		{
			$log_email = $_POST['log_email'];
			$log_password = $_POST['log_password'];

			$sql_logIn = "SELECT `email`, `password` FROM `register_tbl` WHERE `email`='$log_email' && `password`='$log_password' ";

			$results=($row=mysqli_query($this->con,$sql_logIn));
				if(mysqli_num_rows($results) >0) 
				{
					echo $success = true;

					$_SESSION['log_email']= $log_email;
					$_SESSION['log_password']= $log_password;

    			}
    			else
    			{

			        echo "Wrong Username Password";
				}
		}
			
	}
}

$logIn = new Log_in_verify();
$logIn -> verify();
?>