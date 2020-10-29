<?php

    include('Modal/generate_bill_no.php');
      $bill_number = new Generate_bill_no();
      $last_bill_no = $bill_number -> Gen_bill();
      $bill_no = $last_bill_no+1;
     
  ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container" style=" border:1px solid #d4d4d4; padding: 40px">
<form id="my_form" action="" method="post">
	<div class="header-container">
		<div class="row">
			   <div>
                <span style="float: right; top: 0px; ">
                  <strong>Bill No. :</strong><br><br>
                  <input type="text" name="bill_no" id="bill_no" value="<?php echo $bill_no; ?>" readonly><br><br>
                </span>
               
                
                  <strong>Receiver Name:</strong><br><br>
                   <input type="text" name="Receiver_name" id="Receiver_name" placeholder="Receiver Name"> <br><br>
                
                   <span style="float: right; ">
                   <strong>Order Date:</strong><br><br>
                  <input type="date" name="order_date" id="order_date"><br><br>
                  </span>

                  <strong>Billed To:</strong><br><br>
                  <input type="textarea" id="Receiver_add" name="Receiver_add" placeholder="Enter Billing address"><br><br>    
      		</div>

      		
    	</div>
	</div>

	 <div class="row">
        <table class="table table-bordered" id="item_table">
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
            </tbody>
                        
            <tbody id="tbody1">
                <tr id="hiderow">
                    <td colspan="4">
                        <a id="addRow"  title="Add a row" class="btn btn-primary add_button">Add a row</a>
                    </td>
                </tr>
		 	        	<tr>
                            
                    <td class="text-right "><strong>Sub Total</strong></td>
                    <td><span> <input type="text" name="item_subtotal" id="item_subtotal" class="form-control item_subtotal"></span></td>
                        
                    <td class="text-right"><strong>Discount</strong></td>
                    <td><input class="form-control discount" name="discount" id="discount" value="0%" type="text"></td>
                            
                    <td class="text-right"><strong>Grand Total</strong></td>
                    <td><input class="form-control grand_total" name="grand_total" id="grand_total" value="0" type="text"></td>

                </tr>
                <tr>
                <td colspan="4">
                    <center><input type="submit" name="btnSubmit" id="btnSubmit" class="btn btn-primary" value="Generate Invoice"></center>
                </td>
                </tr>
                        
            </tbody>
        </table>
    </div>
</form>
</div>
</body>
</html>