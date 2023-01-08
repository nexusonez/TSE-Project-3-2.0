<?php require_once "controllerUserDocData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>View Orders</title>
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
	font-size:15px!important;
	color:grey;
	background:#fff;
	border-radius:2px;
	border:1px solid #f2f2f2!important;
	line-height:25px;
	padding: 0 14px!important;
	text-transform:none;
	}
	
	.fa-edit{
	color: #63c76a;
	margin-left:15px;;
	font-size:20px;
	}
	
	
	.fa-eye{
	color:#0000FF;
	font-size:20px;
	}
	
	.btn, .btn1 {
	margin:0 auto;
	display:flex;
	font-size:20px;
	background:#ff0000;
    height:30px;
	position:relative;
	margin-top:20px;
	margin-left:800px;
	color:white!important;
	width:7rem;
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
		Members Order Items
		</div>
		
		
		<div class ="divform">
			<div>
				<table>
					<thead>
						<tr>
							<th>OrderID</th>
							<th>ItemID</th>
							<th>Quantity</th>
							<th>Item Name</th>
							<th>Item Price</th>
						</tr>
					</thead>
			<?php
			include 'connection.php';
			
			if(isset($_GET['view']))
		{
			$id = $_GET["order_id"];
			$result = mysqli_query($connect, "SELECT * FROM order_list WHERE order_id='$id'");
		}
			
			while($row = mysqli_fetch_assoc($result))
			{
			?>		
					<tbody>
						<tr>
							<td style="width:30px;"><?php echo $row["order_id"];?></td>
							<td style ="width:130px; overflow:hidden; text-overflow:ellipsis;"><?php echo $row["item_id"];?></td>
							<td style ="width:130px; overflow:hidden; text-overflow:ellipsis;"><?php echo $row["quantity"];?></td>
							<td style ="width:400px; overflow:hidden; text-overflow:ellipsis;"><?php echo $row["ItemName"];?></td>
							<td><?php echo $row["itemPrice"];?></td>
						</tr>
					</tbody>
			<?php
			}
			if(mysqli_num_rows($result)==0){
			?>
			<i>NO Order Available</i>
			<?php }
			?>
					
				</table>
			</div>
		</div>
	</div>
	
	<div>
		<button class="btn1"><a href ="view_orders.php">Exit</a></button>
	</div>
	
</body>
</html>