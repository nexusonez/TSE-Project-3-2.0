<?php require_once "controllerUserDocData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Shop item</title>
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
	}
	
	input{
	border: 1px solid #ddd!important;
	text-transform:none;
	width:100%;
	height:30px;
	font-size:12px;
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
	
	textarea{
	resize:none;
	border:1px solid #ddd!important;
	width:300px;
	height:80px;
	margin-top:10px;
	text-transform:none;
	margin-left:-70px;
	}
	
	</style>
</head>

<body>
	<header>
        <?php 
		include "navigation.php"; 
		?>
		
    </header>
	
	<div><h1>Add Items</h1></div>
	
	<div class ="form">
		<div class ="title">
		Add Item listing
		</div>
		
		
<?php
	ob_start();
	include 'connection.php';
		
		$result = mysqli_query($connect, "SELECT * FROM shop");
?>
		<form name="editform" method="POST" enctype="multipart/form-data" action="">
		<table>
			
			<tr>
				<td>ItemName:</td>
				<td><input type="text" name="itemname" required></td>
			</tr>
			
			<tr>
				<td>ItemDesc:</td>
				<td><textarea name ="itemdesc" required></textarea></td>
			</tr>
			
			<tr>
				<td>Quantity:</td>
				<td><input type="text" name="quantity" required></td>
			</tr>
			
			<tr>
				<td>Price: </td>
				<td><input type="text" name="price" required></td>
			</tr>
			
			<tr>
				<td>Itemimg: </td>
				<td><input type="file" name="img" style="margin-top:40px;" required></td>
			</tr>
			
			<tr>
				<td><label for="prescriptrequire">PrescriptRequire:</label>
					<select id="prescriptrequire" name="prescriptrequire" style="margin-left:130px;">
					<option value="Yes">Yes</option>
					<option value="No">No</option>
					</select>
				</td>
			</tr>
			
			<tr>
				<td><label for="itemdisplay">ItemDisplay:</label>
					<select id="itemdisplay" name="itemdisplay" style="margin-left:175px;">
					<option value="Yes">Yes</option>
					<option value="No">No</option>
					</select>
				</td>
			</tr>
		<div>
		<input type="submit" name="submitbtn" value="Add" class="btn">
		</div>
		</form>
	<div>
		<button class="btn1"><a href ="shopitem_list.php">Exit</a></button>
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
					$fileDestination = 'images/'.$fileName;
					move_uploaded_file($fileTMPName, $fileDestination);
						
			$itemname=$_POST["itemname"];
			$itemdesc=$_POST["itemdesc"];
			$quantity=$_POST["quantity"];
			$price=$_POST["price"];
			$prescriptrequire=$_POST["prescriptrequire"];
			$itemdisplay=$_POST["itemdisplay"];
			
		mysqli_query($connect,"INSERT INTO shop ( ItemName, ItemDesc, Quantity, Price, ItemImg, PrescriptRequire, ItemDisplay, AdminID)
								VALUES ('$itemname', '$itemdesc', '$quantity', '$price', '$fileDestination', '$prescriptrequire', '$itemdisplay', '{$_SESSION['id']}')");
				
			echo'<script type="text/javascript">
			alert("Shopping Item added!");
			</script>';
			header( 'refresh:0.5; url=shopitem_list.php' );
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