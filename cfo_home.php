<?php require_once "controllerUserDocData.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Doctor home</title>
 <link rel="stylesheet" href="css/style.css"> <!-- css files-->
	
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> <!-- font awesome-->
	<style>
	.icon{
	margin-left: 50px;
	}
	
	.iconcare{
	margin-top:100px;
	padding-left:55%;
	display:block;
	}
	
	h2{
	font-weight:bold;
	font-family:Agency FB;
	font-size:45px;
	text-transform:uppercase;
	}
    .button {
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
      font-weight: bold;

    }
    .button1 {background-color: #ffde59;} /* yellow */
    .button2 {background-color: #38b6ff;} /* Blue */
	
	</style>
</head>
<body>
    <?php 
            include "navigation.php"; 
            ?>
    <h2><center>Welcome Company Financial Officer,</center></h2>
    <h2><center>Please Choose A Task</center></h2>

    <html

        
    <div class = "container"><center>
        <div class = "row">
            <div class = "col">
                <button class="button button1" href="cfo_submitPayment.php">Submit Payment</button>
                <label>Or</label>
                <button class="button button2 " href="cfo_viewInvoice.php">View Invoice</button>
            </div>
        </div>
    </center></div>
    </body>
</html>
