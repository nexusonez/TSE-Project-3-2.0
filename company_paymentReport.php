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
        border-style: dotted;
        border-width: 5px;
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        grid-template-rows: repeat(2, 1fr);
        grid-gap: 10px;

        padding-bottom: 5px;
        padding-right: 450px;
        padding-left: 450px;

    }
    .grid-item{

    }

    table,th,td {

        border:1px dotted black;
        border-collapse: collapse;
    }
    th, td {
        padding: 5px;
        text-align: left;
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
=
	</style>
</head>
<body>
	<!-- <header>
        <?php 
		// include "navigation.php"; 
		?>

		
    </header> -->
    <?php
    include 'connection.php';

        $total_no_invoices = mysqli_fetch_row(mysqli_query($connect, "SELECT COUNT(invoiceID) FROM invoice WHERE invoiceStatus = 'Approved' AND payStatus = 'Pending'"));
        $total_no_invoices_expired = mysqli_fetch_row(mysqli_query($connect, "SELECT COUNT(invoiceID) FROM invoice WHERE invoiceStatus = 'Expired' AND payStatus = 'Pending'"));
        $total_no_invoices_paid = mysqli_fetch_row(mysqli_query($connect, "SELECT COUNT(invoiceID) FROM invoice WHERE invoiceStatus = 'Approved' AND payStatus = 'Paid'"));
        $total_no_invoices_pending = mysqli_fetch_row(mysqli_query($connect, "SELECT COUNT(invoiceID) FROM invoice WHERE invoiceStatus = 'Pending' AND payStatus = 'Pending'"));
        $invoices_paid_total = mysqli_fetch_row(mysqli_query($connect, "SELECT SUM(totalPrice) FROM invoice WHERE payStatus = 'Paid'"));
        $invoices_pending_total = mysqli_fetch_row(mysqli_query($connect, "SELECT SUM(totalPrice) FROM invoice WHERE payStatus = 'Pending'"));


    ?>	  
        
            
    <div align="center">
    <title>Payment Report</title>
        <br><br>
        <table style="width:60%" >
        <tr>
            <th>Total Number Of Invoices :</th>
            <td><?php echo $total_no_invoices[0];?></td>
        </tr>
        <tr>
            <th>Total Number Of Invoices Past Due :</th>
            <td><?php echo $total_no_invoices_expired[0];?></td>
        </tr>
        <tr>
            <th>Invoices Paid :</th>
            <td><?php echo $total_no_invoices_paid[0];?></td>
        </tr>
        <tr>
            <th>Invoice Paid In Total (RM) :</th>
            <td><?php echo $invoices_paid_total[0];?></td>
        </tr>
        <tr>
            <th>Invoices Pending In Total (RM) :</th>
            <td><?php echo $invoices_pending_total[0];?></td>
        </tr>

        </table>
        
        
        <button type="button"><a class= "a" href="company_viewInvoice.php"> Go Back </a></button>
    </div>
    <?php ?>

</body>


