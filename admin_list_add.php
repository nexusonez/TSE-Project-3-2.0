<?php require_once "controllerUserDocData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add admin</title>
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
	height:40rem;
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
	}
	
	input, .file{
	border: 1px solid #ddd!important;
	text-transform:none;
	width:100%;
	height:30px;
	font-size:12px;
	margin-left:-50px;
	}
	
	textarea{
	resize:none;
	border:1px solid #ddd!important;
	width:300px;
	height:80px;
	margin-top:10px;
	text-transform:none;
	margin-left:-50px;
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
	margin-top:400px;
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
	
	
	</style>
</head>

<body>
	<header>
        <?php 
		include "navigation.php"; 
		?>
		
    </header>
	
	<div><h1>Add Staff</h1></div>
	
	<div class ="form">
		<div class ="title">
		Add Staff listing
		</div>
		
		
<?php
	ob_start();
		
		include 'connection.php';
		$result = mysqli_query($connect, "SELECT * FROM admin");
?>
		<form name="editform" method="POST" enctype="multipart/form-data" action="">
		<table>
			
			<tr>
				<td>A_Name:</td>
				<td><input type="text" name="name" required></td>
			</tr>
			
			<tr>
				<td><label for="gender">Gender:</label>
					<select id="gender" name="gender" style="margin-left:130px;">
					<option value="M">M</option>
					<option value="F">F</option>
					</select>
				</td>
			</tr>
			
			<tr>
				<td>Email:</td>
				<td><input type="text" name="email" required></td>
			</tr>
			
			<tr>
				<td>Hpnum: </td>
				<td><input type="text" name="hpnum" required></td>
			</tr>
			
			<tr>
				<td>Password: </td>
				<td><input type="text" name="password" required></td>
			</tr>
			
			<tr>
				<td>Address: </td>
				<td><input type="text" name="address" required></td>
			</tr>
		<div>
		<input type="submit" name="submitbtn" value="Add" class="btn">
		</div>
		</form>
	<div>
		<button class="btn1"><a href ="admin_list.php">Exit</a></button>
	</div>
	</div>
	</table>
	
	
</body>
</html>
<?php
if(isset($_POST['submitbtn']))
{
	$name=$_POST["name"];
	$gender=$_POST["gender"];
	$email=$_POST["email"];
	$hpnum=$_POST["hpnum"];
	$password=$_POST["password"];
	$address=$_POST["address"];
	
	$query= "INSERT INTO admin ( A_Name, gender, email, hpnum, password, address)
				VALUES ('$name', '$gender', '$email','$hpnum', '$password', '$address')";
	
	$abcd = mysqli_query($connect,$query);
	
	if(!$abcd)
	{
		die('Could not insert data: '.mysqli_error($connect));
	}
	else
	{
	echo '<script type="text/javascript">
			var title = "'.$name.'"
			alert("New admin added");
		  </script>';
	}
		
	header( "refresh:0.5; url=admin_list.php" );
}
?>