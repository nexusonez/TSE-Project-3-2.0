<?php require_once "controllerUserDocData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Consultation view member doctor</title>
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
	padding-right:200px;
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
	}
	
	.gender{
	margin-left:200px;
	}
	
	input{
	margin-right:400px;
	border: 1px solid #ddd!important;
	text-transform:none;
	width:70%;
	height:30px;
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
	}
	
	table td a:hover{
	text-decoration:underline!important;
	}
	</style>
</head>

<body>
	<header>
        <div class = "container">
		    <a href="doctor_home.php">
            <img src="images/LOGO ASWELL.png" alt="nav logo" width="385" height="85px" style="margin-left:-2%;">
			
			<nav class="nav">
                <ul>
                    <li><a href="#home">Home</a></li>
					<li><a href="edit_profile_doctor.php">Profile</a></li>
					<li><a href="inquiry_doctor.php">Inquiries</a></li>
					<li><a href="consultation_doctor.php">Consultation</a></li>
                    <li class = "dropdown"> 
					<button class = "dropbtn">Menu 
					<i class="fa fa-caret-down"></i>
					</button>
					<div class = "dropdown-content">
                        <a href ="logout.php">Log Out</a>
                    </div></li>
					<li>Hi Doctor</li>
                </ul>
            </nav>
        </div>
		 </header>
	
	<div><h1>View Consultation Member</h1></div>
	
	<div class ="form">
		<div class ="title">
		Consultation Member Details
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
		<form name="viewform" method="POST" enctype="multipart/form-data" action="">
		<table>
			<tr>
				<td>Full Name:</td>
				<td><input type="text" name="mname" value="<?php echo $row["M_Name"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>Email:</td>
				<td><input type="text" name="gender" value="<?php echo $row["Email"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>Allergy:</td>
				<td><input type="text" name="allergy" value="<?php echo $row["Allergy"]?>"readonly></td>
			</tr>
			
			<tr>
				<td>Prescription: </td>
				<td>
				  				<input type="file" name="image" style="margin-top:40px;" required><br>
				  				<?php if($row['Prescription']!=''){
				  					?>
				  				<a style="margin-left:-200px;"download href="files/<?php echo $row['Prescription']; ?>">Download</a>
				  					<?php
				  				} ?>
				  			</td>
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
	

	
</body>
</html>

<?php
if(isset($_POST['submitbtn']))
{

	//Upload patient report
	$filename = $_FILES["image"]["name"];
	$tempname = $_FILES["image"]["tmp_name"];    
	$folder = "files/".$filename;
	move_uploaded_file($tempname, $folder);
	
	mysqli_query($connect, "UPDATE member SET Prescription='$filename' WHERE MemberID='$id'");
				
			echo'<script type="text/javascript">
			alert("Member Prescription updated!");
			</script>';
			header( 'refresh:0.5; url=consultation_doctor.php' );
			
}
?>