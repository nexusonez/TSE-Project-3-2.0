<!DOCTYPE html>
<html>
<head>
    <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> -->
    <title> View Payment History Page</title>

    <style>
        .column{
            float: left;
            width: 50%;
        }
        
        .column1{
            float: right;
            width: 20%;
        }
        .column3{
            float:left;
            width:30;
        }
        	
        .fa-edit{
        color: #63c76a;
        margin:auto;
        font-size:20px;
        }
        
        .fa-trash{
        color: black;
        font-size:20px;
        margin-left:15px;
        }
        
        .fa-eye{
        color:#0000FF;
        font-size:20px;
        margin-right:15px;
        }

        table, th, td {
            border:1px solid black;
        }

        tr:nth-child(odd) {
            background-color: #D6EEEE;
        }

  
        
    </style>


</head>

    
<body>
	
	<div><h1>View Payment History</h1></div>
    <!-- <p>Double Click to Preview Invoice</p> -->

		
		
		<div>
		<form method="POST">
		<input type="text" name="valuesearch" placeholder="Enter ID" class ="" style="margin-left:800px; margin-top:20px;">
		<input type="submit" name="btnsearch" value="search" class ="btnsearch">
		</form>
		</div>
        <br><br>
		
        
		<div>
			<div>
            <center>
				<table style = "width : 100%">
					<thead>
						<tr>
                        <th>Payment ID</th>
                        <th>Payment Type</th>
                        <th>Payment Date</th>
                        <th>Payment Status</th>
                        <th>Invoice ID</th>
                        <th>Total Paid(RM)</th>
						</tr>
					</thead>
			<?php
			include 'connection.php';
			
			if(isset($_POST['btnsearch']))
			{
				$valuesearch = $_POST['valuesearch'];
				$result = mysqli_query($connect, "SELECT * FROM `payment` WHERE `paymentID` LIKE'%$valuesearch%'");
			}
			else
			{
				$result = mysqli_query($connect, "SELECT * FROM payment");
			}
			
			while($row = mysqli_fetch_assoc($result))
			{
			?>		
					<tbody>
						<tr>
                        <td><a href="member_list_view.php?view&paymentID=<?php echo $row["paymentID"];?>"><i class="fa fa-eye"></i></a></td>
							<td><?php echo $row["paymentID"];?></td>
							<td><?php echo $row["paymentType"];?></td>
							<td><?php echo $row["paymentDate"];?></td>
							<td><?php echo $row["paymentStatus"];?></td>
							<td><?php echo $row["invoiceStatus"];?></td>
                            <td><?php echo $row["totalPrice"];?></td>
						</tr>
						</tr>
					</tbody>
			<?php
			}
			?>
					
				</table>
                </center>
			</div>
		</div>
	</div>
    <br><br>

    <div class = "column1">
        <button type="View Payment Report", name= "View Payment Report" > View Payment Report</button>
        <button type="go back", name= "go back" > Go Back </button>
        </div>
        


	
</body>
</html>
        
