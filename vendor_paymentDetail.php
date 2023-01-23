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
            width: 80%;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>

    <body>

        <h2><center>Payment Detail</center></h2>

    <form >
        <div id = "textbox"><center>
            
            <label for = "Invoice ID"> Invoice ID : </label>
            <input type = "text" id = "Invoice ID" name = "Invoice ID"> 

            <label for = "Payment ID"> Payment ID : </label>
            <input type = "text" id = "Payment ID" name = "Payment ID" > <br><br>

            <label for = "Company ID"> Company ID :</label>
            <input type = "text" id = "Company ID" name = "Company ID">

            <label for = "Payment Date"> Payment Date : </label>
            <input type = "date" id = "Payment Date" name = "Payment Date" > <br><br>

            <label for = "Company Name"> Company Name : </label>
            <input type = "text" id = "Company Name" name = "Company Name">

            <label for = "Payment Type"> Payment Type : </label>
            <input type = "text" id = "Payment Type" name = "Payment Type"><br><br>

            <div class= "row">
                <div class ="column"> 
                    <label for = "Total Paid"> Total Paid : </label>
                    <input type = "text" id = "Total Paid" name = "Total Paid"><br><br> 
                </div>
        </center></div>

        <center>
            <div class = "column1">
            <button type="button"><a class= "a" href="vendor_home.php">Go Back </a></button>
            </div>
        </center>    
        </form>  

    </body>
</html>    
