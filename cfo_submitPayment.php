<!DOCTYPE html>
<html>
    <style>
        #textbox1, #textbox2 {
        display: block;
        float: left;    
        width: 100px;    
        height: 100px;    
        }
        .grid-container {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-template-rows: repeat(4, 1fr);
        grid-gap: 10px;
        padding-bottom: 5px;
        padding-right: 450px;
        padding-left: 450px;
        }

        .grid-item {
        text-align: left;
        }
        .a{
        text-decoration: none; 
        font-size: 16px;
        color: black;
    }

    </style>
    
    <body>
        <h2><center>Please Enter Payment Detail</center></h2>
        <br>
        <?php
        require_once "controllerUserDocData.php"; 
        include 'connection.php';

        if(isset($_POST["submit"])){
            // $result = mysqli_query($connect,"SELECT * FROM invoice");
            $paymentID = $_POST['paymentID'];
            $paymentDate = $_POST["paymentDate"];
            $paymentType = $_POST["paymentType"];
            $cfoID = $_SESSION['id'];
            $companyID = $_POST["companyID"];
            $invoiceID  = $_POST["invoiceID"];

            
            $query = "INSERT INTO `payment` (`paymentID`, `paymentDate`, `paymentStatus`, `paymentType`, `cfoID`, `companyID`, `invoiceID`)
            VALUES ('$paymentID', '$paymentDate', 'Paid', '$paymentType', '$cfoID', '$companyID', '$invoiceID')";


            mysqli_query($connect,$query);

            echo'<script type="text/javascript">
            alert("Payment has been submitted!");
            </script>';

        
            }
        ?>
	

        <form action="" method="POST"><center>
            <div class="grid-container">
            <div class="grid-item">                
                <label for = "Invoice ID"> Invoice ID : </label>
            </div>
            
            <div class="grid-item">
                    <select id="invoiceID" name="invoiceID">
                        <option value="" disabled selected>-- Select an Invoice --</option>
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
                <label for = "Company Name"> Company Name : </label>
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
                <label for = "paymentID"> Payment ID : </label>
            </div>
            <div class="grid-item">
                <?php
                    $payment_query= "SELECT MAX(paymentID) as lastPaymentID FROM payment";
                    $payment_result = mysqli_query($connect, $payment_query);
                    $payment_row = mysqli_fetch_assoc($payment_result);
                    $lastPaymentID = $payment_row['lastPaymentID'];
                    $lastPaymentID = $lastPaymentID + 1;
                    echo "<input type='text' id='paymentID' value='$lastPaymentID' readonly></input>";
                ?> 
            </div>
            <div class="grid-item">
                <label for = "paymentDate"> Payment Date : </label>
            </div>
            <div class="grid-item">
                <input type = "date" id = "paymentDate" name = "paymentDate" required>
            </div>
            
            <div class="grid-item">
                <label for = "paymentType"> Payment Type : </label>
                </div>
                <div class="grid-item">
                    <select required class="form-input" id = "paymentType" name = "paymentType" width = "16" required> 
                        <option value="Card">Card</option>
                        <option value="Cash">Cash</option>
                        <option value="Online">Online</option>
                    </select>
                </div>

            <br>
                </div>
                <div>
                    <button type="cancel" name= "cancel payment"><a class= "a" href="cfo_home.php"> Cancel </a></button>
                    <button type="submit" name="submit"> Submit Payment</button>
                </div>
        </center>    
        </form>
    </body>
</html>    

