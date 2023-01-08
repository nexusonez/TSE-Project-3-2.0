<?php
session_start();
include 'connection.php';

$result = mysqli_query($connect, "SELECT * FROM covid");

$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Covid-19</title>
 <link rel="stylesheet" href="css/style.css"> <!-- css files-->
	
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> <!-- font awesome-->
    <style>
	
	.stats{
	width: 100%;
	z-index: 1;
	border-radius:24px;
	padding:2%;
	box-shadow: 0px 10px 6px -8px rgba(0,0,0,0.75);
	height:200px;
	margin-top:110px;
	background-color: lightgrey;
	}
	
	.latest-report{
	display: flex;
	justify-content: space-between;
	align-items: center;
	width:80%;
	margin: 0 auto;
	padding-top:20px;
	color: black;
	}
	
	.country{
	margin-top:5px;
	text-align:center;
	}
	
	.board{
	height:100px;
	}
	
	.name{
	font-size:50px;
	color:blue;
	font-weight:bold;
	font-family:Agency FB;
	}
	
	.title{
	font-size:35px;
	font-weight:bold;
	font-family: Agency FB;
	}
	
	.total-cases .value{
	font-size: 30px;
	font-weight: bold;
	font-family: Agency FB;
	}
	
	.recovered .value{
	font-size: 30px;
	font-weight: bold;
	color:green;
	font-family: Agency FB;
	}
	
	.deaths .value{
	font-size: 30px;
	font-weight: bold;
	color: #F44336;
	font-family: Agency FB;
	}
	
	.chart{
	width: 80%;
	height: 70vh;
	min-height: 500px;
	margin: 0 auto;
	padding; 50px 0;
	margin-top:200px;
	color:black;
	background-color:lightgrey;
	
	}
	
	img#flag{
	height:50px;
	width:100px;
	}
	
	h1{
	font-size:60px;
	font-weight:bold;
	color:black;
	font-family:Agency FB;
	margin-top:100px; 
	text-align: center
	}
	
	
	.prevent .box-contain{
	display:flex;
	align-items: center;
	justify-content: center;
	flex-wrap: wrap;
	}
	
	.prevent .box-contain .box{
	flex: 1 1 30rem;
	border-radius: .5rem;
	margin: 4rem;
	padding:1rem;
	text-align: center;
	margin-top:-10px;
	word-wrap: break-word;
	inline-size: 380px;
	}
	
	.prevent .box-contain .box img{
	height: 15rem;
	padding:0.5rem;
	margin-bottom:5px;
	}
	
	.prevent .box-contain .box h2{
	margin-bottom:5px;
	color:blue;
	font-size: 2.5rem;
	font-family:Agency FB;
	font-weight:bold;
	}
	
	.prevent .box-contain .box p{
	color:darkblue;
	font-size: 2rem;
	font-family:Agency FB;
	font-weight:bold;
	}
	
	.symptoms{
	margin-top:-50px;
	}
	
	.symptoms .column{
	display:flex;
	align-items: center;
	justify-content:center;
	margin-top:-70px;
	}
	
	.symptoms .column .main-img img{
	width:700px;
	height:700px;
	position:relative;
	}
	
	.symptoms .column .box-contain{
	display:flex;
	align-items: center;
	justify-content: center;
	flex-wrap: wrap;
	}
	
	.symptoms .column .box-contain .box{
	margin: 3.5rem;
	text-align: center;
	}
	
	.symptoms .column .box-contain .box img{
	width: 18rem;
	padding: 1rem;
	}
	
	.symptoms .column .box-contain .box h2{
	margin-top:5px;
	font-size: 3rem;
	color:blue;
	font-family: Agency FB;
	font-weight: bold;
	}
	
	.precautions{
	margin-top:-50px;
	}
	
	.precautions .column{
	margin-top:-5px;
	display:flex;
	justify-content:center;
	flex-wrap: wrap;
	}
	
	.precautions .column .box-contain{
	margin:1.5rem;
	flex: 1 1 50rem;
	border: .1rem solid rgba(0,0,0,.1)!important;
	border-shadow:0 .5rem 1rem rgba(0,0,0,.1);
	border-radius: .5rem;
	margin-left:70px;
	margin-right:70px;
	}
	
	.precautions .column .box-contain h2{
	padding: 1rem;
	text-align: center;
	font-size:2.5rem;
	background:blue;
	color:white;
	font-family: Agency FB;
	font-weight:bold;
	}
	
	.precautions .column .box-contain:last-child h2{
	background:red;
	
	}
	
	.precautions .column .box-contain .box{
	display:flex;
	justify-content:center;
	align-items:center;
	padding:0.5rem;
	}
	
	.precautions .column .box-contain .box img{
	width:15rem;
	padding:1rem;
	}
	
	.precautions .column .box-contain .box h3{
	font-size:2.5rem;
	color:var(--blue);
	font-family:Agency FB;
	font-weight: bold;
	}
	
	.precautions .column .box-contain .box p{
	font-size: 1.5rem;
	color:darkblue;
	padding: 1rem 0;
	font-family: Agency FB;
	font-weight: bold;
	}
	
	.btn{
	margin:0 auto;
	display:flex;
	font-family: Agency FB;
	font-size:30px;
	background:blue;
    border-radius: 20px;
	
    color: white;
	cursor:pointer;
	width:18%;
	padding-left:15px;
	}
	
	.btn:hover{
	background:white;
	color:blue;
	}
	
	
	.form .column{
	background-color:#ECEAEA;
	display: flex;
	margin: 0.5rem;
	flex-wrap:wrap;
	overflow:hidden;
	display:grid;
	grid-template-columns: repeat(3,1fr);
	}
	
	.form .column .box-contain{
	margin:1.5rem;
	flex: 2rem;
	margin-left:100px;
	position:relative;
	}
	
	.form .column .box-contain .box{
	word-wrap: break-word;
	inline-size: 380px;
	display:inline-block;
	
	}
	
	.form .column .box-contain .box img{
	width: 35rem;
	height:20rem;
	border-radius:15px;
	}
	
	.form .column .box-contain .box .btn, .form .column .box-contain .box .btn a{
	
	display:inline;
	font-family: Agency FB;
	font-size:25px;
	background:blue;
    border-radius: 20px;
    color: white;
	cursor:pointer;
	width:auto;
	padding-right:5px;
	
	}
	
	.form .column .box-contain .box h2{
	font-size:2.5rem;
	font-family: Agency FB;
	font-weight: bold;
	padding:.5rem 0;
	}
	
	.form .column .box-contain .box p{
	font-size:2rem;
	font-family:Agency FB;
	font-weight:bold;
	padding:.5rem 0;
	
	}
	</style>
