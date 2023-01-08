<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "fyp");
$email = "";
$name = "";

if(isset($_POST['logbtn'])){
	$username = $_POST['username'];
	//$email = $_POST['email'];
	$pass = $_POST['password'];
	$type = $_POST['type'];
	
	// 	if($type == 'admin'){   // if admin
	// 	$users = mysqli_query($connect,"SELECT * FROM admin WHERE email = '$email' AND password = '$pass'");
	// 	if(mysqli_num_rows($users)>0){
	// 		$user = mysqli_fetch_assoc($users);
	// 		$_SESSION['logged'] = 'true';
	// 		$_SESSION['type'] = 'admin';
	// 		$_SESSION['id'] = $user['AdminID'];
	// 		$_SESSION['email'] = $user['email'];
	// 		header('Location:admin_home.php');
			
	// 	}else{
	// 		?>
	// 		<script type="text/javascript">
	// 			alert("Account not available!");
	// 		</script>
	// 		<?php
	// 	}
	// }
	// if($type == 'doctor'){  // if doctor
	// 	$users = mysqli_query($connect,"SELECT * FROM doctors WHERE Email = '$email' AND Password = '$pass'  AND Status = 'Active' ");
	// 	if(mysqli_num_rows($users)==0){
	// 		?>
	// 		<script type="text/javascript">
	// 			alert("Account not available!");
	// 		</script>
	// 		<?php
	// 	}else{
	// 	$user = mysqli_fetch_assoc($users);
	// 		//Set session data

	// 		$_SESSION['logged'] = 'true';
	// 		$_SESSION['type'] = 'doctor';
	// 		$_SESSION['id'] = $user['DoctorID'];
	// 		$_SESSION['email'] = $user['email'];
	// 		header('Location:doctor_home.php');
	// 	}
			
	// }
	if($type =='cfo'){
		$users = mysqli_query($connect,"SELECT * FROM cfo WHERE C_Username = '$username' AND password = '$pass'");
		if(mysqli_num_rows($users)==0){
			?>
			<script type="text/javascript">
				alert("Account not available!");
			</script>
			<?php
		}else{
			$user = mysqli_fetch_assoc($users);

			 $_SESSION['logged'] = 'true';
			 $_SESSION['type'] = 'cfo';
			 $_SESSION['id'] = $user['cfoID'];
			 header('Location:cfo_home.php');
		}
	}
	
			
}
?>