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
	height:auto;
	margin-top:10px;
	flex-direction:column;
	}
	
	.title{
	width: 120%;
	margin-top:-31px;
	font-size:25px;
	font-weight:bold;
	font-family: Agency FB;
	color:white;
	background-color:blue;
	position:relative;
	margin-left:-32px;
	}
	
	.divform{
	width:103%;
	height:auto;
	background:  linear-gradient(left, #5DADE2 , #00c6ff);
	padding:20px 0 0 0;
	box-shadow: 0 10px 20px 0 rgba(0,0,0,.03);
	border-radius:10px;
	margin-left:-20px;
	}
	
	table{
	margin-top:10px!important;
	border-collapse: collapse;
	background-color: #fff;
	box-shadow: 0 10px 20px 0 rgba(0,0,0,.03);
	border-radius:10px;
	margin:auto;
	table-layout:fixed!important;
	width:auto;

	}
	
	th,td{
	border:1px solid #f2f2f2!important;
	padding: 8px 30px;
	text-align:center;
	color:grey;
	}
	
	th{
	font-size:20px;
	background:#5883FD;
	font-weight:500;
	line-height:20px;
	color:black;
	}
	
	td{
	font-size:10px;
	color:black;
	background:#fff;
	border-radius:2px;
	border:1px solid #f2f2f2!important;
	line-height:17px;
	padding: 0 14px!important;
	text-transform:none;
	
	}
	
	.fa-edit{
	color: #63c76a;
	margin:auto;
	font-size:20px;
	}
	
	.btn1{
	background-color:#00ff00;
	color:white!important;
	margin:0 auto;
	display:inline-block;
	font-size:20px;
    height:35px;
	position:absolute;
	margin-top:15px;
	margin-left:30px;
	width:15rem;
	justify-content:center;
	cursor:pointer;
	}
	
	.btnsearch
	{
	background-color:#00FF00;
	color:black;
	font-size:13px;
	cursor:pointer;
	height:20px;
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
		Covid-19 Page Info
		</div>
		
		<div>
		<button class="btn1"><a href ="manage_covid_add.php">Add Articles</a></button>
		</div>
		
		<div>
		<form method="POST">
		<input type="text" name="valuesearch" placeholder="Enter Description" class ="" style="margin-left:800px; margin-top:20px;">
		<input type="submit" name="btnsearch" value="search" class ="btnsearch">
		</form>
		</div>
		
		<div class ="divform">
			<div>
				<table>
					<thead>
						<tr>
							<th>Action</th>
							<th>ID</th>
							<th>Title</th>
							<th>Subtitle</th>
							<th>Description</th>
							<th>Img</th>
							<th>Ref</th>
							<th>Button</th>
							<th>Display</th>
						</tr>
					</thead>
			<?php
			include 'connection.php';
			
			if(isset($_POST['btnsearch']))
			{
				$valuesearch = $_POST['valuesearch'];
				$result = mysqli_query($connect, "SELECT * FROM `covid` WHERE `description` LIKE'%$valuesearch%'");
			}
			else
			{
				$result = mysqli_query($connect, "SELECT * FROM covid");
			}
		
			while($row = mysqli_fetch_assoc($result))
			{
			?>		
					<tbody>
						<tr>
							<td><a href ="manage_covid_edit.php?edit&id=<?php echo $row["id"];?>"><i class="fa fa-edit"></i></a></td>
							<td><?php echo $row["id"];?></td>
							<td style ="max-width:180px; overflow:hidden; white-space:nowrap; text-overflow:ellipsis;"><?php echo $row["title"];?></td>
							<td style ="max-width:200px; overflow:hidden; white-space:nowrap; text-overflow:ellipsis;"><?php echo $row["subtitle"];?></td>
							<td style ="max-width:250px; overflow:hidden; white-space:nowrap; text-overflow:ellipsis;"><?php echo $row["description"];?></td>
							<td><?php echo $row["img"];?></td>
							<td style ="max-width:200px; overflow:hidden; white-space:nowrap; text-overflow:ellipsis;"><?php echo $row["ref"];?></td>
							<td><?php echo $row["button"];?></td>
							<td><?php echo $row["display"];?></td>
						</tr>
					</tbody>
			<?php
			}
			?>
					
				</table>
			</div>
		</div>
	</div>
</body>
</html>