<?php require_once "controllerUserDocData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Doctor List</title>
 <link rel="stylesheet" href="css/style.css"> <!-- css files-->
	
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> <!-- font awesome-->
	<style>
	h1{
	margin-top:90px;
	font-size:35px;
	font-family:Agency FB;
	font-weight:bold;
	color:blue;
	}
	
	.form{
	width: 100%;
	z-index: 1;
	border:3px solid blue!important;
	padding:2%;
	height:auto;
	margin-top:10px;
	flex-direction:column;
	}
	
	.title{
	width: 120%;
	margin-top:-31px;
	font-size:25px;
	font-weight:bold;
	font-family: Agency FB;
	color:white;
	background-color:blue;
	position:relative;
	margin-left:-32px;
	}
	
	.divform{
	width:103%;
	height:auto;
	background:  linear-gradient(left, #5DADE2 , #00c6ff);
	padding:20px 0 0 0;
	box-shadow: 0 10px 20px 0 rgba(0,0,0,.03);
	border-radius:10px;
	margin-left:-20px;
	}
	
	table{
	margin-top:20px!important;
	border-collapse: collapse;
	background-color: #fff;
	box-shadow: 0 10px 20px 0 rgba(0,0,0,.03);
	border-radius:10px;
	margin:auto;
	table-layout:fixed!important;
	width:auto;

	}
	
	th,td{
	border:1px solid #f2f2f2!important;
	padding: 8px 30px;
	text-align:center;
	color:grey;
	}
	
	th{
	font-size:20px;
	background:#5883FD;
	font-weight:500;
	line-height:20px;
	color:black;
	
	}
	
	td{
	font-size:10px;
	color:grey;
	background:#fff;
	border-radius:2px;
	border:1px solid #f2f2f2!important;
	line-height:17px;
	padding: 0 14px!important;
	text-transform:none;
	
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
	
	.btn1{
	background-color:#00ff00;
	color:white!important;
	margin:0 auto;
	display:inline-block;
	font-size:20px;
    height:35px;
	position:absolute;
	margin-top:15px;
	margin-left:30px;
	width:10rem;
	justify-content:center;
	cursor:pointer;
	}
	
	.btnsearch
	{
	background-color:#00FF00;
	color:black;
	font-size:13px;
	cursor:pointer;
	height:20px;
	}
	
	::placeholder{
	height:17px;
	width:140px;
	border: 1px solid lightgrey;
	}
	
	td{
	font-size:11px;
	color:black;
	}
	</style>
</head>

<script type="text/javascript">

function confirmation()
{
	answer=confirm("Do you want to delete this Doctor?");
	return answer;
}

<?php
if (isset($_GET["del"]))
{
	
	$id = $_GET["DoctorID"];
	mysqli_query($connect,"DELETE FROM doctors WHERE DoctorID = '$id'");
	
	header( "refresh:0.5; url=doctor_list.php" );
}

?>

</script>

<body>
	<header>
        <?php 
		include "navigation.php"; 
		?>
		
    </header>
	
	<div><h1>Doctor List</h1></div>
	
	<div class ="form" method="POST">
		<div class ="title">
		Doctor Listing
		</div>
		
		<div>
		<button class="btn1"><a href ="doctor_list_add.php">Add New</a></button>
		</div>
		
		<div>
		<form method="POST">
		<input type="text" name="valuesearch" placeholder="Enter Name" class ="" style="margin-left:800px; margin-top:20px;">
		<input type="submit" name="btnsearch" value="search" class ="btnsearch">
		</form>
		</div>
		
		<div class ="divform">
			<div>
				<table>
					<thead>
						<tr>
							<th>Action</th>
							<th>DoctorID</th>
							<th>D_Name</th>
							<th>Gender</th>
							<th>Status</th>
							<th>Email</th>
							<th>Hpnum</th>
							<th>Password</th>
							<th>Address</th>
							<th>dp</th>
						</tr>
					</thead>
			<?php
			include 'connection.php';
			
			if(isset($_POST['btnsearch']))
			{
				$valuesearch = $_POST['valuesearch'];
				$result = mysqli_query($connect, "SELECT * FROM `doctors` WHERE `D_Name` LIKE'%$valuesearch%'");
			}
			else
			{
				$result = mysqli_query($connect, "SELECT * FROM doctors");
			}
			
			while($row = mysqli_fetch_assoc($result))
			{
			?>		
					<tbody>
						<tr>
							<td><a href="doctor_list_view.php?view&DoctorID=<?php echo $row["DoctorID"];?>"><i class="fa fa-eye"></i></a><a href ="Doctor_list_edit.php?edit&DoctorID=<?php echo $row["DoctorID"];?>"><i class="fa fa-edit"></i></a><a href="Doctor_list.php?del&DoctorID=<?php echo $row["DoctorID"];?>" onclick="return confirmation()";><i class ="fa fa-trash"></i></a></td>
							<td style ="max-width:100px; overflow:hidden; white-space:nowrap; text-overflow:ellipsis;"><?php echo $row["Code"];?><?php echo $row["DoctorID"];?></td>
							<td style ="max-width:100px; overflow:hidden; text-overflow:ellipsis;"><?php echo $row["D_Name"];?></td>
							<td style ="max-width:20px; overflow:hidden; white-space:nowrap; text-overflow:ellipsis;"><?php echo $row["Gender"];?></td>
							<td><?php echo $row["Status"];?></td>
							<td style ="max-width:100px; overflow:hidden; text-overflow:ellipsis;"><?php echo $row["Email"];?></td>
							<td style ="max-width:80px; overflow:hidden; white-space:nowrap; text-overflow:ellipsis;"><?php echo $row["Hpnum"];?></td>
							<td style ="max-width:80px; overflow:hidden; white-space:nowrap; text-overflow:ellipsis;"><?php echo $row["Password"];?></td>
							<td style ="max-width:100px; overflow:hidden; white-space:nowrap; text-overflow:ellipsis;"><?php echo $row["Address"];?></td>
							<td style ="max-width:100px; overflow:hidden; white-space:nowrap; text-overflow:ellipsis;"><?php echo $row["dp"];?></td>
						</tr>
					</tbody>
			<?php
			}
			?>
					
				</table>
			</div>
		</div>
	</div>
	
</body>
</html>