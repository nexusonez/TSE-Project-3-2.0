<?php require_once "controllerUserDocData.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Vendor home</title>
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
        margin-top:250px;
        font-weight:bold;
        font-family:Agency FB;
        font-size:45px;
        text-transform:uppercase;
	}

    .label{
        font-weight:bold;
        font-size:20px;
        text-transform:uppercase;
    }

    .button {
        border-style: solid;
        border-width: 5px;
        color: black;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 15px 15px;
        cursor: pointer;
        font-weight: bold;
    }

    .button1 {
        background-color: #ffde59;
    } /* yellow */

    .button2 {
        background-color: #38b6ff;
    } /* Blue */

	.a{
        font-size: 16px;
        color: black;
        font-weight: bold;
    }
    
	</style>
</head>

<body>
    <header>
    <?php 
            include "navigation.php"; 
            ?>
            </header>


    <h2><center>As a Vendor , <br> do you want to: </center></h2>
    <br>
    <html>

    <div class = "container"><center>
        <div class = "row">
            <div class = "col">
                <button class="button button1" ><a class= "a" href="vendor_submitReceipt.php">Submit Receipt</a></button>
                <label class="label">Or</label>
                <button class="button button2 " ><a class= "a" href="vendor_submitInvoice.php">Submit Invoice</a></button>
            </div>
        </div>
    </center></div>
    </body>
</html>
