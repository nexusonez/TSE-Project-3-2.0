<?php
$dbServerName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "payment_system";

$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

$sql = "SELECT totalPrice FROM product WHERE totalPrice = null";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // Perform an action for each row
        $price = $row["price"];
        $quantity = $row["quantity"];
        // Do something with the column value
        $totalPrice = multiply($price,$quantity);
        $sql = "UPDATE product SET totalPrice = $totalPrice";
    }
} else {
    echo "0 results";
}

if ($conn->query($sql) === TRUE) {
    echo "nice";
    //echo "<script>alert('total price has been updated successfully'); window.location.href='../vendor_submitInvoice.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    //echo "<script>alert('total price update failed'); window.location.href='../vendor_submitInvoice.php';</script>";

}

mysqli_close($conn);

?>