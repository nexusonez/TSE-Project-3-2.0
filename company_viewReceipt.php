<!DOCTYPE html>
<html>
<head>
    <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> -->
    <title>View Receipt Page</title>

    <style>
        .column{
            float: left;
            width: 50%;
        }
        
        .column1{
            float: right;
            width: 10%;
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
	
	<div><h1>View Receipt</h1></div>
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
                        <th>Action</th>
                        <th>Receipt ID</th>
                        <th>Invoice ID</th>
                        <th>Issued Date</th>
                        <th>Total Price(RM)</th>
						</tr>
					</thead>
			<?php
			include 'connection.php';
			
			if(isset($_POST['btnsearch']))
			{
				$valuesearch = $_POST['valuesearch'];
				$result = mysqli_query($connect, "SELECT * FROM `receipt` WHERE `receiptID` LIKE'%$valuesearch%'");
			}
			else
			{
				$result = mysqli_query($connect, "SELECT * FROM receipt");
			}
			
			while($row = mysqli_fetch_assoc($result))
			{
			?>		
					<tbody>
						<tr>
                        <td><a href="company_viewReceipt.php?view&receiptID=<?php echo $row["receiptID"];?>"><i class="fa fa-eye"></i></a></td>
							<td><?php echo $row["receiptID"];?></td>
							<td><?php echo $row["invoiceID"];?></td>
							<td><?php echo $row["issueDate"];?></td>
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

    <button type="approve", name= "approve" class = "column3"> Approve Payment </button>
    <button type="go back", name= "go back" class = "column1"> Go Back </button>
        


	
</body>
</html>
        
