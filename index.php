<?php    
session_start();
    if (isset($_SESSION['log_email']) && isset($_SESSION['log_password'])) 
    {
        
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title></title>
        </head>
        <body>
            <div >
                <h2 style = "border:1px solid #d4d4d4; padding: 10px; "><I><?php echo "Welcome Admin : " .$_SESSION['log_email']."!!!<br>";  ?></I></h2>
            </div>

        <?php
class Invoice_system
        {
    
    function invoice()
    {

        include 'View/header.php';

        $action = "";

        if (isset($_GET['action'])) 
        {
            $action = $_GET['action'];

                switch ($action) 
                {
                    case "new_invoice":
                    echo "<br>"."<br>"."<br>"."<br>";
                       include 'View/invoice_view.php';
                       include 'View/ajax_call_invoice.php';
                       break;

                    case "show_invoice":
                    echo "<br>"."<br>"."<br>"."<br>";
                        include 'Modal/get_all_invoice.php';
                        
                        break;

                    default:
                       header("Location:index.php");
                }   
        }
    }
}

$invoice = new Invoice_system();
$invoice -> invoice();

?>

</body>
</html>
<?php
    }
    
    else
    {
        header("Location:log_in.php");
    }

?>


