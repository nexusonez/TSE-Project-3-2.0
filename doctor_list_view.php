<?php require_once "controllerUserDocData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin view</title>
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
	height:56rem;
	margin-top:10px;
	}
	
	.title{
	width: 120%;
	margin-top:-40px;
	font-size:25px;
	font-weight:bold;
	font-family: Agency FB;
	color:white;
	background-color:blue;
	position:relative;
	margin-left:-32px;
	}
	
	td{
	font-size:20px;
	color:black;
	background:#fff;
	margin-top:30px;
	width:50%;
	line-height:50px;
	padding: 0 14px!important;
	text-transform:none;
	
	}
	
	tr{
	margin-top:300px;
	padding-right:200px;
	}
	
	
	table{
	margin-top:10px;
	}
	
	
	.btn, .btn1 {
	margin:0 auto;
	display:flex;
	font-size:20px;
	background:#00ff00;
    height:30px;
	position:absolute;
	margin-top:530px;
	margin-left:30px;
	color:white;
	width:7rem;
	justify-content:center;
	cursor:pointer;
	}
	
	.btn1{
	margin-left:700px;
	background:#ff0000;
	}
	
	.gender{
	margin-left:200px;
	}
	
	input{
	margin-right:250px;
	font-size:17px;
	text-transform:none;
	}
	
	input:hover{
	cursor:not-allowed;
	}
	
	</style>
</head>

<body>
	<header>
        <?php 
		include "navigation.php"; 
		?>
		
    </header>
	
	<div><h1>View Doctors</h1></div>
	
	<div class ="form">
		<div class ="title">
		View Doctor listing
		</div>
		
		
<?php
	ob_start();
		include 'connection.php';
		
?>
<?php
		if(isset($_GET['view']))
		{
			$id = $_GET["DoctorID"];
			$result = mysqli_query($connect, "SELECT * FROM doctors WHERE DoctorID='$id'");
			$row = mysqli_fetch_assoc($result);?>	
		<form name="viewform" action="">
		<table>
			<tr>
				<td>ID:</td>
				<td><input type="text" name="doctorid" value="<?php echo $row["Code"]; echo $row["DoctorID"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>A_Name:</td>
				<td><input type="text" name="name" value="<?php echo $row["D_Name"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>Gender:</td>
				<td><input type ="text" name="gender" value="<?php echo $row["Gender"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>Status:</td>
				<td><input type ="text" name="status" value="<?php echo $row["Status"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>Email:</td>
				<td><input type="text" name="email" value="<?php echo $row["Email"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>Hpnum: </td>
				<td><input type="text" name="hpnum" value="<?php echo $row["Hpnum"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>Password: </td>
				<td><input type="text" name="password" value="<?php echo $row["Password"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>Address: </td>
				<td><input type="text" name="address" size="100" value="<?php echo $row["Address"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>Profile Picture: </td>
				<td><input type="text" name="address" size="100" value="<?php echo $row["dp"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>Experience: </td>
				<td><input type="text" name="address" size="100" value="<?php echo $row["experience"]?>"readonly></td>
			</tr>
	<?php } ?>
		</form>
			
	<div>
		<button class="btn1"><a href ="doctor_list.php">Exit</a></button>
	</div>
	</div>
	</table>
	

	
</body>
</html>