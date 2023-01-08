<?php require_once "controllerUserDocData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Member edit</title>
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
	}
	
	input, .file{
	border: 1px solid #ddd!important;
	text-transform:none;
	width:350px;;
	height:35px;
	font-size:15px;
	margin-left:-70px;
	}
	
	textarea{
	resize:none;
	border:1px solid #ddd!important;
	width:330px;
	height:70px;
	margin-top:10px;
	text-transform:none;
	margin-left:-50px;
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
	margin-top:480px;
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
	
	<div><h1>Edit Members</h1></div>
	
	<div class ="form">
		<div class ="title">
		Edit Member listing
		</div>
		
		
<?php
	ob_start();
	include 'connection.php';
?>
<?php
		if(isset($_GET['edit']))
		{
			$id = $_GET["MemberID"];
			$result = mysqli_query($connect, "SELECT * FROM member WHERE MemberID='$id'");
			$row = mysqli_fetch_assoc($result);?>	
		<form name="editform" method="POST" enctype="multipart/form-data" action="">
		<table>
			<tr>
				<td>ID:</td>
				<td><input type="text" name="id" value="<?php echo $row["Code"]; echo $row["MemberID"];?>"readonly></td>
			</tr>
			
			
			<tr>
				<td>M_Name:</td>
				<td><input type="text" name="name" value="<?php echo $row["M_Name"]?>" required></td>
			</tr>
			
			<tr>
				<td><label for="gender">Gender:</label>
					<select id="gender" name="gender" style="margin-left:180px;">
					<option value="M">M</option>
					<option value="F">F</option>
					</select>
				</td>
			</tr>
			
			<tr>
				<td>Email:</td>
				<td><input type="text" name="email" value="<?php echo $row["Email"]?>" required></td>
			</tr>
			
			<tr>
				<td>Hpnum: </td>
				<td><input type="text" name="hpnum" value="<?php echo $row["Hpnum"]?>" required></td>
			</tr>
			
			<tr>
				<td>Allergy: </td>
				<td><input type="text" name="allergy" value="<?php echo $row["Allergy"]?>"></td>
			</tr>
			
			<tr>
				<td>Password: </td>
				<td><input type="text" name="password" value="<?php echo $row["Password"]?>"required></td>
			</tr>
			
			<tr>
				<td>Address: </td>
				<td><textarea name ="address" required><?php echo $row["Address"]?></textarea></td>
			</tr>
		<div>
		<input type="submit" name="submitbtn" value="Save" class="btn">
		</div>
		<?php } ?>
		</form>
		
	<div>
		<button class="btn1"><a href ="member_list.php">Exit</a></button>
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
	$allergy=$_POST["allergy"];
	$password=$_POST["password"];
	$address=$_POST["address"];
	
	mysqli_query($connect,"UPDATE member SET M_Name='$name', Gender='$gender',
				Email='$email', Hpnum='$hpnum', Allergy='$allergy', Password='$password', Address='$address' WHERE MemberID='$id'");
				
			echo'<script type="text/javascript">
			alert("Member Info updated!");
			</script>';
			header( 'refresh:0.5; url=member_list.php' );
}
?>