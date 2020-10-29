<?php
	/**
	 * 
	 */include('connection.php');
	class Edit extends Connection
	{
		
		function edit_records()
		{
			print_r($_POST);
			if ($_POST['edit_bill_no']) 
			{	
				$edit_bill_no = $_POST['edit_bill_no'];
				$edit_Receiver_name = $_POST['edit_Receiver_name'];
				$edit_order_date = $_POST['edit_order_date'];
				$edit_Receiver_add = $_POST['edit_Receiver_add'];

				$item_name = $_POST['item_name'];
				$item_brand = $_POST['item_brand'];
				$item_price = $_POST['item_price'];
				$item_quantity = $_POST['item_quantity'];
				$item_total = $_POST['item_total'];

				$item_subtotal = $_POST['item_subtotal'];
				$discount = $_POST['discount'];
				$grand_total = $_POST['grand_total'];

				$sql_edit_ord = " UPDATE `order_tbl` SET `bill_no`= '$edit_bill_no',`receiver_name`='$edit_Receiver_name',`receiver_add`='$edit_Receiver_add',`order_date`='$edit_order_date',`order_sub_total`='$item_subtotal',`order_discount`='$discount',`order_grand_total`='$grand_total' WHERE `bill_no`='$edit_bill_no' ";

				$execute_query = mysqli_query($this->con,$sql_edit_ord);

				if (!$execute_query) 
				{
					die("Error :". mysqli_error());
				}
				else
				{
					$count = count($item_name);
	  				for ($i=0; $i<$count; $i++)
	  				{ 

		  				$item_namei = $item_name[$i];	
		  				$item_brandi = $item_brand[$i];
		  				$item_pricei = $item_price[$i];
		  				$item_quantityi = $item_quantity[$i];
		  				$item_totali = $item_total[$i];

						$sql_edit_item = " UPDATE `order_item_tbl` SET `bill_no`='$edit_bill_no',`item_name`='$item_namei',`item_brand`='$item_brandi',`item_price`='$item_pricei',`item_quantity`='$item_quantityi',`item_total`='$item_totali' WHERE `bill_no`='$edit_bill_no' ";
	 
						$result = mysqli_query($this->con,$sql_edit_item);

						if (!$result) 
						{	
	     					die('Invalid query: ' . mysql_error());
	    				}
	  				}
				
		
			}
		}
	}

$edit = new Edit();
$edit -> edit_records();
	

?>