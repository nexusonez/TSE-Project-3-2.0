<?php require_once "controllerUserDocData.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Vendor Submit Receipt</title>
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
        #textbox1, #textbox2 {
            display: block;
            float: left;    
            width: 100px;    
            height: 100px;    
        }

        .column{
            float: left;
            width: 84.3%;
        }
        
        .column1{
            float: right;
            width: 73%;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .grid-container {
		margin-top:20px;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-template-rows: repeat(2, 1fr);
        grid-gap: 15px;
        padding-bottom: 5px;
        padding-right: 450px;
        padding-left: 450px;
    }
	
	.grid-item {
        text-align: left;
		font-size:16px;
		margin-top:15px;
    }
		
    .a{
        text-decoration: none; 
        font-size: 20px;
		color:black;
		font-family: Agency FB;
		font-weight: bold;
	}
	
	select, input{
		font-size:13px;
		border: 1px solid black!important;
	}
	
    .form{
		width: 100%;
		z-index: 1;
		border:3px solid blue!important;
		padding:2%;
		height:50rem;
		margin-top:10px;
	}
	
	button {
		font-family: Agency FB;
        border: 2px solid black!important;
        border-width: 5px;
        outline-color: black;
        padding: 15px 32px;
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

    <body>
	
		<header>
		<?php 
			include "navigation.php"; 
        ?>
		</header>
		
        <h2><center style="margin-top:125px; font-family: Agency FB; font-size:35px; font-weight: bold;">Please Enter Receipt Details</center></h2>

        <?php 
            include 'connection.php';

            if(isset($_POST["submit"])){
                // $result = mysqli_query($connect,"SELECT * FROM invoice");
                $issueDate = $_POST["issueDate"];
                $invoiceID = $_POST["invoiceID"];
                $query = "INSERT INTO `receipt` (`invoiceID`) 
                VALUES ($invoiceID)";


                mysqli_query($connect,$query);

                echo'<script type="text/javascript">
                alert("Receipt has been generate!");
                </script>';
            
        }
        ?>		

    <form method="POST">
    <div>        
        <div class="grid-container">
            <div class="grid-item">
                <label for = "invoiceID"> Invoice ID: </label>
            </div>
            <div class="grid-item">
                    <select id="invoiceID" name="invoiceID" style="width:16.5rem;" required>
                        <option value="" disabled selected>-- Select a Invoice ID --</option>
                        <?php
                        //For Selection Wheel to Select Companies       

                            $query = "SELECT invoiceID FROM invoice";
                            $invoice_result = mysqli_query($connect, $query);
                            
                            while ($row = mysqli_fetch_assoc($invoice_result)) {
                                //$companyID = $row["companyID"];
                                echo "<option value='" . $row['invoiceID'] . "'>" . $row['invoiceID'] . "</option>";
                            }
                        ?>
                    </select>
                </div>

            <div class="grid-item">
                <label for = "paymentID"> Payment ID : </label>
            </div>   
            <div class="grid-item">
                    <select id="paymentID" name="paymentID">
                        <option value="" disabled selected>-- Select a Payment ID --</option>
                        <?php
                        //For Selection Wheel to Select Companies       

                            $query = "SELECT paymentID FROM payment";
                            $payment_result = mysqli_query($connect, $query);
                            
                            while ($row = mysqli_fetch_assoc($payment_result)) {
                                //$companyID = $row["companyID"];
                                echo "<option value='" . $row['paymentID'] . "'>" . $row['paymentID'] . "</option>";
                            }
                        ?>
                    </select>
                </div>

            <div class="grid-item">
                <label for = "companyID"> Company ID : </label>
            </div>
            <div class="grid-item">
                    <select id="companyID" name="companyID">
                        <option value="" disabled selected>-- Select a Company ID--</option>
                        <?php
                        //For Selection Wheel to Select Companies       

                            $query = "SELECT companyID, companyName FROM company";
                            $company_result = mysqli_query($connect, $query);
                            
                            while ($row = mysqli_fetch_assoc($company_result)) {
                                //$companyID = $row["companyID"];
                                echo "<option value='" . $row['companyID'] . "'>" . $row['companyID'] . "</option>";
                            }
                        ?>
                    </select>
                </div>

            <div class="grid-item">
                <label for = "companyName"> Company Name : </label>
            </div>
            <div class="grid-item">
                    <select id="companyID" name="companyID" style="width:16rem;" required>
                        <option value="" disabled selected>-- Select a Company --</option>
                        <?php
                        //For Selection Wheel to Select Companies       

                            $query = "SELECT companyID, companyName FROM company";
                            $company_result = mysqli_query($connect, $query);
                            
                            while ($row = mysqli_fetch_assoc($company_result)) {
                                //$companyID = $row["companyID"];
                                echo "<option value='" . $row['companyID'] . "'>" . $row['companyName'] . "</option>";
                            }
                        ?>
                    </select>
                </div>

            <div class="grid-item">
                <label for = "paymentDate"> Payment Date : </label>
            </div>
            <div class="grid-item">
            <input type = "date" id = "issueDate" style="text-transform:uppercase;">
            </div>
        </div>

        <center>
            <div class = "column1">
            <button type="cancel", name= "cancel"><a class= "a" href="vendor_home.php"> Cancel </a></button>
            <button type="submit", name= "submit"> Submit Receipt </button>
            </div>
        </center>    
        </form>  

    </body>
</html>    
