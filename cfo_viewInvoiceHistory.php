<!DOCTYPE html>
<html>

    <style>
        .column{
            float: right;
            width: 10%;
        }
        
        .column1{
            float: right;
            width: 10%;
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

        #searchbar{
        margin-left: 15%;
        padding:15px;
        border-radius: 10px;
        }
    
        input[type=text] {
            width: 30%;
            -webkit-transition: width 0.15s ease-in-out;
            transition: width 0.15s ease-in-out;
        }

        /* When the input field gets focus,
            change its width to 100% */
        input[type=text]:focus {
            width: 30%;
        }

        /* #table{
            font-size:  1.5em;
            margin-left: 90px;
        } */

        .list{
            display: list-item;    
        } 

        
    </style>


    <body>

        <h1>Invoice History</h1>

        
    <form >
        
        <p>Double Click to Preview Invoice</p>
        <p>Select Invoice Then Click Approve To Approve</p>
       
        <input id="searchbar" onkeyup="search_list()" type="text" name="search" placeholder="Search..." class = "column">

        <div id = "list">
            <table style = "width : 100%" id = "row1">
                <tr class = "item">
                    <th>No.</th>
                    <th>Invoice ID</th>
                    <th>Due Date</th>
                    <th>Date Issued</th>
                    <th>Total Price(RM)</th>
                    <th>Payment Status</th>
                </tr>
                <tr class = "item">
                    <th>1</th>
                    <th>001</th>
                    <th>20/12/2022</th>
                    <th>14/1/2023</th>
                    <th>2540</th>
                    <th>Not Paid</th>    
                </tr>
                <tr class = "item"> 
                    <th>2</th>
                    <th>001</th>
                    <th>20/12/2022</th>
                    <th>14/1/2023</th>
                    <th>2540</th>
                    <th>Not Paid</th>
                </tr>
                </tr>

            </table>
        </div>
        <br><br>
        
        <button type="approve", name= "approve" class = "column3"> Approve Invoice </button>
        <button type="go back", name= "go back" class = "column1"> Go Back </button>
            
        </form>  
    </body>
</html>    
