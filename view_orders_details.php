<?php require_once "controllerUserDocData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>View Order Details</title>
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
	height:45rem;
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
	width:350px;
	height:30px;
	font-size:15px;
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
	margin-top:440px;
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
	
	textarea{
	resize:none;
	border:1px solid #ddd!important;
	width:350px;
	margin-top:10px;
	text-transform:none;
	margin-left:-50px;
	height:80px;
	font-size:15px;
	}
	
	input:hover, textarea:hover{
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
	
	<div><h1>Member Order Details</h1></div>
	
	<div class ="form">
		<div class ="title">
		View Order Information
		</div>
		
		
<?php
	ob_start();
		include 'connection.php';
?>
<?php
		if(isset($_GET['view']))
		{
			$id = $_GET["order_id"];
			$result = mysqli_query($connect, "SELECT * FROM orders WHERE order_id='$id'");
			$row = mysqli_fetch_assoc($result);?>	
		<form name="editform" method="POST" enctype="multipart/form-data" action="">
		<table>
			<tr>
				<td>OrderID:</td>
				<td><input type="text" name="id" value="<?php echo $row["code"];echo $row["order_id"];?>"readonly></td>
			</tr>
			
			<tr>
				<td>Amount Paid:</td>
				<td><input type="text" name="amountpaid" value="RM <?php echo $row["amount_paid"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>Time:</td>
				<td><input type="text" name="time" value="<?php echo $row["time"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>Address: </td>
				<td><textarea name ="links" rows="3" col="60" readonly><?php echo $row["address"]?></textarea></td>
			</tr>
			
			<tr>
				<td>Name: </td>
				<td><input type="text" name="name" value="<?php echo $row["name"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>Hpnum: </td>
				<td><input type="text" name="hpnum" value="<?php echo $row["phone_num"]?>"readonly></td>
			</tr>
		
		<?php } ?>
		</form>
	<div>
		<button class="btn1"><a href ="view_orders.php">Exit</a></button>
	</div>
	</div>
	</table>
	

	
</body>
</html>