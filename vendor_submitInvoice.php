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
        padding-right: 625px;
        padding-left: 625px;
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
        <?php
        include 'connection.php';
        $result = mysqli_query($connect,"Select * FROM invoice");
        ?>		
        <form action="" method="POST"><center>
            <div class="grid-container">
            <div class="grid-item">                
                <label for = "Invoice ID"> Invoice ID : </label>
            </div>
            <div class="grid-item">
                <input type = "text" id = "Invoice ID" name = "Invoice ID" maxlength = "10" required> 
            </div>
            <div class="grid-item">
                <label for = "Company ID"> Company ID : </label>
            </div>
            <div class="grid-item">

                <input type = "text" id = "Company ID" name = "Company ID" maxlength = "10" required> 
            </div>
            <div class="grid-item">
                <label for = "Company Name"> Company Name : </label>
            </div>
            <div class="grid-item">
                <input type = "text" id = "Company Name" name = "Company Name" maxlength = "255" required> 
            </div>
            <div class="grid-item">
                <label for = "Payment ID"> Payment ID : </label>
            </div>
            <div class="grid-item">
                <input type = "text" id = "Payment ID" name = "Payment ID" maxlength = "100" required> 
            </div>
            <div class="grid-item">
                <label for = "Payment Date"> Payment Date : </label>
            </div>
            <div class="grid-item">
                <input type = "date" id = "Payment Date" name = "Payment Date" required>
            </div>
            <div class="grid-item">
                <label for = "Payment Type"> Payment Type : </label>
                </div>
                <div class="grid-item">
                    <select required class="form-input" id = "Payment Type" name = "Payment Type" width = "16" required> 
                        <option value="Card">Card</option>
                        <option value="Cash">Cash</option>
                        <option value="Online">Online</option>
                    </select>
                </div>

            <br>
                </div>
                <div>
                    <button type="cancel", name= "cancel payment"><a class= "a" href="cfo_home.php"> Cancel </a></button>
                    <button type="submit", name="save payment"> Submit Payment </button>
                </div>
        </center>    
        </form>
    </body>
</html>    



<!-- 
<form ><center>
            <label for = "Invoice ID"> Invoice ID : </label>
            <input type = "text" id = "Invoice ID" name = "Invoice ID" maxlength = "16"> <br><br>
            <label for = "Company ID"> Company ID : </label>
            <input type = "text" id = "Company ID" name = "Company ID" maxlength = "16"> <br><br>
            <label for = "Company Name"> Company Name : </label>
            <input type = "text" id = "Company Name" name = "Company Name" maxlength = "16"> <br><br>
            <label for = "Payment ID"> Payment ID : </label>
            <input type = "text" id = "Payment ID" name = "Payment ID" maxlength = "16"> <br><br>
            <label for = "Payment Date"> Payment Date : </label>
            <input type = "data" id = "Payment Date" name = "Payment Date" > <br><br>
            <label for = "Payment Type"> Payment Type : </label>
            <input type = "text" id = "Payment Type" name = "Payment Type" maxlength = "16"> <br><br>
            <div>
            <button type="cancel", name= "cancel payment"> Cancel </button>
            <button type="submit", name="save payment"> Submit Payment </button>
            </div>
        </center>    
        </form>   -->