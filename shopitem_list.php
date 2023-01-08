<?php require_once "controllerUserDocData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Shop Item List</title>
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
	margin-top:20px!important;
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
	color:grey;
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
	
	.fa-trash{
	color: black;
	font-size:20px;
	margin-left:15px;
	}
	
	.fa-eye{
	color:#0000FF;
	font-size:20px;
	margin-right:15px;
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
	width:10rem;
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
	
	::placeholder{
	height:17px;
	width:140px;
	border: 1px solid lightgrey;
	}
	
	td{
	font-size:11px;
	color:black;
	}
	</style>
</head>

<script type="text/javascript">

function confirmation()
{
	answer=confirm("Do you want to delete this item?");
	return answer;
}

<?php
if (isset($_GET["del"]))
{
	include 'connection.php';
	$id = $_GET["ItemID"];
	mysqli_query($connect,"DELETE FROM shop WHERE ItemID = '$id'");
	
	header( "refresh:0.5; url=shopitem_list.php" );
}

?>

</script>

<body>
	<header>
		<?php 
		include "navigation.php"; 
		?>
	</header>
	
	<div><h1>Item List</h1></div>
	
	<div class ="form" method="POST">
		<div class ="title">
		Shop Item Listing
		</div>
		
		<div>
		<button class="btn1"><a href ="shopitem_list_add.php">Add New</a></button>
		</div>
		
		<div>
		<form method="POST">
		<input type="text" name="valuesearch" placeholder="Enter Item Name" class ="" style="margin-left:800px; margin-top:20px;">
		<input type="submit" name="btnsearch" value="search" class ="btnsearch">
		</form>
		</div>
		
		<div class ="divform">
			<div>
				<table>
					<thead>
						<tr>
							<th>Action</th>
							<th>ItemID</th>
							<th>ItemName</th>
							<th>ItemDesc</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>ItemImg</th>
							<th>PrescriptRequire</th>
							<th>ItemDisplay</th>
						</tr>
					</thead>
			<?php
			include 'connection.php';
			
			if(isset($_POST['btnsearch']))
			{
				$valuesearch = $_POST['valuesearch'];
				$result = mysqli_query($connect, "SELECT * FROM `shop` WHERE `ItemName` LIKE'%$valuesearch%' ORDER BY ItemID DESC");
			}
			else
			{
				$result = mysqli_query($connect, "SELECT * FROM shop");
			}
			
			while($row = mysqli_fetch_assoc($result))
			{
			?>		
					<tbody>
						<tr>
							<td><a href="shopitem_list_view.php?view&ItemID=<?php echo $row["ItemID"];?>"><i class="fa fa-eye"></i></a><a href ="shopitem_list_edit.php?edit&ItemID=<?php echo $row["ItemID"];?>"><i class="fa fa-edit"></i></a><a href="shopitem_list.php?del&ItemID=<?php echo $row["ItemID"];?>" onclick="return confirmation()";><i class ="fa fa-trash"></i></a></td>
							<td><?php echo $row["Code"];?><?php echo $row["ItemID"];?></td>
							<td style ="max-width:100px; overflow:hidden; white-space:nowrap; text-overflow:ellipsis;"><?php echo $row["ItemName"];?></td>
							<td style ="max-width:180px; overflow:hidden; white-space:nowrap; text-overflow:ellipsis;"><?php echo $row["ItemDesc"];?></td>
							<td><?php echo $row["Quantity"];?></td>
							<td><?php echo $row["Price"];?></td>
							<td style ="max-width:180px; overflow:hidden; white-space:nowrap; text-overflow:ellipsis;"><?php echo $row["ItemImg"];?></td>
							<td><?php echo $row["PrescriptRequire"];?></td>
							<td><?php echo $row["ItemDisplay"];?></td>
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