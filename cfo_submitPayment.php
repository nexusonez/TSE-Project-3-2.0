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
            width: 60%;
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
    </style>

    <body>

        <h2><center>Please Enter Payment Detail</center></h2>


        
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
        </center></div>

        <center>
        <div class = "column1">
            <button type="cancel", name= "cancel payment"> Cancel </button>
            <button type="submit", name="save payment"> Submit Payment </button>
            </div>
        </center>    
        </form>  

    </body>
</html>    


        <!-- <form ><center>
            <div id = "textbox1">
                <label for = "Invoice ID"> Invoice ID : </label>
                <input type = "text" id = "Invoice ID" name = "Invoice ID" maxlength = "16"> <br><br>

                <label for = "Company ID"> Company ID : </label>
                <input type = "text" id = "Company ID" name = "Company ID" maxlength = "16"> <br><br>

                <label for = "Company Name"> Company Name : </label>
                <input type = "text" id = "Company Name" name = "Company Name" maxlength = "16"> <br><br>
            </div>

            <div id = "textbox2">
                <label for = "Payment ID"> Payment ID : </label>
                <input type = "text" id = "Payment ID" name = "Payment ID" maxlength = "16"> <br><br>

                <label for = "Payment Date"> Payment Date : </label>
                <input type = "data" id = "Payment Date" name = "Payment Date" > <br><br>

                <label for = "Payment Type"> Payment Type : </label>
                <input type = "text" id = "Payment Type" name = "Payment Type" maxlength = "16"> <br><br>
            </div>

            <div>
                <button type="cancel", name= "cancel payment"> Cancel </button>
                <button type="submit", name="save payment"> Submit Payment </button>
            </div>
        </center>    
        </form> -->

        <!-- <div class = "row"><center>
            <div class = "column">
                <label for = "Invoice ID"> Invoice ID : </label>
                <input type = "text" id = "Invoice ID" name = "Invoice ID"> 

                <label for = "Company ID"> Company ID : </label>
                <input type = "text" id = "Company ID" name = "Company ID" > <br><br>

                <label for = "Company Name"> Company Name : </label>
                <input type = "text" id = "Company Name" name = "Company Name"> <br><br>
            </div>

            <div class = "column">
                <label for = "Payment ID"> Payment ID : </label>
                <input type = "text" id = "Payment ID" name = "Payment ID" > <br><br>

                <label for = "Payment Date"> Payment Date : </label>
                <input type = "date" id = "Payment Date" name = "Payment Date" > <br><br>

                <label for = "Payment Type"> Payment Type : </label>
                <input type = "text" id = "Payment Type" name = "Payment Type"><br><br>
            </div>  

    </center></div> -->