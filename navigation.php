<?php

if(!isset($_SESSION['logged'])){  //Not login
	?>
	<div class = "container">
		    <a href="admin_login.php"></a>
            <img src="images/LOGO ASWELL.png" alt="nav logo" width="385" height="85px" style="position:absolute;">
			<nav class="nav">
			<ul>
			<li><a href="admin_login.php">Login</a></li>
			</ul>
			</nav>
        </div>
<?php
}
?>
	
<?php 
		if(isset($_SESSION['type']) ){
		if($_SESSION['type']=='admin')	{//Admin login                 
		?>
		 <div class = "container">
		    <a href="admin_home.php">
            <img src="images/LOGO ASWELL.png" alt="nav logo" width="385px" height="85px" style="margin-left:-2%;">
			
			<nav class="nav">
                <ul>
                    <li class = "dropdown"> 
					<button class = "dropbtn">Administrative 
					<i class="fa fa-caret-down"></i>
					</button>
					<div class = "dropdown-content" style ="margin-left:50px;">
                        <a href ="shopitem_list.php">Sales Item</a>
                        <a href ="prescription_admin.php">Prescription</a>
						<a href ="consultation_admin.php">Consultation</a>
						<a href ="manage_covid.php">Covid-19</a>
                    </div></li>
					<li class = "dropdown"> 
					<button class = "dropbtn">Transaction 
					<i class="fa fa-caret-down"></i>
					</button>
					<div class = "dropdown-content">
                        <a href ="view_orders.php">Customer Transaction</a>
                    </div></li>
					<li class = "dropdown"> 
					<button class = "dropbtn">Maintenance 
					<i class="fa fa-caret-down"></i>
					</button>
					<div class = "dropdown-content" style ="margin-left:20px;">
                        <a href ="member_list.php">Member List</a>
                        <a href ="admin_list.php">Admin List</a>
						<a href ="doctor_list.php">Doctor List</a>
                    </div></li>
                    <li class = "dropdown"> 
					<button class = "dropbtn">Menu 
					<i class="fa fa-caret-down"></i>
					</button>
					<div class = "dropdown-content">
                        <a href ="logout.php">Log Out</a>
                    </div></li>
					<li>Admin</li>
                </ul>
            </nav>
        </div>
<?php
} }
		if(isset($_SESSION['type'])) { //if doctor login
		if($_SESSION['type']=='doctor')	{
 ?>
 <div class = "container">
		    <a href="doctor_home.php">
            <img src="images/LOGO ASWELL.png" alt="nav logo" width="385" height="85px" style="margin-left:-2%;">
			
			<nav class="nav">
                <ul>
                    <li><a href="doctor_home.php">Home</a></li>
					<li><a href="doctor_view_profile.php">Profile</a></li>
					<li><a href="prescription.php">Prescription</a></li>
					<li><a href="consultation_doctor.php">Consultation</a></li>
                    <li class = "dropdown"> 
					<button class = "dropbtn">Menu 
					<i class="fa fa-caret-down"></i>
					</button>
					<div class = "dropdown-content">
                        <a href ="logout.php">Log Out</a>
                    </div></li>
					<li>Doctor</li>
                </ul>
            </nav>
        </div>
 <?php
		} }
		
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
		
 ?>