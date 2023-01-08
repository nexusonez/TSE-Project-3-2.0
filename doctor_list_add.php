<?php require_once "controllerUserDocData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add doctor</title>
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
	height:63rem;
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
	
	input{
	border: 1px solid #ddd!important;
	text-transform:none;
	width:300px;
	height:30px;
	font-size:15px;
	margin-left:-90px;
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
	margin-top:600px;
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
	
	textarea{
	resize:none;
	border:1px solid #ddd!important;
	width:300px;
	height:60px;
	margin-top:10px;
	text-transform:none;
	margin-left:-90px;
	font-size:15px;
	}
	
	
	</style>
</head>

<body>
	<header>
        <?php 
		include "navigation.php"; 
		?>
		
    </header>
	
	<div><h1>Add Doctor</h1></div>
	
	<div class ="form">
		<div class ="title">
		Add Doctor listing
		</div>
		
		
<?php
	ob_start();
		
		include 'connection.php';
		$result = mysqli_query($connect, "SELECT * FROM doctors");
?>
		<form name="editform" method="POST" enctype="multipart/form-data" action="">
		<table>
			<tr>
				<td>D_Name:</td>
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
				<td><label for="status">Status:</label>
					<select id="status" name="status" style="margin-left:130px;">
					<option value="Active">Active</option>
					<option value="Inactive">Inactive</option>
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
				<td><textarea name ="address" rows="5" col="80" required></textarea></td>
			</tr>
			
			<tr>
				<td>Profile Picture: </td>
				<td><input type="file" name="img"></td>
			</tr>
			
			<tr>
				<td>Description: </td>
				<td><textarea name ="description"></textarea></td>
			</tr>
			
			<tr>
				<td>Experience: </td>
				<td><input type="text" name="experience"></td>
			</tr>
		<div>
		<input type="submit" name="submitbtn" value="Add" class="btn">
		</div>
		</form>
	<div>
		<button class="btn1"><a href ="doctor_list.php">Exit</a></button>
	</div>
	</div>
	</table>
	
	
</body>
</html>
<?php
if(isset($_POST['submitbtn']))
{
	$file = $_FILES['img'];
		
		$fileName = $_FILES['img']['name'];
		$fileTMPName = $_FILES['img']['tmp_name'];
		$fileSize = $_FILES['img']['size'];
		$fileError = $_FILES['img']['error'];
		$fileType = $_FILES['img']['type'];
		
		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));
		
		$allowed = array('jpg', 'jpeg', 'png');
		
		if(in_array($fileActualExt, $allowed ) || $fileName == NULL) {
			if($fileSize<5000000)
			{
					//$fileNameNew = uniqid('', true).".".$fileActualExt;
					$fileDestination = 'images/dp/'.$fileName;
					move_uploaded_file($fileTMPName, $fileDestination);
						
			$name=$_POST["name"];
			$gender=$_POST["gender"];
			$status=$_POST["status"];
			$email=$_POST["email"];
			$hpnum=$_POST["hpnum"];
			$password=$_POST["password"];
			$address=$_POST["address"];
			$description=$_POST["description"];
			$experience=$_POST["experience"];
		
		$query="INSERT INTO doctors (D_Name, Gender, Status, Email, Hpnum, Password, Address, dp, description, experience) 
					VALUES('$name', '$gender', '$status', '$email', '$hpnum', '$password', '$address', '$fileDestination', $description, '$experience')";
					
			mysqli_query($cconnect,$query);
				
			echo'<script type="text/javascript">
			alert("Profile info updated!");
			</script>';
			header( 'refresh:0.5; url=doctor_list.php' );
			}
			else{
			echo "File too big";
			}
		}
		else {
			echo "You cannot upload files of this type!";
			}
}
?>