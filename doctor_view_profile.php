<?php require_once "controllerUserDocData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Doctor view profile</title>
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
	height:50rem;
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
	
	
	.btn{
	margin:0 auto;
	display:flex;
	font-size:20px;
	background:#00ff00;
    height:30px;
	position:absolute;
	margin-top:460px;
	margin-left:30px;
	color:white;
	width:7rem;
	justify-content:center;
	cursor:pointer;
	}
	
	
	.btn1{
	background-color:#00ff00;
	color:white!important;
	margin:0 auto;
	display:inline-block;
	font-size:20px;
    height:35px;
	position:absolute;
	margin-top:480px;
	margin-left:30px;
	width:10rem;
	justify-content:center;
	cursor:pointer;
	}
	
	
	.gender{
	margin-left:200px;
	}
	
	input{
	margin-right:450px;
	font-size:15px;
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
	
	<div><h1>Doctor Profile</h1></div>
	
	<div class ="form">
		<div class ="title">
		View Doctor Profile
		</div>
		
		
<?php
	ob_start();
		
		include 'connection.php';
		
?>
<?php
			$id = $_SESSION['id'];
			$result = mysqli_query($connect, "SELECT * FROM doctors WHERE DoctorID='$id'");
			$row = mysqli_fetch_assoc($result);?>	
		<form name="viewform" action="">
		<table>
			<tr>
				<td>D_Name:</td>
				<td><input type="text" name="name" value="<?php echo $row["D_Name"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>Gender:</td>
				<td><input type ="text" name="gender" value="<?php echo $row["Gender"]?>"readonly></td>
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
				<td><input type="text" name="password" style="text-transform:none;" value="<?php echo $row["Password"]?>"readonly></td>
			</tr>

			<tr>
				<td>Address: </td>
				<td><input type="text" name="address" size="100" value="<?php echo $row["Address"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>Profile Picture: </td>
				<td><input type="text" name="dp" size="100" value="<?php echo $row["dp"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>Years: </td>
				<td><input type="text" name="description" size="100" value="<?php echo $row["experience"]?>"readonly></td>
			</tr>
		</form>
		
	<div>
		<button class="btn1" name="edit"><a href ="doctor_edit_profile.php">Edit Profile</a></button>
	</div>
	</div>
	</table>
	

	
</body>
</html>