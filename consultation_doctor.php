<?php require_once "controllerUserDocData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Consultation Doctor</title>
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
	margin-left:15px;;
	font-size:20px;
	}
	
	
	.fa-eye{
	color:#0000FF;
	font-size:20px;
	}
	
	.btn1{
	background-color:#0000ff;
	color:white!important;
	display:inline-block;
	font-size:18px;
    height:30px;
	margin-left:-10px;
	width:8rem;
	cursor:pointer;
	margin-top:5px;
	}
	
	.btn2{
	background-color:#00ff00;
	color:white!important;
	display:inline-block;
	font-size:18px;
    height:30px;
	margin-left:15px;
	width:11rem;
	cursor:pointer;
	margin-top:-10px;
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

</script>

<body>
	<header>
        <?php 
		include "navigation.php"; 
		?>
		 </header>
	
	<div><h1>Consultation List</h1></div>
	
	<div class ="form" method="POST">
		<div class ="title">
		Consultation Listing
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
							<th>ConsultID</th>
							<th>M_Name</th>
							<th>D_Name</th>
							<th>Date</th>
							<th>Time</th>
							<th>Symptoms</th>
							<th>Status</th>
							<th>Links</th>
							<th>Remark</th>
						</tr>
					</thead>
			<?php
			include 'connection.php';
			
			if(isset($_POST['btnsearch']))
			{
				$valuesearch = $_POST['valuesearch'];
				$result = mysqli_query($connect, "SELECT * FROM `consultation` WHERE `M_Name` LIKE'%$valuesearch%' ORDER BY ConsultID DESC");
			}
			else
			{
				$result = mysqli_query($connect, "SELECT * FROM consultation WHERE DoctorID ='{$_SESSION['id']}' ORDER BY ConsultID DESC");
			}
			
			
			while($row = mysqli_fetch_assoc($result))
			{
			?>		
					<tbody>
						<tr>
							<td style="width:220px; white-space: nowrap;"><a href="consultation_doctor_viewmem.php?edit&MemberID=<?php echo $row["MemberID"];?>"><button class="btn1">Member</button></a><a href="consultation_doctor_view.php?edit&ConsultID=<?php echo $row["ConsultID"];?>"><button class="btn2">Consultation</button></a></td>
							<td style="max-width:30px;"><?php echo $row["Code"];?><?php echo $row["ConsultID"];?></td>
							<td style ="max-width:130px; overflow:hidden; text-overflow:ellipsis;"><?php echo $row["M_Name"];?></td>
							<td style ="max-width:130px; overflow:hidden; text-overflow:ellipsis;"><?php echo $row["D_Name"];?></td>
							<td><?php echo $row["Date"];?></td>
							<td><?php echo $row["Time"];?></td>
							<td style ="max-width:160px; overflow:hidden; text-overflow:ellipsis;"><?php echo $row["Symptoms"];?></td>
							<td><?php echo $row["Status"];?></td>
							<td style ="max-width:170px; overflow:hidden; text-overflow:ellipsis;"><?php echo $row["Links"];?></td>
							<td style ="max-width:170px; overflow:hidden; text-overflow:ellipsis;"><?php echo $row["Remark"];?></td>
						</tr>
					</tbody>
			<?php
			}
			if(mysqli_num_rows($result)==0){
			?>
			<i>NO APPOINTMENT AVAILABLE</i>
			<?php }
			?>
					
				</table>
			</div>
		</div>
	</div>
	
</body>
</html>