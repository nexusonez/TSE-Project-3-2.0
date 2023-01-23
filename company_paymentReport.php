<?php require_once "controllerUserDocData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Payment Report</title>
<link rel="stylesheet" href="css/style.css"> <!-- css files-->
	
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> <!-- font awesome-->
	<style>
	
	h1{
	margin-top:30px;
	font-size:35px;
	font-family:Agency FB;
	font-weight:bold;
	color:blue;
    padding:1%
	}
	
	.form{
	width: 100%;
	z-index: 1;
	border:3px solid blue!important;
	padding:2%;
	height:50rem;
	margin-top:10px;
	}
	
	.title{
	width: 120%;
	margin-top:-40px;
	font-size:25px;
	font-weight:bold;
	font-family: Agency FB;
	color:white;
	background-color:blue;
	position:relative;
	margin-left:-32px;
	}
	
	
	.btn, .btn1 {
	margin:0 auto;
	display:flex;
	font-size:20px;
	background:#00ff00;
    height:30px;
	position:absolute;
	margin-top:480px;
	margin-left:30px;
	color:white;
	width:7rem;
	justify-content:center;
	cursor:pointer;
	}
	
	.btn1{
	margin-left:700px;
	background:#ff0000;
	}
	
	.gender{
	margin-left:200px;
	}
	
	input{
	margin-left:-80px;
	font-size:15px;
	width:400px;
	text-transform:none;
	}
	
	input:hover{
	cursor:not-allowed;
	}

    .grid-container {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        grid-template-rows: repeat(2, 1fr);
        grid-gap: 10px;
        padding-bottom: 5px;
        padding-right: 450px;
        padding-left: 450px;
    }

    table {
            border:1px solid black;
        }

    tr:nth-child(odd) {
        background-color: #D6EEEE;
    }

    .column1{
            float: right;
            width: 10%;
        }

    .column3{
        float:left;
        width:30;
    }
    input[type=submit]#approveInvoice{
        background-color: #0075C9; /* or #0075C9 for blue color */
        color: white;
        padding: 5px 10px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        padding-left: 35px;
    }
    input[type=submit]#approveInvoice:before{
        content: "\f00c";
        font-family: "Font Awesome 5 Free";
        font-weight: 800;
        font-size: 20px;
        position: absolute;
        left: 10px;
    }
    input[type=submit]#denyInvoice{
        background-color: #F5A623; /* or #0075C9 for blue color */
        color: white;
        padding: 5px 10px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        padding-left: 35px;
    }
    input[type=submit]#denyInvoice:before{
        content: "\f00c";
        font-family: "Font Awesome 5 Free";
        font-weight: 800;
        font-size: 20px;
        position: absolute;
        left: 10px;
    }
	</style>
</head>
<body>
	<!-- <header>
        <?php 
		//include "navigation.php"; 
		?>

		
    </header> -->
    <?php
    include 'connection.php';
    
    if(isset($_GET['view']))
    {
        $id = $_GET["invoiceID"];
        $result = mysqli_query($connect, "SELECT * FROM invoice WHERE invoiceID='$id'");
        $row = mysqli_fetch_assoc($result);
        $total_no_invoices = "SELECT COUNT(invoiceID) FROM invoice WHERE invoiceStatus = 'Approved' AND payStatus = 'Pending'";
        $total_no_invoices_expired = "SELECT COUNT(invoiceID) FROM invoice WHERE invoiceStatus = 'Expired' AND payStatus = 'Pending'";
        $total_no_invoices_paid = "SELECT COUNT(invoiceID) FROM invoice WHERE invoiceStatus = 'Approved' AND payStatus = 'Paid'";
        $total_no_invoices_pending = "SELECT COUNT(invoiceID) FROM invoice WHERE invoiceStatus = 'Pending' AND payStatus = 'Pending'";
        $invoices_paid_total = "SELECT SUM(totalPrice) FROM invoice WHERE payStatus = 'Paid'";
        $invoices_pending_total = "SELECT SUM(totalPrice) FROM invoice WHERE payStatus = 'Pending'";
    ?>	  
        
        
	<div>
    <title>Payment Report</title>
        <br><br>
        
        <div class="grid-container">
            <div class="grid-item">
                <label for = "issueDate"> Total Number Of Invoices:  </label>
            </div>
            <div class="grid-item">
                <label><?php echo $row["issueDate"];?></label>
            </div>
            <div class="grid-item">
                <label for = "companyID"> Total Number Of Invoices Past Due : </label>
            </div>   
            <div class="grid-item">
            <label><?php echo $row["companyID"];?></label>
            </div>             
            <div class="grid-item">
                <label for = "companyName"> Invoices Paid : </label>
            </div>
            <div class="grid-item">
            <label><?php echo $row["companyName"];?></label>
            </div>
            <div class="grid-item">
                <label for = "dueDate"> Invoice Paid In Total (RM) : </label>
            </div>
            <div class="grid-item">
                <label><?php echo $row["dueDate"];?></label>
            </div>
            <div class="grid-item">
                <label for = "invoiceStatus"> Invoices Pending In Total (RM): : </label>
            </div>
            <div class="grid-item">
            <label><?php echo $row["invoiceStatus"];?></label>
            </div>
        </div>
    </div>

        <div>
            <div> <h1>Product Detail</h1> </div>

            <div><center>

                <table style = "width : 60%">
                    <tr>
                        
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                    </tr>

                    <?php
                        
                    $products = mysqli_query($connect, "SELECT * FROM product WHERE invoiceID='$id'");
                    $totalPrice_query= mysqli_query($connect, "SELECT totalPrice FROM product WHERE invoiceID='$id'");    
                    $totalPrice = 0;
                    while ($totalPrice_row = mysqli_fetch_array($totalPrice_query)){
                        $totalPrice = $totalPrice + $totalPrice_row["totalPrice"];
                    }
                    while($row = mysqli_fetch_array($products)) 
                    {
                    ?>
                        <tr>
                            <td><?php echo $row["productID"];?></td>
							<td><?php echo $row["productName"];?></td>
							<td><?php echo $row["price"];?></td>
							<td><?php echo $row["quantity"];?></td>
							<td><?php echo $row["totalPrice"];?></td>
                        </tr>

                    <?php 
                    
                    }
                    // reset the result set
                    mysqli_data_seek($products,0);
                
                ?>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Summary (RM) :</td>
                        <td><?php echo $totalPrice?></td>

                    </tr>
                </table>
                

            </center></div>

        </div>
        <button type="cancel" name= "cancel payment"><a class= "a" href="cfo_viewInvoiceHistory.php"> Go Back </a></button>            


        <?php } ?>

</body>


