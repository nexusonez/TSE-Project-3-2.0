<!DOCTYPE html>
<html>
    <head>
    <!-- <script src="js\productTable.js"></script> -->
    </head>
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
        grid-template-rows: repeat(2, 1fr);
        grid-gap: 10px;
        padding-bottom: 5px;
        padding-right: 625px;
        padding-left: 625px;
        }
        .enterproduct{
            padding-left: 500px;
        }
        .grid-item {
        text-align: left;
        }
        .a{
        text-decoration: none; 
        font-size: 16px;
        color: black;
    }
        .form{
            text-align:center;
        }

    </style>
    
    <body>
        <h2><center>Please Enter Invoice Details: </center></h2>
        <?php
        include 'connection.php';
        $result = mysqli_query($connect,"Select * FROM invoice");
        ?>		
        <form action="" method="POST"><center>
            <div class="grid-container">
            <div class="grid-item">                
                <label for = "Company ID"> Company ID : </label>
            </div>
            <div class="grid-item">
                <label for = "Company Name"> Company Name : </label>
            </div>
            <div class="grid-item">
                <label for = "Invoice ID"> Invoice ID : </label>
            </div>
            <div class="grid-item">
                <label for = "Invoice Due"> Invoice Due : </label>
            </div>
            <div class="grid-item">
                <input type = "text" id = "Company ID" name = "Company ID" maxlength = "10" required> 
            </div>
            <div class="grid-item">
                <input type = "text" id = "Company Name" name = "Company Name" maxlength = "255" required> 
            </div>
            <div class="grid-item">
                <input type = "text" id = "Invoice ID" name = "Invoice ID" maxlength = "10" required> 
            </div>
            <div class="grid-item">
                <input type = "date" id = "Invoice Due" name = "Invoice Due" required> 
            </div>


        </center>    
        </form>
        <br>
        <br>
        <h2 class="enterproduct">Enter Product Details: </h2>
        <br>
        

        <form class = "form" method ="POST" action="index.php">

            <table id= "tableId" class = "table" border="1" align = "center">
                
                    <tr align="center">
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                    </tr>
                    <tr align="center"> 
                        <td id="productId">1</td>
                        <td><input type="text" id="productName"></td>
                        <td><input type="number" step="0.01" id="price"></td>
                        <td><input type="number" id="quantity"></td>
                        <td id="totalPrice"></td>
                    </tr>
                <tbody id="tbody"></tbody >
            </table>
            <br>

            <button type="button" onclick="addRow();">Add Product</button>

            
    </form> 
    <script>
        var items = 1;
        function addRow(){
            items++;
            var html="<tr align='center'>";
                html+="<td id='productId[]'>" + items + "</td>";
                html+="<td><input type='text' id='productName[]'></td>";
                html+="<td><input type='number' step='0.01' id='price[]'></td>";
                html+="<td><input type='number' id='quantity[]'></td>";
                html+="<td id='totalPrice[]'></td>";
            html+="</tr>";
            document.getElementById("tbody").insertRow().innerHTML = html;
        }
    </script>
        <button type="cancel", name= "cancel payment"><a class= "a" href="vendor_home.php"> Cancel </a></button>
        <button type="submit", name="save payment"> Submit Invoice </button>
    </body>
    
    
</html>    