</head>
<body>

<!-- main design for web-->
    <header>
        <div class = "container">
		    <a href="Homepage.html">
            <img src="images/LOGO ASWELL.png" alt="nav logo" width="385" height="85px" style="margin-left:-2%;">
			
			<nav class="nav">
                <ul>
                    <li><a href="#home">About</a></li>
                    <li><a href="#about">Covid-19</a></li>
                    <li><a href="onlinepharmacy.html">Online Pharmacy</a></li>
                    <li><a href="#consult">Consult Doctors</a></li>
                    <li class = "dropdown"> 
					<button class = "dropbtn">More 
					<i class="fa fa-caret-down"></i>
					</button>
					<div class = "dropdown-content">
                        <a href ="#login.html">Account</a>
                        <a href ="#Item2">Forum</a>
                        <a href ="#Item3">Articles</a>
                      </div></li>
                </ul>
            </nav>
        </div>
		
    </header>
	
		<div class ="stats">
			
				<div class="country">
					<div class ="name">Covid-19 Cases In Malaysia  <img src="" id="flag"></div>
				</div>
				<div class ="latest-report">
				<div class="total-cases">
					<div class ="title">Total Cases <i class="fa fa-exclamation-circle"></i></div>
					<div class ="value"><span id="cases">0</span></div>
				</div>
				<div class="recovered" style="color:green;">
					<div class ="title">Recovered <i class="fa fa-check-square"></i></div>
					<div class ="value"><span id="recovered">0</span></div>
				</div>
				<div class="deaths" style="color:red;">
					<div class ="title">Deaths <i class="fa fa-times-circle"></i></div>
					<div class="value"><span id="deaths">0</span></div>
				</div>
			</div>
			<!---
			<div class ="chart">
				<canvas id="axes_line_chart"></canvas>
				
			</div>
			-->
		</div>
		
	<div class ="prevent">
		<h1><?php echo $row["title"]?></h1>
		
		<div class="box-contain">
			<div class ="box">
				<img src="<?php echo $row["img"]?>" alt="">
				<h2><?php echo $row["subtitle"]?></h2>
				<p><?php echo $row["description"]?></p>
			</div>
			
		<?php 
		$result = mysqli_query($connect, "SELECT * FROM covid WHERE id='2'");

		$row = mysqli_fetch_assoc($result);
		?>
		
			<div class ="box">
				<img src="<?php echo $row["img"]?>" alt="">
				<h2><?php echo $row["subtitle"]?></h2>
				<p><?php echo $row["description"]?></p>
			</div>
		
		<?php 
		$result = mysqli_query($connect, "SELECT * FROM covid WHERE id='3'");

		$row = mysqli_fetch_assoc($result);
		?>
		
			<div class ="box">
				<img src="<?php echo $row["img"]?>" alt="">
				<h2><?php echo $row["subtitle"]?></h2>
				<p><?php echo $row["description"]?></p>
			</div>
		
		<?php 
		$result = mysqli_query($connect, "SELECT * FROM covid WHERE id='4'");

		$row = mysqli_fetch_assoc($result);
		?>
		
			<div class ="box">
				<img src="<?php echo $row["img"]?>" alt="">
				<h2><?php echo $row["subtitle"]?></h2>
				<p><?php echo $row["description"]?></p>
			</div>
		
		<?php 
		$result = mysqli_query($connect, "SELECT * FROM covid WHERE id='5'");

		$row = mysqli_fetch_assoc($result);
		?>
		
			<div class ="box">
				<img src="<?php echo $row["img"]?>" alt="">
				<h2><?php echo $row["subtitle"]?></h2>
				<p><?php echo $row["description"]?></p>
			</div>
		
		<?php 
		$result = mysqli_query($connect, "SELECT * FROM covid WHERE id='6'");

		$row = mysqli_fetch_assoc($result);
		?>
		
			<div class ="box">
				<img src="<?php echo $row["img"]?>" alt="">
				<h2><?php echo $row["subtitle"]?></h2>
				<p><?php echo $row["description"]?></p>
			</div>
		
		</div>
	</div>
	
	<div class ="form">
	<?php 
		$result = mysqli_query($connect, "SELECT * FROM covid WHERE id='7'");

		$row = mysqli_fetch_assoc($result);
		?>
		
		<h1><?php echo $row["title"]?></h1>
		
		<div class="column">
		<?php 
		$result = mysqli_query($connect, "SELECT * FROM covid WHERE ref!='' AND display ='Yes'");

		while ($row = mysqli_fetch_assoc($result)){
		?>
			<div class="box-contain">
				<div class="box">
		
				<a href ="<?php echo $row["ref"]?>" target="_blank"><img src="<?php echo $row["img"]?>" alt=""></a>
				
				<h2><?php echo $row["subtitle"]?></h2>
				<p><?php echo $row["description"]?><p>
				<button class="btn"><a href="<?php echo $row["ref"]?>" target="_blank"><?php echo $row["button"]?></a></button>
				</div>
			</div>
		<?php } 
		?>
		</div>
	</div>
		
	<!--<div class ="symptoms">
		<h1>Common Covid-19 Symptoms</h1>
		
		<div class="column">
		
			<div class="main-img">
				<img src="images/personfever.png" alt="">
			</div>

			<div class="box-contain">
				<div class="box">
					<img src="images/cough.png" alt="">
					<h2>Cough</h2>
				</div>
			
				<div class="box">
					<img src="images/iconfever.png" alt="">
					<h2>Fever</h2>
				</div>
			
				<div class="box">
					<img src="images/loss-of-taste.png" alt="">
					<h2>Loss of taste or smell</h2>
				</div>
			
				<div class="box">
					<img src="images/sore-throat.png" alt="">
					<h2>Sore Throat</h2>
				</div>
			
				<div class="box">
					<img src="images/headache.png" alt="">
					<h2>Headache</h2>
				</div>
			
				<div class="box">
					<img src="images/diarrhea.png" alt="">
					<h2>Diarrhoea</h2>
				</div>
		
			</div>
		</div>
	</div>
	-->
	<div class ="precautions">
	
		<?php 
		$result = mysqli_query($connect, "SELECT * FROM covid WHERE id='10'");

		$row = mysqli_fetch_assoc($result);
		?>
		
		<h1><?php echo $row["title"]?></h1>
		
		<div class="column">
		
			<div class="box-contain">
				<h2><?php echo $row["subtitle"]?></h2>
				
				<?php 
				$result = mysqli_query($connect, "SELECT * FROM covid WHERE id='11'");

				$row = mysqli_fetch_assoc($result);
				?>
				
				<div class="box">
					<img src="<?php echo $row["img"]?>" alt="">
					<div class="info">
						<h3><?php echo $row["subtitle"]?></h3>
						<p><?php echo $row["description"]?></p>
					</div>
				</div>
				
				<?php 
				$result = mysqli_query($connect, "SELECT * FROM covid WHERE id='12'");

				$row = mysqli_fetch_assoc($result);
				?>
				<div class="box">
					<img src="<?php echo $row["img"]?>" alt="">
					<div class="info">
						<h3><?php echo $row["subtitle"]?></h3>
						<p><?php echo $row["description"]?></p>
					</div>
				</div>
				
				<?php 
				$result = mysqli_query($connect, "SELECT * FROM covid WHERE id='13'");

				$row = mysqli_fetch_assoc($result);
				?>
				
				<div class="box">
					<img src="<?php echo $row["img"]?>" alt="">
					<div class="info">
						<h3><?php echo $row["subtitle"]?></h3>
						<p><?php echo $row["description"]?></p>
					</div>
				</div>
			</div>
			
			<div class="box-contain">
				
				<?php 
				$result = mysqli_query($connect, "SELECT * FROM covid WHERE id='14'");

				$row = mysqli_fetch_assoc($result);
				?>
				
				<h2><?php echo $row["subtitle"]?></h2>
				
				<?php 
				$result = mysqli_query($connect, "SELECT * FROM covid WHERE id='15'");

				$row = mysqli_fetch_assoc($result);
				?>
				
				<div class="box">
					<img src="<?php echo $row["img"]?>" alt="">
					<div class="info">
						<h3><?php echo $row["subtitle"]?></h3>
						<p><?php echo $row["description"]?></p>
					</div>
				</div>
				
				<?php 
				$result = mysqli_query($connect, "SELECT * FROM covid WHERE id='16'");

				$row = mysqli_fetch_assoc($result);
				?>
				
				<div class="box">
					<img src="<?php echo $row["img"]?>" alt="">
					<div class="info">
						<h3><?php echo $row["subtitle"]?></h3>
						<p><?php echo $row["description"]?></p>
					</div>
				</div>
				
				<?php 
				$result = mysqli_query($connect, "SELECT * FROM covid WHERE id='17'");

				$row = mysqli_fetch_assoc($result);
				?>
				
				<div class="box">
					<img src="<?php echo $row["img"]?>" alt="">
					<div class="info">
						<h3><?php echo $row["subtitle"]?></h3>
						<p><?php echo $row["description"]?></p>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	
	<!--<div>
		<button class="btn">Shop Covid-19 Equipments</button>
	</div>
	-->
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" 
		 integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous" ></script>
	
		
		<script src="js/covid.js"></script>
	</body>
	</html>