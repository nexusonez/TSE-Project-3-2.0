<?php require_once "controllerUserDocData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Prescription view admin</title>
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
	
	input{
	border: 1px solid #ddd!important;
	text-transform:none;
	width:300px;
	height:30px;
	font-size:15px;
	margin-left:-20px;
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
	color:white;
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
	
	<div><h1>Prescription View</h1></div>
	
	<div class ="form">
		<div class ="title">
		View Members prescription
		</div>
		
		
<?php
	ob_start();
		include 'connection.php';
?>
<?php
		if(isset($_GET['view']))
		{
			$id = $_GET["MemberID"];
			$result = mysqli_query($connect, "SELECT * FROM member WHERE MemberID='$id'");
			$row = mysqli_fetch_assoc($result);?>	
		<form name="editform" method="POST" enctype="multipart/form-data" action="">
		<table>
			<tr>
				<td>ID:</td>
				<td><input type="text" name="id" value="<?php echo $row["Code"];echo $row["MemberID"];?>"readonly></td>
			</tr>
			
			<tr>
				<td>M_Name:</td>
				<td><input type="text" name="name" value="<?php echo $row["M_Name"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>Gender:</td>
				<td><input type="text" name="gender" value="<?php echo $row["Gender"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>Allergy: </td>
				<td><input type="text" name="allergy" value="<?php echo $row["Allergy"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>Prescription: </td>
				<td><a download href="files/<?php echo $row["Prescription"]; ?>"><i class="fa fa-download" style="margin-left:10px;"></i></a>    <?php echo $row["Prescription"]; ?></td>
			</tr>
			
			<tr>
				<td>Status: </td>
				<td><input type="text" name="status" value="<?php echo $row["Status"]?>"readonly></td>
			</tr>
		
		<?php } ?>
		</form>
	<div>
		<button class="btn1"><a href ="prescription_admin.php">Exit</a></button>
	</div>
	</div>
	</table>
	

	
</body>
</html>