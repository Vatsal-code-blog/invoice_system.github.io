<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
	 <table class="table table-striprd table-hover table-bordered">
        <thead style="font-size: 25px;">
            <tr>
                <th>Invoice No.</th>
                <th>Invoice Date</th>
                <th>Invoice Name</th>
                <th>Bill No</th>
                <th>Invoice Total</th>
                <th>Download Invoice</th>
            </tr>
       </thead>

<?php

	include 'connection.php';
/**
 * 
 */
class Get_invoice extends Connection
{
	
	function get_all_invoice()
	{
		$get_invoice = "SELECT * FROM `order_tbl`";
		$query_get_invoice = mysqli_query($this->con,$get_invoice);

			if (mysqli_num_rows($query_get_invoice) > 0) 
			{
				while ($row = mysqli_fetch_array($query_get_invoice)) 
				{
					echo '<tr style="font-size: 20px;">
					<td>'. $row['order_id'].'</td>	
					<td>'. $row['order_date'].'</td>
					<td>'. $row['receiver_name'].'</td>
					<td>'. $row['bill_no'].'</td>
					<td>'. $row['order_grand_total'].'</td>
					<td>
						<a href="Modal/print_invoice.php?pdf_id='.$row['bill_no'].' ">Pdf</a>
					</td>
					<tr>';


				}
			}
	}
}

$obj1 = new Get_invoice();
$obj1 -> get_all_invoice();

?>



   </table> 
</body>
</html>