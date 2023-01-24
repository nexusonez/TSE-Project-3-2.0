<?php require_once "controllerUserDocData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Invoice Details</title>
<link rel="stylesheet" href="css/style.css"> <!-- css files-->
	
    <script defer src="https://use.fontawesome.com/releases/v6.2.0/js/all.js"></script> <!-- font awesome-->
	<style>
	
	h1{
		font-weight:bold;
		font-family: Agency FB;
		font-size: 30px;
		display:inline;
		margin: auto;
		width: 60%;
		padding: 10px;
	}
	
	h2{
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
	
	
    .grid-container {
		margin-top:-20px;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-template-rows: repeat(2, 1fr);
        grid-gap: 10px;
        padding-left: 15px;
		font-size:20px;
		width:70%;
    }
	
	.grid-item > label{
		font-weight:bold;
		font-family: Agency FB;	
		font-size:25px;
	}
	

    table {
            border:1px solid black;
        }

    tr:nth-child(odd) {
        background-color: #D6EEEE;
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
        
        font-weight: 800;
        font-size: 20px;
        position: absolute;
        left: 10px;
    }
	
	th,td, table{
            box-shadow: 0 10px 20px 0 rgba(0,0,0,.03);
			border-collapse: collapse;
			text-align:center;
        }

        tr:nth-child(odd) {
            background-color: #D6EEEE;
        }
		
		th{
			font-size:17px;
			background-color:#0000ff;
			color:white;
		}
		
		td{
			font-size:15px;
			text-align:center;
			background-color:white;
		}
		
		button {
			font-family: Agency FB;
			border: 2px solid black!important;
			border-width: 5px;
			outline-color: black;
			padding: 8px 10px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			margin: 40px 80px;
			cursor: pointer;
			font-weight: bold;
			border-radius:20px;
			font-size:20px;
			background:#90EE90;
		}
	</style>
</head>
<body>
	<header>
        <?php 
		include "navigation.php"; 
		?>
    </header>
    <?php
    include 'connection.php';
    
    if(isset($_GET['view']))
    {
        $id = $_GET["receiptID"];
        $result = mysqli_query($connect, "SELECT * FROM receipt WHERE receiptID='$id'");
        $row = mysqli_fetch_assoc($result);
        $fromInvoice = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM invoice WHERE invoiceID = '{$row['invoiceID']}' "));
        $fromPayment =  mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM payment WHERE invoiceID = '{$row['invoiceID']}' "));
    ?>	  
        
        
	<div>
	    <div><h2 style ="margin-top:80px;">Receipt ID: <?php echo $row["receiptID"]; ?></h1></div>
        <br><br>
        
        <div class="grid-container" style="">
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
            <label><?php echo $fromInvoice["companyID"];?></label>
            </div>             
            <div class="grid-item">
                <label for = "companyName"> Company Name : </label>
            </div>
            <div class="grid-item">
            <label><?php echo $fromInvoice["companyName"];?></label>
            </div>
            <div class="grid-item">
                <label for = "paymentID"> Payment ID : </label>
            </div>
            <div class="grid-item">
            <label><?php echo $fromPayment["paymentID"];?></label>
            </div>
            <div class="grid-item">
                <label for = "paymentDate"> Payment Date : </label>
            </div>
            <div class="grid-item">
            <label><?php echo $fromPayment["paymentDate"];?></label>
            </div>
        </div>
    </div>

        <div>
            <div> <h2 style ="margin-top:10px;" >Product Details</h2> </div>


        </div>
        <button onclick="window.location.href='accountant_viewReceipt.php';" type="cancel" name= "cancel payment"> Go Back <i class="fa-solid fa-arrow-right-from-bracket"></i></button>            


        <?php } ?>

</body>
</html>

