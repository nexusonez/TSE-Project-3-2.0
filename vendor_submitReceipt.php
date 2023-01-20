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
    </style>

    <body>

        <h2><center>Please Enter Receipt Detail</center></h2>

        <?php
            require_once "controllerUserDocData.php"; 
            include 'connection.php';

            if(isset($_POST["submit"])){
                // $result = mysqli_query($connect,"SELECT * FROM invoice");
                $invoiceID = $_POST["invoiceID"];
                $issueDate = $_POST["issueDate"];
                $receiptID = $_POST["quantity"];
                $query = "INSERT INTO `receipt` (`receiptID`, `issueDate`, `invoiceID`) 
                VALUES (Null, NUll , $invoiceID)";


                mysqli_query($connect,$query);

                echo'<script type="text/javascript">
                alert("Receipt has been generate!");
                </script>';
            
        }
        ?>		

    <form >
    <div>        
        <div class="grid-container">
            <div class="grid-item">
                <label for = "invoiceID"> Invoice ID: </label>
            </div>
            <div class="grid-item">
                    <select id="invoiceID" name="invoiceID">
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
                    <select id="companyID" name="companyID">
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
            <input type = "date" id = "paymentDate">
            </div>
        </div>

        <center>
            <div class = "column1">
            <button type="cancel", name= "cancel"><a class= "a" href="vendor_home.php"> Cancel </a></button>
            <button type="submit receipt", name= "submit receipt"> Submit Receipt </button>
            </div>
        </center>    
        </form>  

    </body>
</html>    
