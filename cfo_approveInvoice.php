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
       
        
    </style>


    <body>

        
    <form >
        
      <?php
            include 'connection.php';

            $result = mysqli_query($connect, "SELECT * FROM invoice");
        ?>  

            <h1>Invoice     </h1>

        

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
        
        <button type="approve", name= "approve" class = "column3"> Approve Invoice </button>
        <button type="go back", name= "go back" class = "column1"> Go Back </button>
            
        </form>  
    </body>
</html>    
