<?php require_once "controllerUserDocData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Manage Covid</title>
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
	height:52rem;
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
	width:400px;
	height:30px;
	font-size:15px;
	margin-left:-70px;
	}
	
	textarea{
	resize:none;
	border:1px solid #ddd!important;
	width:400px;
	height:80px;
	margin-top:10px;
	text-transform:none;
	margin-left:-70px;
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
	margin-top:500px;
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
	
	<div><h1>Manage Covid-19</h1></div>
	
	<div class ="form">
		<div class ="title">
		Edit Page Info
		</div>
	
<?php
	ob_start();
	
		
		include 'connection.php';
		$result = mysqli_query($connect, "SELECT * FROM covid");?>
<?php
		if(isset($_GET['edit']))
		{
			$id = $_GET["id"];
			$result = mysqli_query($connect, "SELECT * FROM covid WHERE id='$id'");
			$row = mysqli_fetch_assoc($result);
			$desc =$row["description"];
			$image =$row["img"];?>	
		<form name="editform" method="post" enctype="multipart/form-data" action="">
		<table>
			<tr>
				<td>ID:</td>
				<td><input type="text" name="id" value="<?php echo $row["id"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>Title:</td>
				<td><input type="text" name="title" value="<?php echo $row["title"]?>"></td>
			</tr>
			
			<tr>
				<td>Subtitle:</td>
				<td><input type="text" name="subtitle" value="<?php echo $row["subtitle"]?>"></td>
			</tr>
			
			<tr>
				<td>Description:</td>
				<td><textarea name ="description" rows="5" col="80"><?php echo $desc?></textarea></td>
			</tr>
			
			<tr>
				<td>IMG:</td>
				<td><input type="file" name="img" class="choose"></td>
			</tr>
			
			<tr>
				<td>References: </td>
				<td><input type="text" name="ref" value="<?php echo $row["ref"]?>"></td>
			</tr>
			
			<tr>
				<td>Button: </td>
				<td><input type="text" name="button" value="<?php echo $row["button"]?>"></td>
			</tr>
			
			<tr>
				<td><label for="display">Display:</label>
					<select id="display" name="display" style="margin-left:220px;">
					<option value="Yes">Yes</option>
					<option value="No">No</option>
					</select>
				</td>
			</tr>
		<div>
		<input type="submit" name="submitbtn" value="Save" class="btn">
		</div>
		</form>
	<div>
		<button class="btn1"><a href ="manage_covid.php">Exit</a></button>
	</div>
	</div>
	</table>
	
<?php } ?>
	
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
					$fileDestination = 'images/articles/'.$fileName;
					move_uploaded_file($fileTMPName, $fileDestination);
						
			$title=$_POST["title"];
			$subtitle=$_POST["subtitle"];
			$description=$_POST["description"];
			$ref=$_POST["ref"];
			$button=$_POST["button"];
			$display=$_POST["display"];
			
		mysqli_query($connect,"UPDATE covid SET title='$title', subtitle='$subtitle', description='$description',
				img='$fileDestination', ref='$ref', button='$button', display='$display', AdminID='{$_SESSION['id']}' WHERE id='$id'");
				
			echo'<script type="text/javascript">
			alert("Website info updated!");
			</script>';
			header( 'refresh:0.5; url=manage_covid.php' );
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