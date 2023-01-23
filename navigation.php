<?php

if(!isset($_SESSION['logged'])){  //Not login
	?>
	<div class = "container">
		    <a href="login.php"></a>
            <img src="images/LOGO ASWELL.png" alt="nav logo" width="385" height="85px" style="position:absolute;">
			<nav class="nav">
			<ul>
			<li><a href="login.php">Login</a></li>
			</ul>
			</nav>
        </div>
<?php
}
?>
	
 <?php
		
		if(isset($_SESSION['type'])) { //if cfo login
		if($_SESSION['type']=='cfo')	{
 ?>
 <div class = "container">
		    <a href="cfo_home.php">			
			<nav class="nav">
                <ul>
                    <li><a href="cfo_home.php">Home</a></li>
                    <li class = "dropdown"> 
					<button class = "dropbtn">Menu 
					<i class="fa fa-caret-down"></i>
					</button>
					<div class = "dropdown-content">
                        <a href ="logout.php">Log Out</a>
                    </div></li>
					<li>CFO</li>
                </ul>
            </nav>
        </div>
 <?php
		} }

		if(isset($_SESSION['type'])) { //if accountant login
			if($_SESSION['type']=='accountant')	{
 ?>
 <div class = "container">
		    <a href="company_home.php">			
			<nav class="nav">
                <ul>
                    <li><a href="company_home.php">Home</a></li>
                    <li class = "dropdown"> 
					<button class = "dropbtn">Menu 
					<i class="fa fa-caret-down"></i>
					</button>
					<div class = "dropdown-content">
                        <a href ="logout.php">Log Out</a>
                    </div></li>
					<li>Accountant</li>
                </ul>
            </nav>
        </div>
 <?php
		} }
?>

<?php 
	if(isset($_SESSION['type'])) { //if vendor login
		if($_SESSION['type']=='vendor')	{
?>
<div class = "container">
		    <a href="vendor_home.php">			
			<nav class="nav">
                <ul>
                    <li><a href="vendor_home.php">Home</a></li>
                    <li class = "dropdown"> 
					<button class = "dropbtn">Menu 
					<i class="fa fa-caret-down"></i>
					</button>
					<div class = "dropdown-content">
                        <a href ="logout.php">Log Out</a>
                    </div></li>
					<li>Vendor</li>
                </ul>
            </nav>
        </div>
 <?php
		} }
?>

<?php 
	if(isset($_SESSION['type'])) { //if vendorManager login
		if($_SESSION['type']=='vmanager')	{
?>
<div class = "container">
		    <a href="vendorManager_home.php">			
			<nav class="nav">
                <ul>
                    <li><a href="vendorManager_home.php">Home</a></li>
                    <li class = "dropdown"> 
					<button class = "dropbtn">Menu 
					<i class="fa fa-caret-down"></i>
					</button>
					<div class = "dropdown-content">
                        <a href ="logout.php">Log Out</a>
                    </div></li>
					<li>Vendor Manager</li>
                </ul>
            </nav>
        </div>
 <?php
		} }
?>