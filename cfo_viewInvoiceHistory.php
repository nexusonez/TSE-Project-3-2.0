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
        
        <div>
            <form method="POST">
                <input type="text" name="valuesearch" placeholder="Enter ID" class ="" style="margin-left:800px; margin-top:20px;">
                <input type="submit" name="btnsearch" value="search" class ="btnsearch">
            </form>
		</div>

        <div id = "divform">
            <table style = "width : 100%" id = "row1">
                <thead>
                    <tr>
                        <th>Invoice ID</th>
                        <th>Due Date</th>
                        <th>Date Issued</th>
                        <th>Total Price(RM)</th>
                        <th>Payment Status</th>
                    </tr>
                </thead>

        <?php
        include 'connection.php';
        
        if(isset($_POST['btnsearch']))
        {
            $valuesearch = $_POST['valuesearch'];
            $result = mysqli_query($connect, "SELECT * FROM `invoice` WHERE `invoiceID`  LIKE'%$valuesearch%'");
        }
        else
        {
            $result = mysqli_query($connect, "SELECT * FROM invoice");
        }
        
        while($row = mysqli_fetch_assoc($result))
        {
        ?>	
             ?>		
					<tbody>
						<tr>
                        <td><a href="member_list_view.php?view&invoiceID=<?php echo $row["invoiceID"];?>"><i class="fa fa-eye"></i></a></td>
							<td><?php echo $row["Code"];?><?php echo $row["invoiceID"];?></td>
							<td style ="max-width:80px; overflow:hidden; text-overflow:ellipsis;"><?php echo $row["M_Name"];?></td>
							<td><?php echo $row["Gender"];?></td>
							<td style ="max-width:100px; overflow:hidden; text-overflow:ellipsis;"><?php echo $row["Email"];?></td>
							<td><?php echo $row["Hpnum"];?></td>
							<td><?php echo $row["Allergy"];?></td>
							<td style ="max-width:100px; overflow:hidden; text-overflow:ellipsis;"><?php echo $row["Password"];?></td>
							<td style ="max-width:250px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;"><?php echo $row["Address"];?></td>
						</tr>
					</tbody>
			<?php
			}
			?>
            </table>
        </div>
        <br><br>
        
        <button type="approve", name= "approve" class = "column3"> Approve Invoice </button>
        <button type="go back", name= "go back" class = "column1"> Go Back </button>
            
        </form>  
    </body>
</html>    
