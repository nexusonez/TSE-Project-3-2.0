<?php 

$dbServerName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "fyp";

$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $userID = "1";
    $total_price = mysqli_real_escape_string($conn, $_POST["total_price"]); 

    $sqlCheckQuantity = "SELECT * FROM cart WHERE user_id = '$userID'";
    $resultQuantity = mysqli_query($conn, $sqlCheckQuantity);

    $sqlCart = "SELECT * FROM cart WHERE user_id = '$userID'";
    $resultCart = mysqli_query($conn, $sqlCart);

    while($cart = mysqli_fetch_assoc($resultQuantity)) {
        $item_id = $cart["item_id"];

        $sqlShop = "SELECT ItemID, Quantity FROM shop WHERE ItemID = '$item_id'";
        $resultShop = mysqli_query($conn, $sqlShop);
        $row = mysqli_fetch_assoc($resultShop);
            
        if($cart["quantity"] > $row["Quantity"]) {
            $quantity = $row["Quantity"];
            $msg = "There is only " . $quantity . " left";
            echo "<script>alert('$msg'); window.history.go(-1);</script>";
            exit();
        }
    }

    $sql = "INSERT INTO orders(amount_paid, user_id) VALUES ('$total_price', '$userID');";

    if(!mysqli_query($conn, $sql)) {
        echo "<script>alert('Payment Failed. Please Try Again.'); window.history.go(-1);</script>";
        exit();
    } else {
   
        $sqlOrderList = "";
        
        while($rowCart = mysqli_fetch_assoc($resultCart)) {
          
            $itemID = $rowCart["item_id"];
            $itemQuantity = $rowCart["quantity"];
			$itemname = $rowCart["itemName"];

            $last_id = $conn->insert_id;

            $sqlOrderList .= "INSERT INTO order_list (order_id, item_id, quantity, ItemName) 
            VALUES ('$last_id', '$itemID', '$itemQuantity', '$itemname');";

            $sqlOrderList .= "UPDATE shop SET Quantity =  Quantity - $itemQuantity WHERE ItemID = '$itemID';";
        }

        $sqlOrderList .= "DELETE FROM cart WHERE user_id = '$userID';";
			

        if(!mysqli_multi_query($conn, $sqlOrderList)) {
            echo "<script>alert('Payment Failed. Please Try Again.'); window.history.go(-1);</script>";
            exit();
        }

        // echo $sqlOrderList;

        echo "<script>alert('Payment Success'); window.location.href='transaction.php';</script>";
        exit();
    }


    mysqli_close($conn);
    
}


?>
