<?php
$dbServerName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "payment_system";

$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);
// The amounts of products to show on each page

$limit = 4;
$query = "SELECT * FROM doctors";
$result = mysqli_query($conn, $query);
$number_of_results = mysqli_num_rows($result);

$total_pages = ceil($number_of_results/$limit);

if(!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET["page"];
}

$starting_limit = ($page-1) * $limit;

$display = "SELECT * FROM doctors ORDER BY DoctorID DESC LIMIT " . $starting_limit . ',' . $limit;
$result = mysqli_query($conn, $display);

$total_products = $number_of_results;

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Member consult doctor</title>
		<link href="css/shopstyle.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
        <header>
            <div class="content-wrapper">
                <h1>View Consultation Doctors</h1>
                <nav>
                    <a href="index.php">Home</a>
                    <a href="index.php?page=products">Products</a>
                </nav>
                
            </div>
        </header>
<main>
<div class="products content-wrapper">
    <h1>View Consultation Doctors</h1>
    <p><?=$total_products?> Doctors</p>
    <div class="products-wrapper">
        <?php while($product = mysqli_fetch_assoc($result)) { ?>
        <a href="doc_con_info.php?page=doctors&DoctorID=<?=$product['DoctorID']?>" class="product">
            <img src="<?=$product['dp']?>" width="220" height="240" alt="<?=$product['D_Name']?>">
            <span class="name">Dr. <?=$product['D_Name']?></span>
            <span class="email"><?=$product['Email']?></span>
			<span class="price"><?=$product['Hpnum']?></span>
        </a>
        <?php } ?>
    </div>
    <div class="buttons">
        <?php if ($page > 1){ ?>
        <a href="member_condoc_list.php?page=<?php echo $page-1; ?>">Prev</a>
        <?php } else { ?>
        <a href="member_condoc_list.php?page=<?php echo $page+1; ?>">Next</a>
        <?php } ?>
    </div>
</div>

</main>
        <script src="script.js"></script>
    </body>
</html>