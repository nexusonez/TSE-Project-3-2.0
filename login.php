<?php require_once "controllerUserDocData.php"; ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" href="css/style.css"> <!-- css files-->
	
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> <!-- font awesome-->
    <style>
	h1 {
	font-weight:bold;
	font-family: Agency FB;
	font-size: 30px;
	display:inline;
	margin: auto;
	width: 60%;
	padding: 10px;
	}
	
	h3{
	font-family: Agency FB;
	font-size: 25px;
	display:inline;
	color:black;
	}
	
	p{
	font-weight:bold;
	font-family: Agency FB;
	font-size: 30px;
	text-decoration:underline!important;
	color:blue;
	display:inline;
	}
	
	form {
	border: 1px solid blue!important;
	margin: auto;
	width: 60%;
	padding: 10px;
	width:500px;
	height:500px;
	transition: transform 0.3s!important;
	box-shadow: 2px 2px 25px 0px rgba(0,0,0,0.3)!important;
	border-radius:25px;
	}
	
	.logcontainer{
	position: relative;
	padding: 16px;
	border-color:blue;
	padding:30px;
	margin-left:20px;
	margin-top:20px;
	margin-right:30px;
	}
	
	input {
	width:100%;
	padding:12px;
	padding-bottom:8px;
	margin-bottom:30px;
	border:none;
	border-radius:3px;
	display: inline-block;
	border: 0;
	border-bottom: 1px solid blue!important;
	}
	
	::placeholder, h2{
	font-weight:bold;
	font-family: Agency FB;
	font-size:30px;
	display:inline;
	}
	
	.logbtn{
	font-family: Agency FB!important;
	font-size:30px!important;
	background:blue!important;
    border-radius: 20px;!important
	border: solid!important;
    color: white!important;
	cursor:pointer!important;
	padding-left:40px!important;
	padding-right:40px!important;
	padding-top:5px!important;
	padding-bottom:5px!important;
	margin-left:120px!important;
	
	}
	
	.logbtn:hover{
	background:white!important;
    color: blue!important;
	text-decoration:underline!important;
	}
	
	input{
	font-size:17px;
	text-transform:none;
	}
	
	.form-input{
	font-size:20px;
	margin-left:10px;
	}
	</style>
	</head>
<body>
<!-- main design for web-->
    <header>
	
        <?php 
		include "navigation.php"; 
		?>
		
    </header>
	
	<div style="margin-left:750px; margin-top:140px; ">
	<h1> </h1>
	</div>
	

	
	<div style ="color:black; font-weight:bold; ">
		<h1><center>Welcome! Please Login To Your Account</center></h1>
	</div>
	
	
	
	<form action="" method="POST">
		<div class ="logcontainer">
		<input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<button class ="logbtn" name= "logbtn" style ="margin-left:50px;">Login</button>
		<br>
		<br>
		<br>
		<br>
		<h2 style="margin-left:100px;">Login as:</h2>
	  				<select required class="form-input" name="type">
	  					<option value="cfo">CFO</option>
						<option value="accountant">Accountant</option>
						<option value="vendor">Vendor</option>
						<option value="vmanager">Manager</option>
	  				</select>
		<br>
		</div>
	</form>
	
	
	</body>
	</html>
