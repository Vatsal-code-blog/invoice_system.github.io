<html>
<head>
	<title>Edit Invoice Record</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php
include('connection.php');

class Edit_record extends Connection
{
	
	function editRecord()
	{
		$edit_id = $_GET['update_id'];
		$edit_query = "SELECT * FROM `order_tbl` WHERE bill_no = $edit_id ";
		$result_edit = mysqli_query($this->con,$edit_query);

		if (mysqli_num_rows($result_edit) > 0) 
		{
			while ($rows = mysqli_fetch_array($result_edit)) 
			{
	?>
   				<h1 style=" text-align: center; ">Edit Invoice</h1>
    	<div class="container" style=" border:1px solid #d4d4d4;">
    		<form id="eidt_form" action="" method="post">
              <div>
                <span style="float: right; top: 0px; ">
                  <strong>Bill No. :</strong><br><br>
                  <input type="text" name="edit_bill_no" id="edit_bill_no" value="<?php echo $edit_id; ?>" readonly><br><br>
                </span>
               
                
                  <strong>Receiver Name:</strong><br><br>
                   <input type="text" name="edit_Receiver_name" id="edit_Receiver_name" value="<?php echo $rows['receiver_name'] ?>"> <br><br>
                
                   <span style="float: right; ">
                   <strong>Order Date:</strong><br><br>
                  <input type="date" name="edit_order_date" id="edit_order_date" value="<?php echo $rows['order_date'] ?>"><br><br>
                  </span>

                  <strong>Billed To:</strong><br><br>
                  <input type="textarea" id="edit_Receiver_add" name="edit_Receiver_add" value="<?php echo $rows['receiver_add'] ?>"><br>   
      		</div>

            <div class="row">
        <table class="table table-bordered">
            <thead>
               <tr class="item-row">
                   <th>Item</th>
                   <th>Brand</th>
                   <th>Price</th>
                   <th>Quantity</th>
                   <th>Total</th>
                   <th></th>
               </tr>
            </thead>

            <tbody id="tbody">
    <?php
			        $get_item_query = "SELECT * FROM `order_item_tbl` WHERE bill_no = $edit_id ";
					$result_get_item = mysqli_query($this->con,$get_item_query);

					if (mysqli_num_rows($result_get_item) > 0) 
					{
						while ($row = mysqli_fetch_array($result_get_item)) 
						{	
							$item_name[] = $row['item_name'];
							$item_brand[] = $row['item_brand'];
							$item_price[] = $row['item_price'];
							$item_quantity[] = $row['item_quantity'];
							$item_total[] = $row['item_total'];
						}
					}
							$count = count($item_name);
							for($i=0; $i<$count; $i++)
							{
								$item_namei = $item_name[$i];	
				  				$item_brandi = $item_brand[$i];
				  				$pricei = $item_price[$i];
				  				$item_qunti = $item_quantity[$i];
				  				$item_totali = $item_total[$i];
				?>
						<tr>
							<td><input type="text"  class="form-control item_name" name="item_name[]" value="<?php echo $item_namei; ?>"></td>
							<td><input type="text" class="form-control item_brand" name="item_brand[]" value="<?php echo $item_brandi; ?>"></td>
							<td><input class="form-control price" type="text" name="item_price[]" value="<?php echo $pricei; ?>"></td>
							<td><input class="form-control item_qunt" type="text" name="item_quantity[]" value="<?php echo $item_qunti; ?>"></td>
							<td><input class="form-control item_total" id="item_total" type="text" name="item_total[]" value="<?php echo $item_totali; ?>"></td>
							<td><button class="remove" style="background-color: red"> - </button></td><br>
						</tr>
				<?php 
							}
				?>
            

            </tbody>
                        
            <tbody id="tbody1">
		 		<tr>        
                    <td colspan="4" style=" text-align: right; "><strong>Sub Total</strong></td>
                    <td><input type="text" name="item_subtotal" id="item_subtotal" class="form-control item_subtotal" value="<?php echo $rows['order_sub_total']; ?>"></td>
                                        
                    <td colspan="4" style=" text-align: right; "><strong>Discount</strong></td>
                    <td><input class="form-control discount" name="discount" id="discount" value="<?php echo $rows['order_discount']; ?>" type="text"></td>
                </tr>
                <tr>                     
                   <td colspan="4" style=" text-align: right; "><strong>Grand Total</strong></td>
                    <td><input class="form-control grand_total" name="grand_total" id="grand_total" value="<?php echo $rows['order_grand_total']; ?>" type="text"></td>

                </tr>
                <tr>
                <td colspan="6">
                    <center><input type="submit" name="edit_btn" id="edit_btn" class="btn btn-primary" value="Edit Invoice"></center>
                </td>
                </tr>
                        
            </tbody>
        </table>
    </div>
</form>
  </div>

    <?php
			}
		}
	}
}

$edit_record = new Edit_record();
$edit_record -> editRecord();
?>

<script type="text/javascript">

        $(document).on('click','.remove',function(){
        $(this).parents('tr').remove();
            });

         $('tbody').on('click','.item_qunt',function(){
             var price = $(this).closest('tr').find('.price').val();
             var item_qunt = $(this).closest('tr').find('.item_qunt').val();
             var item_total = $(this).closest('tr').find('.item_total').val();

                var data= 0;
                row_total = (parseInt(price) * parseInt(item_qunt));
                rowtotal = parseInt(row_total);
                alert(rowtotal);
                
                $('#'+item_total).val(rowtotal);

//getting sub total
                var sub_total = 0;
                $('.item_total').each(function(){

                 sub_total = parseInt(sub_total) + parseInt($(this).val());
             });
                 $('#item_subtotal').val(sub_total);
            }); 

//discounts
          $('#discount').click(function(){
            var discount = $(this).closest('tr').find('.discount').val();
            var subtotal = $(this).closest('tr').find('#item_subtotal').val();

            var total_discount = (parseInt(subtotal) * parseInt(discount)) / 100;
            var grand_total = parseInt(subtotal) - parseInt(total_discount);
            $('#grand_total').val(grand_total);

          });

          $('#edit_btn').click(function(){

          	$.ajax({
                url : 'edit_records.php',
                method : 'post',
                data : $("#eidt_form input").serialize(),

                success : function(data,status)
                {
                  alert(data);
                }
              });

          });

</script>
</body>
</html>
