<?php require_once "controllerUserDocData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Invoice Details</title>
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
        grid-template-columns: repeat(4, 1fr);
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
	
	</style>
</head>
<body>
	<!-- <header>
        <?php 
		//include "navigation.php"; 
		?>

		
    </header> -->
    <?php
    if(isset($_GET['preview']))
    {
        $id = $_GET["invoiceID"];
        $result = mysqli_query($connect, "SELECT * FROM invoice WHERE invoiceID='$id'");
        $row = mysqli_fetch_assoc($result);
        $payment_status_result = mysqli_query($connect, "SELECT paymentStatus FROM payment WHERE invoiceID='$id'");
        $payment_row = mysqli_fetch_assoc($payment_status_result);
    ?>	  
        
        
	<div>
	    <div><h1>Invoice ID: <?php echo $row["invoiceID"]; ?></h1></div>
        <br><br>
        
        <div class="grid-container">
            <div class="grid-item">
                <label for = "issueDate"> Date Issued : </label>
            </div>
            <div class="grid-item">
                <label><?php echo $row["issueDate"];?></label>
            </div>
            <div class="grid-item">
                <label for = "companyID"> Company ID : </label>
            </div>   
            <div class="grid-item">
            <label><?php echo $row["companyID"];?></label>
            </div>             
            <div class="grid-item">
                <label for = "companyName"> Company Name : </label>
            </div>
            <div class="grid-item">
            <label><?php echo $row["companyName"];?></label>
            </div>
            <div class="grid-item">
                <label for = "dueDate"> Invoice Due : </label>
            </div>
            <div class="grid-item">
                <label><?php echo $row["dueDate"];?></label>
            </div>
            <div class="grid-item">
                <label for = "invoiceStatus"> Invoice Status : </label>
            </div>
            <div class="grid-item">
            <label><?php echo $row["invoiceStatus"];?></label>
            </div>
        </div>
    </div>
<?php } ?>
    

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
                    if(isset($_GET['preview']))
                    {
                        $id = $_GET["invoiceID"];
                        $result = mysqli_query($connect, "SELECT * FROM product WHERE invoiceID='$id'");
                        $totalPrice_query= mysqli_query($connect, "SELECT totalPrice FROM product WHERE invoiceID='$id'");
                        $totalPrice = 0;
                        while ($totalPrice_row = mysqli_fetch_array($totalPrice_query)){
                            $totalPrice = $totalPrice + $totalPrice_row["totalPrice"];
                            
                        }
                    }
                    while($row = mysqli_fetch_assoc($result)) 
                    {
                    ?>
                        <tr>
                            <td><?php echo $row["productID"];?></td>
							<td><?php echo $row["productName"];?></td>
							<td><?php echo $row["price"];?></td>
							<td><?php echo $row["quantity"];?></td>
							<td><?php echo $row["totalPrice"];?></td>
                        </tr>

                        
                        

                    <?php }?>

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
</body>
<?php
    


?>

