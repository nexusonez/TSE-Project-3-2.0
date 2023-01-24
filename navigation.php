<?php

if(!isset($_SESSION['logged'])){  //Not login
	?>
	<div class = "container">
		    <a href="login.php"><h1 style ="position:absolute; top:15px;">Group 1 Payment System</h1></a>
			<!-- need different image -->
            <!-- <img src="" alt="nav logo" width="385" height="85px" style="position:absolute;"> -->
			<nav class="nav">
			<ul>
			<li><a href="login.php" style="position:relative;">Login</a></li>
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
		    <a href="cfo_home.php"><h1 style ="position:absolute; top:15px;">Group 1 Payment System</h1></a>		
			<nav class="nav">
                <ul>
					<li><a href ="cfo_submitPayment.php">Submit Payment</a></li>
					<li><a href ="cfo_viewInvoiceHistory.php">View Invoice</a></li>
					<li><a href ="logout.php">Log Out</a></li>
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
		    <a href="company_home.php"><h1 style ="position:absolute; top:15px;">Group 1 Payment System</h1></a>		
			<nav class="nav">
                <ul>
                    <li><a href ="company_viewReceipt.php">View Receipt</a></li>
					<li><a href ="company_viewInvoice.php">View Invoice</a></li>
					<li><a href ="logout.php">Log Out</a></li> 
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