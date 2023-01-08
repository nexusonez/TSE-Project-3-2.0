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
	height:48rem;
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
	margin-top:460px;
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
	
	<div><h1>View Admin</h1></div>
	
	<div class ="form">
		<div class ="title">
		View Admin Listing
		</div>
		
		
<?php
	ob_start();
		
		include 'connection.php';
		
?>
<?php
		if(isset($_GET['view']))
		{
			$id = $_GET["AdminID"];
			$result = mysqli_query($connect, "SELECT * FROM admin WHERE AdminID='$id'");
			$row = mysqli_fetch_assoc($result);?>	
		<form name="viewform" action="">
		<table>
			<tr>
				<td>ID:</td>
				<td><input type="text" name="adminid" value="<?php echo $row["Code"]; echo $row["AdminID"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>A_Name:</td>
				<td><input type="text" name="name" value="<?php echo $row["A_Name"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>Gender:</td>
				<td><input type ="text" name="gender" value="<?php echo $row["gender"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>Email:</td>
				<td><input type="text" name="email" value="<?php echo $row["email"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>Hpnum: </td>
				<td><input type="text" name="hpnum" value="<?php echo $row["hpnum"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>Password: </td>
				<td><input type="text" name="password" value="<?php echo $row["password"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>Address: </td>
				<td><input type="text" name="address" size="100" value="<?php echo $row["address"]?>"readonly></td>
			</tr>
	<?php } ?>	
		</form>
		
	<div>
		<button class="btn1"><a href ="admin_list.php">Exit</a></button>
	</div>
	</div>
	</table>
	

	
</body>
</html>