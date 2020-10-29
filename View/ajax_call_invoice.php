
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

  <script type="text/javascript">
//append rowS
            var counter = 0;
            $('#addRow').click(function(){

          $.ajax({
              url: 'View/append_row.php',
              type: 'post',
              data: {
                counter:counter
              },
            success:function(data,status){
              counter++;
                $('#tbody').append(data);
            }
          });   
        });

//remove button
        $(document).on('click','.remove',function(){
        $(this).parents('tr').remove();
            });

//row wise total
        $('tbody').on('change','.item_qunt',function(){
             var price = $(this).closest('tr').find('.price').val();
             var item_qunt = $(this).closest('tr').find('.item_qunt').val();
             var item_total = $(this).closest('tr').find('.item_total').attr("id");

                var data= 0;
                row_total = price * item_qunt;
                
                $('#'+item_total).val(row_total);

//getting sub total
                var sub_total = 0;
                $('.item_total').each(function(){

                 sub_total = parseInt(sub_total) + parseInt($(this).val());
             });
                 $('#item_subtotal').val(sub_total);
            }); 

//discounts
          $('#discount').change(function(){
            var discount = $(this).closest('tr').find('.discount').val();
            var subtotal = $(this).closest('tr').find('#item_subtotal').val();

            var total_discount = (parseInt(subtotal) * parseInt(discount)) / 100;
            var grand_total = subtotal - total_discount;
            $('#grand_total').val(grand_total);

          });
//insert data into database

          $('#btnSubmit').click(function()
          {
            var Receiver_name = $('#Receiver_name').val();
            var bill_no = $('#bill_no').val();
            var order_date = $('#order_date').val();
            var Receiver_add = $('#Receiver_add').val();
            var item_subtotal = $('#item_subtotal').val();
            var discount = $('#discount').val();
            var grand_total = $('#grand_total').val();


            if (Receiver_name == "")
            {
              alert("Please Enter Receiver name");
            }
            else if (bill_no == "")
            {
              alert("Please Enter Bill Number ");
            }
            else if (order_date == "")
            {
              alert("Please Select Order Date");
            }
            else if (Receiver_add == "")
            {
              alert("Please Enter Receiver Address");
            }
            else
            {
                $.ajax({
                url : 'Modal/insert_order_tbl.php',
                method : 'post',
                data : $("#my_form input").serialize(),

                success : function(data,status)
                {
                  alert("Records Are Inserted");
                }
              });
            }
              
        }); 


  </script>

</body>
</html>