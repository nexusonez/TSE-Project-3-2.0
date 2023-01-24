<!DOCTYPE html>
<html>

    <style>
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
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-template-rows: repeat(2, 1fr);
        grid-gap: 10px;
        padding-bottom: 5px;
        padding-right: 450px;
        padding-left: 450px;
    }

    .form{
	width: 100%;
	z-index: 1;
	border:3px solid blue!important;
	padding:2%;
	height:50rem;
	margin-top:10px;
	}
    </style>

    <body>
    <script src="receiptSelection.js"></script>
        <h2><center>Please Select An Invoice To Receipt Detail</center></h2>

        <?php
            require_once "controllerUserDocData.php"; 
            include 'connection.php';

            if(isset($_POST["upload"])){
                // $result = mysqli_query($connect,"SELECT * FROM invoice");
                if($invoiceID = $_POST["invoiceID"]){
                    $query = "INSERT INTO `receipt` (`invoiceID`)
                    VALUES ($invoiceID)";
    
                    mysqli_query($connect,$query);
    
                    echo'<script type="text/javascript">
                    alert("Receipt has been generated!");
                    </script>';
                }else{
                    echo'<script type="text/javascript">
                    alert("Please select an invoiceID again to confirm submit.");
                    </script>';
                }

            }
             // Retrieve the data for the selected invoice
             if(isset($_POST["submit"])){
                if($invoiceID = $_POST["invoiceID"]){
                    $selection_query = "SELECT * FROM invoice WHERE invoiceID = '$invoiceID'";
                    $selected_invoice = mysqli_query($connect, $selection_query);

                    $data = array();
                    while($row = mysqli_fetch_assoc($selected_invoice)){
                        $data[] = $row;
                    }

                }else{
                    echo'<script type="text/javascript">
                    alert("Please select an invoiceID!");
                    </script>';
                }


            }
        ?>	

    <form method="POST" action="vendor_submitReceipt.php">
    <div>        
        <div class="grid-container">
            <div class="grid-item">
                <label for = "invoiceID"> Invoice ID: </label>
            </div>
            <div class="grid-item">

                <select id="selectionInvoiceID" name="invoiceID" onchange="this.form.submit()">
                    <option value="" disabled>-- Select a Invoice ID --</option>
                    <?php
                    //For Selection Wheel to Select Companies       

                        $query = "SELECT invoiceID FROM invoice WHERE invoiceStatus = 'Approved' AND payStatus ='Paid'";
                        $invoice_result = mysqli_query($connect, $query);
                        
                        while ($row = mysqli_fetch_assoc($invoice_result)) {
                            //$companyID = $row["companyID"];
                            echo "<option value='" . $row['invoiceID'] . "'>" . $row['invoiceID'] . "</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="grid-item">
                <label for = "paymentIDLabel"> Payment ID : </label>
            </div>   
            <div class="grid-item">
                <input type="text" id="paymentID" name="paymentID" disabled value="<?php if(isset($data) && !empty($data) && $data[0] != NULL){echo $data[0]['paymentID'];}else{echo " ";} ?>">           
            </div>
            <div class="grid-item">
                <label for = "companyIDLabel"> Company ID : </label>
            </div>
            <div class="grid-item">
                <input type="text" id="companyID" name="companyID" disabled value="<?php if(isset($data) && !empty($data) && $data[0] != NULL){echo $data[0]['companyID'];}else{echo " ";} ?>">            
            </div>
            <div class="grid-item">
                <label for = "companyNameLabel"> Company Name : </label>
            </div>
            <div class="grid-item">
                <input type="text" id="companyName" name="companyName" disabled value="<?php if(isset($data) && !empty($data) && $data[0] != NULL){echo $data[0]['companyName'];}else{echo " ";} ?>">           
            </div>
        </div>

        <center>
            <div class = "column1">
            <button type="submit", name= "submit"> Check Invoice</button>
            <button type="cancel", name= "cancel"><a class= "a" href="vendor_home.php"> Cancel </a></button>
            <button type="upload", name= "upload"> Submit Receipt </button>
            </div>
        </center>    
        </form>  

    </body>
    
</html>    
