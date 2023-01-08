<?php 

$dbServerName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "fyp";

$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $quantity = mysqli_real_escape_string($conn, $_POST["quantity"]);
    $cartID = mysqli_real_escape_string($conn, $_POST["cart_id"]);

    if(empty($quantity) || $quantity < 1) {
        echo "<script>alert('Please Enter A Minimum of 1 Quantity'); window.history.go(-1);</script>";
        exit();
    }

    $sql = "UPDATE cart SET quantity = '$quantity' WHERE cart_id = '$cartID'";
    
    if(!mysqli_query($conn, $sql)) {
        echo "<script>alert('Failed To Update Cart'); window.history.go(-1);</script>";
        exit();
    } else {
        echo "<script>alert('Cart Updated Successfully'); window.location.href='../cart.php';</script>";
        exit();
    }
   
    mysqli_close($conn);
}


?>
