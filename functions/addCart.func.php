<?php 

$dbServerName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "fyp";

$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {


    $quantity = mysqli_real_escape_string($conn, $_POST["quantity"]);
    $userID = intval("1");
    $itemID = mysqli_real_escape_string($conn, $_POST["itemID"]);
	$itemName = mysqli_real_escape_string($conn, $_POST["itemName"]);

    if(empty($quantity) || $quantity < 1) {
        echo "<script>alert('Please Select A Quantity'); window.history.go(-1);</script>";
        exit();
    }

    $sql = "INSERT INTO cart(item_id, user_id, itemName, quantity) VALUES ('$itemID', '$userID', '$itemName', '$quantity')";
    
    if(!mysqli_query($conn, $sql)) {
        echo "<script>alert('Failed To Add Cart'); window.history.go(-1);</script>";
        // echo $sql;
        exit();
    } 

    echo "<script>alert('Cart Added Successfully'); window.location.href='../cart.php';</script>";
    exit();
   
    mysqli_close($conn);
}
 

?>
