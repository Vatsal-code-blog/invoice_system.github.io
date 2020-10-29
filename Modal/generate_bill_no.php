<?php

	include('Modal/connection.php');

	class Generate_bill_no extends Connection
	{
		public $bill_no;
		function Gen_bill()
		{
			$Bill_no = " SELECT * FROM `order_tbl` ";
			$results = mysqli_query($this->con,$Bill_no);
			if (mysqli_num_rows($results) > 0) 
			{
				while ($row = mysqli_fetch_array($results)) 
				{
					$bill_no[] = $row['bill_no'];
				}
			}
			return max($bill_no);
		}
	}

?>