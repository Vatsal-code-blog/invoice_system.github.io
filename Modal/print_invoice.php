
<!DOCTYPE html>
<html>
<head>
	<title>Print Invoice Page</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<h1 style=" text-align: center; ">Payment Receipt </h1>
	<?php
include('../vendor/autoload.php');
include('connection.php');

class Get_records extends Connection
{
	
	function Get_ords()
	{
		$output = '';
	$pdf_id = $_GET['pdf_id'];
	$get_ord = "SELECT * FROM `order_tbl` WHERE bill_no = $pdf_id ";
	$results = mysqli_query($this->con,$get_ord);

		if (mysqli_num_rows($results) > 0) 
		{
			while ($rows = mysqli_fetch_array($results)) 
			{
	$output .= '
   <h1 style=" text-align: center; ">Invoice</h1>
    <div class="container" style=" border:1px solid #d4d4d4; padding: 40px">
                  <strong>Bill No. :</strong>
                  <label id="bill_no">'.$rows["bill_no"].'</label><br><br>
               
                
                  <strong>Receiver Name:</strong>
                   <label id="Receiver_name">'.$rows['receiver_name'].'</label><br><br>
                
                   <strong>Order Date:</strong>
                  <label id="order_date">'.$rows['order_date'].'</label><br><br>

                  <strong>Receiver Address:</strong>
                  <label id="Receiver_add">'.$rows['receiver_add'].'</label><br><br>

            <table width="100%" border="1" cellpadding="5" cellspacing="0"> 
          <tr>
            <th>Sr No. </th>
            <th>Item Name </th>
            <th>Item Brand </th>
            <th>Item Price </th>
            <th>Item Quantity </th>
            <th>Total </th>
            
          </tr>
          ';
      			$get_ord_items = "SELECT * FROM `order_item_tbl` WHERE bill_no = $pdf_id ";
				$results_items = mysqli_query($this->con,$get_ord_items);

				$counter = 1;

				if (mysqli_num_rows($results_items) > 0) 
				{
					while ($row = mysqli_fetch_array($results_items)) 
					{
					$output .= '
						   echo "<tr>
						          <td>'.$counter .'</td>
						          <td>'. $row['item_name'].'</td> 
						          <td>'. $row['item_brand'].'</td>
						          <td>'. $row['item_price'].'</td>
						          <td>'. $row['item_quantity'].'</td>
						          <td>'. $row['item_total'].'</td>
						          <tr>";
						   ';
					$counter = $counter+1;
					}
				}
				 $output .= '
					  echo "<tr> 
					            <td colspan="5" style=" text-align: right; "> <b> Sub Total </b></td>
					            <td>'.$rows['order_sub_total'].'</td>
					           </tr>";

					        echo "<tr>
					            <td colspan="5" style=" text-align: right; "><b> Discount </b></td>
					            <td>'.$rows['order_discount'].'</td>
					           </tr>";

					        echo "<tr>
					            <td colspan="5" style=" text-align: right; "><b> Grand Total </b></td>
					            <td>'.$rows['order_grand_total'].'</td>
					           </tr>";

					           </table>

					           <div>
					           <br><br><br>
					           			<label>Authorise Signature</label
					           </div>

      							</div>
					  
					  ';
			}
		}
			$body = ob_get_clean();
			$mpdf = new \Mpdf\Mpdf();
			$mpdf->WriteHTML($output);
			$mpdf->Output('invoice.pdf','D'); 
	}
}

$record = new Get_records();
$record -> Get_ords();

?>

</table>
</body>
</html>