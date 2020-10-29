<?php
include('Modal/connection.php');

class Api
{
	function create_API()
	{
		$con = mysqli_connect("localhost","root","","invoice_db");

		if (!isset($con)) {
			echo "Error ;".mysqi_error();
		}
		$array_API = array();

		$query = " SELECT * FROM `order_tbl` ";
		$result = mysqli_query($con,$query);
		if (isset($result)) 
		{
			if(mysqli_num_rows($result) > 0)
			{
				while ($row = mysqli_fetch_array($result)) 
				{
					$data['order_id'] = $row['order_id'];
					$data['bill_no'] = $row['bill_no'];
					$data['receiver_name'] = $row['receiver_name'];
					$data['receiver_add'] = $row['receiver_add'];
					$data['order_date'] = $row['order_date'];
					$data['order_sub_total'] = $row['order_sub_total'];
					$data['order_discount'] = $row['order_discount'];
					$data['order_grand_total'] = $row['order_grand_total'];

					$fetch_data[]=$data;
				}
				$array_API['Total_Invoice'] = $fetch_data;
				$array_API['success']=1;
			}
			else
			{
				echo "No Records Found";
			}
		}
		else
		{
			$array_API['success']= 0;
			$array_API['message'] = "No records Found";
		}
		echo json_encode($array_API);
	}
}
$Invoice = new Api();
$Invoice->create_API();
?>