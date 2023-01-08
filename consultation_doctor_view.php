<?php require_once "controllerUserDocData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Consultation view doctor</title>
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
	height:55rem;
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
	
	.gender{
	margin-left:200px;
	}
	
	input{
	margin-right:450px;
	border: 1px solid #ddd!important;
	text-transform:none;
	width:70%;
	height:25px;
	font-size:12px;
	margin-left:-200px;
	font-size:15px;
	}
	
	textarea{
	resize:none;
	border:1px solid #ddd!important;
	width:270px;
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
		if(isset($_GET['edit']))
		{
			$id = $_GET["ConsultID"];
			$result = mysqli_query($connect, "SELECT * FROM consultation WHERE ConsultID='$id'");
			$row = mysqli_fetch_assoc($result);?>	
		<form name="viewform" method="POST" enctype="multipart/form-data" action="">
		<table>
			<tr>
				<td>M_Name:</td>
				<td><input type="text" name="mname" value="<?php echo $row["M_Name"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>D_Name:</td>
				<td><input type="text" name="dname" value="<?php echo $row["D_Name"]?>"readonly></td>
			</tr>
			
			<tr>
				<td><label for="condate">Date:</label></td>
				<td><input type="date" id ="ap_date" name="condate" value="<?php echo $row["Date"]?>"required></td>
			</tr>
			
			<tr>
				<td>Time: </td>
				<td><input type="time" name="time" required value="<?php echo date('Y-m-d',strtotime($data["congestart"])) ?>"/></td>
			</tr>
			
			<tr>
				<td>Symptoms: </td>
				<td><textarea name ="symptoms" rows ="3" col="60" readonly><?php echo $row["Symptoms"]?></textarea></td>
			</tr>
			
			<tr>
				<td><label for="status">Status:</label>
					<select id="status" name="status" style="margin-left:180px;">
					<option value="Pending">Pending</option>
					<option value="Approved">Approved</option>
					<option value="Postponed">Postponed</option>
					</select>
				</td>
			</tr>
			
			<tr>
				<td>Links: </td>
				<td><textarea name ="links" rows="3" col="60"required><?php echo $row["Links"]?></textarea></td>
			</tr>
			
			<tr>
				<td>Remark: </td>
				<td><textarea name ="remark" rows="3" col="60"><?php echo $row["Remark"]?></textarea></td>
			</tr>
			
	<?php } ?>
		</form>
		
		<div>
		<input type="submit" name="submitbtn" value="Save" class="btn">
		</div>
			
	<div>
		<button class="btn1"><a href ="consultation_doctor.php">Exit</a></button>
	</div>
	</div>
	</table>
	
<script type="text/javascript">
	var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();

today = yyyy+'-'+mm+'-'+dd;
	document.getElementById('ap_date').value = today;
	document.getElementById("ap_date").setAttribute("min", today);

</script>
	
</body>
</html>

<?php
if(isset($_POST['submitbtn']))
{
	$time=$_POST["time"];
	$status=$_POST["status"];
	$links=$_POST["links"];
	$remark=$_POST["remark"];
	$date=$_POST["condate"];
	
	mysqli_query($connect, "UPDATE consultation SET Date='$date', Time='$time', Status='$status', Links='$links' , Remark='$remark'
							WHERE ConsultID='$id'");
				
			echo'<script type="text/javascript">
			alert("Member Consultation updated!");
			</script>';
			header( 'refresh:0.5; url=consultation_doctor.php' );
}
?>