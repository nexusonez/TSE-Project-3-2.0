<?php require_once "controllerUserDocData.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin home</title>
 <link rel="stylesheet" href="css/style.css"> <!-- css files-->
	
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> <!-- font awesome-->
	<style>
	.icon{
	margin-left: 50px;
	}
	
	.iconcare{
	margin-top:100px;
	padding-left:55%;
	display:block;
	}
	
	h2{
	font-weight:bold;
	font-family:Agency FB;
	font-size:45px;
	text-transform:uppercase;
	}
	
	</style>
</head>

<body>
	<header>
	
        <?php 
		include "navigation.php"; 
		?>
		
		 </header>
		
		<div class="row min-vh-100 align-items-center text-center text-md-left">

        <div class="icon" style="padding-top: 80px; ">
            <img src="images/phone-doctor-bro.svg" width="700px" height="640px" align="left" alt="" >
        </div>
		<div class="iconcare" style="padding-bottom: -20px;">
            <img src="images/Logoreal.png" width="500px" height="180px"  alt="" >
        </div>
		
		<div style ="color:black; font-weight:bold; margin-left:60%; margin-top:90px; ">
		<h2>Hi Admin</h2>
		</div>
		
		</div>
		

   
</body>
</html>