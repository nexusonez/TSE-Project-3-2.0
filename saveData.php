<?php
$data = json_decode($_POST['data']);
$productName = $data->productName;
$price = $data->price;
$quantity = $data->quantity;
$totalPrice = $data->totalPrice;

// Save data to database or file

echo "Data saved successfully!";
?>