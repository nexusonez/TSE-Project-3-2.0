<!DOCTYPE html>
<html>

    <style>
        .column{
            float: right;
            width: 10%;
        }
        
        .column1{
            float: right;
            width: 30%;
        }
        .column3{
            float:left;
            width:30;
        }

        table, th, td {
            border:1px solid black;
        }

        tr:nth-child(odd) {
            background-color: #D6EEEE;
        }
       
        
    </style>


    <body>

        <h1>Please Enter Invoice Details: </h1>

        
    <form >
      
        <label for = "Company ID"> Company ID : </label>
        <input type = "text" id = "Invoice ID" name = "Invoice ID"> 

        <label for = "Company Name"> Company Name : </label>
        <input type = "text" id = "Company Name" name = "Company Name"> 

        <label for = "Invoice ID"> Invoice ID : </label>
        <input type = "text" id = "Invoice ID" name = "Invoice ID"> 

        <label for = "Invoice Due"> Invoice Due : </label>
        <input type = "date" id = "Invoice Due" name = "Invoice Due"> <br><br>

        <h3>Enter Product Detail</h3>
        <p>Create New Product Or Add Existing Product</p>
        

        <div id = "divform">
            <table style = "width : 100%" id = "row1">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                    </tr>
                </thead>

      
            </table>
        </div>
        <br><br>
        
        <div class = "column1">
        <button type="cancel", name= "cancel"> cancel </button>
        <button type="Submit Invoice", name= "Submit Invoice"> Submit Invoice </button>
        </div>
            
        </form>  
    </body>
</html>    
