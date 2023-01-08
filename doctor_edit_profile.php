<?php require_once "controllerUserDocData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Doctor edit profile</title>
 <link rel="stylesheet" href="css/style.css"> <!-- css files-->
	
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> <!-- font awesome-->
	<style>
	
	h1{
	margin-top:80px;
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
	margin-top:px;
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
	width:300px;
	height:30px;
	font-size:16px;
	margin-left:-60px;
	}
	
	textarea{
	resize:none;
	border:1px solid #ddd!important;
	width:300px;
	height:50px;
	margin-top:10px;
	text-transform:none;
	margin-left:-60px;
	font-size:15px;
	}
	
	table{
	margin-top:10px;
	}
	
	td .sub{
	border: 1px solid #ddd!important;
	text-transform:none;
	width:255px;
	}
	
	td .choose{
	font-size:15px;
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
	

	</style>
</head>

<body>
	<header>
        <?php 
		include "navigation.php"; 
		?>
		
    </header>
	
	<div><h1>Edit Doctor</h1></div>
	
	<div class ="form">
		<div class ="title">
		Customize your own profile
		</div>
		
		
<?php
	ob_start();
	include 'connection.php';
?>
<?php
		if(isset($_SESSION['id']))
		{
			$id = $_SESSION['id'];
			$result = mysqli_query($connect, "SELECT * FROM doctors WHERE DoctorID='$id'");
			$row = mysqli_fetch_assoc($result);?>	
		<form name="editform" method="POST" enctype="multipart/form-data" action="">
		<table>
			<tr>
				<td>D_Name:</td>
				<td><input type="text" name="name" value="<?php echo $row["D_Name"]?>" required></td>
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
				<td>Email: </td>
				<td><input type="text" name="email" value="<?php echo $row["Email"]?>"required></td>
			</tr>
			
			<tr>
				<td>Hpnum: </td>
				<td><input type="text" name="hpnum" value="<?php echo $row["Hpnum"]?>"required></td>
			</tr>
			
			<tr>
				<td>Password: </td>
				<td><input type="text" name="password" value="<?php echo $row["Password"]?>"required></td>
			</tr>
			
			<tr>
				<td>Address: </td>
				<td><textarea name ="address" required><?php echo $row["Address"]?></textarea></td>
			</tr>
			
			<tr>
				<td>Profile picture: </td>
				<td><input type="file" name="img"></td>
			</tr>
			
			<tr>
				<td>Description: </td>
				<td><textarea name ="description" required><?php echo $row["description"]?></textarea></td>
			</tr>
			
			<tr>
				<td>Experience: </td>
				<td><input type="text" name="experience" value="<?php echo $row["experience"]?>" required></td>
			</tr>
		<div>
		<input type="submit" name="submitbtn" value="Save" class="btn">
		</div>
		<?php } ?>
		</form>
		
	<div>
		<button class="btn1"><a href ="doctor_view_profile.php">Exit</a></button>
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
			$email=$_POST["email"];
			$hpnum=$_POST["hpnum"];
			$password=$_POST["password"];
			$address=$_POST["address"];
			$description=$_POST["description"];
			$experience=$_POST["experience"];
			
		mysqli_query($connect,"UPDATE doctors SET D_Name='$name', Gender='$gender', Email='$email',
				Hpnum='$hpnum', Password='$password', Address='$address', dp='$fileDestination', experience='$experience', description='$description' WHERE DoctorID='$id'");
				
			echo'<script type="text/javascript">
			alert("Profile info updated!");
			</script>';
			header( 'refresh:0.5; url=doctor_view_profile.php' );
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