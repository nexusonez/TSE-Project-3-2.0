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
        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: repeat(2, 1fr);
        grid-gap: 10px;
        padding-bottom: 5px;
        padding-right: 450px;
        padding-left: 450px;
        }
        .enterInvoice{
            padding-left: 450px;
            font-size: 55px;
        }
        .enterProduct{
            padding-left: 500px;
            font-size: 30px;
            text-align:left;
        }
        
        .grid-item {
        text-align: left;
        font-weight: bold;
        font-size: 30px;
        }
        .a{
        text-decoration: none; 
        font-size: 16px;
        color: black;
    }
        .form{
            text-align:center;
        }
        .th{
            font-size: 19px;
        }
        .button{
            text-align: center;
        }


    </style>
    
    <body>
        <h2 class="enterInvoice">Please Enter Invoice Details:</h2>
        <?php
            require_once "controllerUserDocData.php"; 
            include 'connection.php';

            if(isset($_POST["submit"])){
                // $result = mysqli_query($connect,"SELECT * FROM invoice");
                $vendorID = $_SESSION['id'];
                $productName = $_POST["productName"];
                $quantity = $_POST["quantity"];
                $price = $_POST["price"];
                $query = "INSERT INTO `product` (`productID`, `productName`, `quantity`, `price`, `totalPrice`, `invoiceID`) 
                VALUES (NULL, '$productName', $quantity, $price, NULL, NULL)";


                $companyID = $_POST["companyID"];
                $invoiceDue = $_POST["invoiceDue"];
                $sql = "INSERT INTO `invoice` (`invoiceID`, 
                `dueDate`, 
                `issueDate`, 
                `totalPrice`,   
                `invoiceStatus`, 
                `vendorID`, 
                `paymentID`, 
                `companyID`, 
                `companyName`) 
                VALUES 
                (NULL, '$invoiceDue', NULL, NULL, NULL, '$vendorID',NULL,'$companyID',NULL)";

                mysqli_query($connect,$query);
                mysqli_query($connect,$sql);

                echo'<script type="text/javascript">
                alert("Product has been submitted!");
                </script>';
            
        }
        ?>		
        <form class = "" action="" method="POST"><center>
            <div>
                <div class="grid-container">
                <div class="grid-item">
                    <label for = "companyName"> Company Name : </label>
                </div>
                <div class="grid-item">
                    <label for = "invoiceID"> Invoice ID : </label>
                </div>
                <div class="grid-item">
                    <label for = "invoiceDue"> Invoice Due : </label>
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
                    <?php

                        $invoice_query= "SELECT MAX(invoiceID) as lastInvoiceID FROM invoice";
                        $invoice_result = mysqli_query($connect, $invoice_query);
                        $invoice_row = mysqli_fetch_assoc($invoice_result);
                        $lastInvoiceID = $invoice_row['lastInvoiceID'];
                        $lastInvoiceID = $lastInvoiceID + 1;
                        echo "<label>$lastInvoiceID</label>";
                    ?>
                </div>
                <div class="grid-item">
                    <input type = "date" name = "invoiceDue" required> 
                </div>
            </div>
            <br>
            <br>
            <h2 class="enterProduct">Enter Product Details: </h2>
            <br>
            
            <table id= "tableId" class = "table" border="1" align = "center">
                
                    <tr align="center">
                        <th class ="th">Product ID</th>
                        <th class ="th">Product Name</th>
                        <th class ="th">Price</th>
                        <th class ="th">Quantity</th>
                    </tr>
                    <tr align="center"> 
                        <td id="productId">1</td>
                        <td><input type="text" name="productName" required></td>
                        <td><input type="number" step="0.01" name="price" required></td>
                        <td><input type="number" name="quantity" required></td>
                    </tr>
                <tbody id="tbody"></tbody >
            </table>
            <br>

            <button type="button" onclick="addRow();">Add Product</button>
            <button ><a class= "a" href="vendor_home.php"> Cancel </a></button>
            <button type="submit" name= "submit"> Submit Invoice </button>

        </center>    
        </form>



    <script>
        
        var items = 1;
        function addRow(){
            items++;
            var html="<tr align='center'>";
                html+="<td id='productId[]'>" + items + "</td>";
                html+="<td><input type='text' id='productName[] required'></td>";
                html+="<td><input type='number' step='0.01' id='price[] required'></td>";
                html+="<td><input type='number' id='quantity[] required'></td>";
            html+="</tr>";
            document.getElementById("tbody").insertRow().innerHTML = html;
        }
    </script>

    </body>
    
    
</html>    

