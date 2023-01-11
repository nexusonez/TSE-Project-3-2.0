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

        <h1>Invoice Invoice History</h1>

        
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
					<tbody>
						<tr>
                        <td><a href="member_list_view.php?view&invoiceID=<?php echo $row["invoiceID"];?>"><i class="fa fa-eye"></i></a></td>
							<td><?php echo $row["invoiceID"];?></td>
							<td><?php echo $row["dueDate"];?></td>
							<td><?php echo $row["issueDate"];?></td>
							<td><?php echo $row["totalPrice"];?></td>
							<td><?php echo $row["invoiceStatus"];?></td>
						</tr>
					</tbody>
			<?php
			}
			?>
            </table>
        </div>
        <br><br>
        
        <div class = "column1">
        <button type="View Payment Report", name= "View Payment Report" > View Payment Report</button>
        <button type="go back", name= "go back" > Go Back </button>
        </div>
            
        </form>  
    </body>
</html>    
