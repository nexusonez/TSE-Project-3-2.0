<?php require_once "controllerUserDocData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Item List view</title>
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
	
	.gender{
	margin-left:200px;
	}
	
	input{
	margin-right:100px;
	width:300px;
	font-size:15px;
	text-transform:none;
	}
	
	input:hover{
	cursor:not-allowed;
	}
	
	textarea{
	resize:none;
	border:1px solid #ddd!important;
	width:300px;
	height:60px;
	margin-top:10px;
	text-transform:none;
	margin-left:5px;
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
	
	<div><h1>View Item</h1></div>
	
	<div class ="form">
		<div class ="title">
		View Item Listing
		</div>
		
		
<?php
	ob_start();
		
		include 'connection.php';
		
?>
<?php
		if(isset($_GET['view']))
		{
			$id = $_GET["ItemID"];
			$result = mysqli_query($connect, "SELECT * FROM shop WHERE ItemID='$id'");
			$row = mysqli_fetch_assoc($result);?>	
		<form name="viewform" action="">
		<table>
			<tr>
				<td>ItemID:</td>
				<td><input type="text" name="itemid" value="<?php echo $row["Code"]; echo $row["ItemID"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>ItemName:</td>
				<td><input type="text" name="itemname" value="<?php echo $row["ItemName"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>ItemDesc:</td>
				<td><textarea name ="itemdesc" readonly><?php echo $row["ItemDesc"]?></textarea></td>
			</tr>
			
			<tr>
				<td>Quantity:</td>
				<td><input type="text" name="quantity" value="<?php echo $row["Quantity"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>Price: </td>
				<td><input type="text" name="price" value="<?php echo $row["Price"]?>"></td>
			</tr>
			
			<tr>
				<td>ItemImg: </td>
				<td><input type="text" name="itemimg" value="<?php echo $row["ItemImg"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>PrescriptRequire: </td>
				<td><input type="text" name="prescriptrequire" value="<?php echo $row["PrescriptRequire"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>ItemDisplay: </td>
				<td><input type="text" name="itemdisplay" value="<?php echo $row["ItemDisplay"]?>"readonly></td>
			</tr>
	<?php } ?>	
		</form>
		
	<div>
		<button class="btn1"><a href ="shopitem_list.php">Exit</a></button>
	</div>
	</div>
	</table>
	

	
</body>
</html>