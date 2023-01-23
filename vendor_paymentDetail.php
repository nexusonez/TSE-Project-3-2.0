<?php require_once "controllerUserDocData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Payment Details</title>
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

    .column1{
            float: right;
            width: 10%;
        }

    .column3{
        float:left;
        width:30;
    }
    input[type=submit]#approvePayment{
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
    input[type=submit]#approvePayment:before{
        content: "\f00c";
        font-family: "Font Awesome 5 Free";
        font-weight: 800;
        font-size: 20px;
        position: absolute;
        left: 10px;
    }
    input[type=submit]#denyPayment{
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
    input[type=submit]#denyPayment:before{
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
        $id = $_GET["paymentID"];
        $result = mysqli_query($connect, "SELECT * FROM payment WHERE paymentID='$id'");
        $row = mysqli_fetch_assoc($result);

        $invoice_result = mysqli_query($connect, "SELECT * FROM invoice WHERE paymentID = '$id'");
        $invoice_row = mysqli_fetch_assoc($invoice_result);
    ?>	  
        
        
	<div>
	    <div><h1>Payment Detail :</h1></div>
        <br><br>
        
        <div class="grid-container">
            <div class="grid-item">
                <label for = "invoiceID"> Invoice ID : </label>
            </div>
            <div class="grid-item">
                <label><?php echo $row["invoiceID"];?></label>
            </div>

            <div class="grid-item">
                <label for = "companyID"> Company ID : </label>
            </div>   
            <div class="grid-item">
            <label><?php echo $row["companyID"];?></label>
            </div>  

            <div class="grid-item">
                <label for = "paymentID"> Payment ID : </label>
            </div>
            <div class="grid-item">
            <label><?php echo $row["paymentID"];?></label>
            </div>

            <div class="grid-item">
                <label for = "paymentDate"> Payment Date : </label>
            </div>
            <div class="grid-item">
                <label><?php echo $row["paymentDate"];?></label>
            </div>

            <div class="grid-item">
                <label for = "companyName"> Company Name : </label>
            </div>
            <div class="grid-item">
            <label><?php echo $invoice_row["companyName"];?></label> 
            </div>

            <div class="grid-item">
                <label for = "paymentType"> Payment Type : </label>
            </div>
            <div class="grid-item">
                <label><?php echo $row["paymentType"];?></label>
            </div>

            <div class="grid-item">
                <label for = "totalPrice"> Total Paid(RM) : </label>
            </div>
            <div class="grid-item">
                <label><?php echo $invoice_row["totalPrice"];?></label>
            </div>

            <div class="grid-item">
                <label for = "paymentStatus"> Payment Status : </label>
            </div>
            <div class="grid-item">
                <label><?php echo $row["paymentStatus"];?></label>
            </div>
            <button type="button"><a class= "a" href="vendor_paymentHistory.php">  Go Back </a></button>

        </div>

    </div>
<?php } ?>
    





</body>


