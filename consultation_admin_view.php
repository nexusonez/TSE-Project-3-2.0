<?php require_once "controllerUserDocData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Consultation view admin</title>
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
	height:53rem;
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
	
	.btn, .btn1 {
	margin:0 auto;
	display:flex;
	font-size:20px;
	background:#00ff00;
    height:30px;
	position:absolute;
	margin-top:520px;
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
	border: 1px solid #ddd!important;
	text-transform:none;
	width:78%;
	height:25px;
	font-size:15px;
	margin-left:-200px;
	}
	
	input:hover, textarea:hover{
	cursor:not-allowed;
	}
	
	textarea{
	resize:none;
	border:1px solid #ddd!important;
	width:300px;
	height:80px;
	margin-top:10px;
	text-transform:none;
	margin-left:-200px;
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
	
	<div><h1>View Consultation</h1></div>
	
	<div class ="form">
		<div class ="title">
		Consultation by members
		</div>
		
		
<?php
	ob_start();
		
		include 'connection.php';
		
?>
<?php
		if(isset($_GET['view']))
		{
			$id = $_GET["ConsultID"];
			$result = mysqli_query($connect, "SELECT * FROM consultation WHERE ConsultID='$id'");
			$row = mysqli_fetch_assoc($result);?>	
		<form name="viewform" action="">
		<table>
			<tr>
				<td>ID:</td>
				<td><input type="text" name="consultid" value="<?php echo $row["Code"]; echo $row["ConsultID"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>M_Name:</td>
				<td><input type="text" name="mname" value="<?php echo $row["M_Name"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>D_Name:</td>
				<td><input type="text" name="dname" value="<?php echo $row["D_Name"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>Date:</td>
				<td><input type="text" name="date" value="<?php echo $row["Date"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>Time: </td>
				<td><input type="text" name="time" value="<?php echo $row["Time"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>Status: </td>
				<td><input type="text" name="status" value="<?php echo $row["Status"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>Links: </td>
				<td><textarea name ="links" rows="5" col="80" readonly><?php echo $row["Links"]?></textarea></td>
			</tr>
			
			<tr>
				<td>Remark: </td>
				<td><input type="text" name="remark" value="<?php echo $row["Remark"]?>"readonly></td>
			</tr>
			
	<?php } ?>
		</form>
			
	<div>
		<button class="btn1"><a href ="consultation_admin.php">Exit</a></button>
	</div>
	</div>
	</table>
	

	
</body>
</html>