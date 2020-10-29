<?php
	include 'connection.php';

class Insert_order_tbl extends Connection
{
	function Insert_order()
	{
		if (isset($_POST['bill_no'])) 
		{
			
		$Receiver_name= $_POST['Receiver_name'];
		$bill_no = $_POST['bill_no'];
 		$order_date = $_POST['order_date'];
 		$Receiver_add = $_POST['Receiver_add'];
 		$item_subtotal = $_POST['item_subtotal'];
 		$discount = $_POST['discount'];
 		$grand_total = $_POST['grand_total'];

 		$item_name = $_POST['item_name'];
	  	$item_brand = $_POST['item_brand'];
	  	$price = $_POST['price'];
	  	$item_qunt = $_POST['item_qunt'];
	  	$item_total = $_POST['item_total'];
	

		$sql_ins_order = " INSERT INTO `order_tbl`(`bill_no`, `receiver_name`, `receiver_add`, `order_date`, `order_sub_total`, `order_discount`, `order_grand_total`) VALUES ('$bill_no' , '$Receiver_name' , '$Receiver_add' , '$order_date' , '$item_subtotal' , '$discount' , '$grand_total')";

		$execute_query = mysqli_query($this->con,$sql_ins_order);

		if(!$execute_query)
		{
			die('Invalid query: ' . mysql_error());
		}
		else
			{
				$count = count($item_name);
	  			for ($i=0; $i<$count; $i++)
	  			{ 

	  				$item_namei = $item_name[$i];	
	  				$item_brandi = $item_brand[$i];
	  				$pricei = $price[$i];
	  				$item_qunti = $item_qunt[$i];
	  				$item_totali = $item_total[$i];

					$sql_order_item = "INSERT INTO `order_item_tbl`(`bill_no`, `item_name`, `item_brand`, `item_price`, `item_quantity`, `item_total`) VALUES ('$bill_no','$item_namei','$item_brandi','$pricei','$item_qunti','$item_totali')";

					$result = mysqli_query($this->con,$sql_order_item);
					if (!$result) 
					{	
     					die('Invalid query: ' . mysql_error());
    				}
    				else
    				{
    					echo "Records Are added";
    				}
	  			}
			}

		}
	}
}



$order1 = new Insert_order_tbl();
$order1 ->Insert_order();


?>