<?php
$user="root";
$pass='';
$pdo = new PDO('mysql:host=localhost;dbname=fyp', $user, $pass);
$id=$_GET["DoctorID"];

// Check to make sure the id parameter is specified in the URL
if (!isset($_GET['DoctorID'])) {
	 // Simple error to display if the id wasn't specified
    exit('Doctor does not exist1!');
} else {
	// Prepare statement and execute, prevents SQL injection
    $stmt = $pdo->prepare("SELECT * FROM doctors WHERE DoctorID = '$id'");
    $stmt->execute();
    // Fetch the product from the database and return the result as an Array
    $products = $stmt->fetchAll();
    // Check if the product exists (array is not empty)
	if(empty($products)) {
		// simple error to display if the id for the product doesn't exists (array is empty)
        exit('Doctor does not exist!');
	}
	foreach($products as $product) {	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Consult Doctor info</title>
		<link href="css/shopstyle.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
        <main>
				
<div class="product content-wrapper">
    <img src="<?php echo $product['dp']; ?>" width="400" height="400" alt="<?php echo $product['D_Name']; ?>">
    <div>
        <h1 class="name">Dr <?php echo $product['D_Name']; ?></h1>
        <span class="price">
            Email: <?php echo $product['Email']; ?>
        </span>
        <form action="consultation_payment.php?view&DoctorID=<?php echo $product['DoctorID']?>" method="post">
            <input type="hidden" name="itemID" value="<?php echo $product['ItemID']; ?>">
			<input type="hidden" name="doctorname" value="<?php echo $product['D_Name']; ?>">
            <input type="submit" value="Book Consultation">
        </form>
		<div class="description">
            Phone Number <?php echo $product['Hpnum']; ?>
        </div>
		<br>
        <div class="description">
            <?php echo $product['Description']; ?>
        </div>
		
		
    </div>
</div>

</main>
        <script src="script.js"></script>
    </body>
</html>
<?php } }?>
