<?php
session_start();
$dbServerName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "fyp";
$id = $_SESSION['MemberID'];
$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Consultation Payment</title>
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<style>
				* {
	box-sizing: border-box;
	font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
	font-size: 16px;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
}
html {
	height: 100%;
}
body {
	position: relative;
	min-height: 100%;
	color: #555555;
	background-color: #FFFFFF;
	margin: 0;
	padding-bottom: 100px; /* Same height as footer */
}
h1, h2, h3, h4, h5 {
	color: #394352;
}
.content-wrapper {
	width: 1050px;
	margin: 0 auto;
}
header {
	border-bottom: 1px solid #EEEEEE;
}
header .content-wrapper {
	display: flex;
}
header h1 {
	display: flex;
	flex-grow: 1;
	flex-basis: 0;
	font-size: 20px;
	margin: 0;
	padding: 24px 0;
}
header nav {
	display: flex;
	flex-grow: 1;
	flex-basis: 0;
	justify-content: center;
	align-items: center;
}
header nav a {
	text-decoration: none;
	color: #555555;
	padding: 10px 10px;
	margin: 0 10px;
}
header nav a:hover {
	border-bottom: 1px solid #aaa;
}
.link-icons {
	margin-top:5px;
	display: flex;
	flex-grow: 1;
	flex-basis: 0;
	justify-content: flex-end;
	align-items: center;
	position: absolute;
}
.link-icons a {
	text-decoration: none;
	color: #394352;
	padding: 0 10px;
}
.link-icons a:hover {
	color: #4e5c70;
}
.link-icons a i {
	font-size: 25px;
}
header .link-icons a span {
	display: inline-block;
	text-align: center;
	background-color: #63748e;
	border-radius: 50%;
	color: #FFFFFF;
	font-size: 12px;
	line-height: 16px;
	width: 16px;
	height: 16px;
	font-weight: bold;
	position: absolute;
	top: 22px;
	right: 0;
}
main .featured {
	display: flex;
	flex-direction: column;
	background-repeat: no-repeat;
	background-size: cover;
	height: 150px;
	align-items: center;
	justify-content: center;
	text-align: center;
}
main .featured h2 {
	display: inline-block;
	margin: 0;
	width: 1050px;
	font-family: Rockwell, Courier Bold, Courier, Georgia, Times, Times New Roman, serif;
	font-size: 68px;
	color: ;
	padding-bottom: 10px;
}
main .featured p {
	display: inline-block;
	margin: 0;
	width: 1050px;
	font-size: 24px;
	color:;
}
main .recentlyadded h2 {
	display: block;
	font-weight: normal;
	margin: 0;
	padding: 40px 0;
	font-size: 24px;
	text-align: center;
	width: 100%;
	border-bottom: 1px solid #EEEEEE;
}
main .recentlyadded .products, main .products .products-wrapper {
	display: flex;
	flex-wrap: wrap;
	align-items: center;
	justify-content: space-between;
	padding: 40px 0 0 0;
}
main .recentlyadded .products .product, main .products .products-wrapper .product {
	display: block;
	overflow: hidden;
	text-decoration: none;
	width: 25%;
	padding-bottom: 60px;
}
main .recentlyadded .products .product img, main .products .products-wrapper .product img {
	transform: scale(1);
	transition: transform 1s;
}
main .recentlyadded .products .product .name, main .products .products-wrapper .product .name {
	display: block;
	color: #555555;
	padding: 20px 0 2px 0;
}
main .recentlyadded .products .product .price, main .products .products-wrapper .product .price {
	display: block;
	color: #999999;
}
main .recentlyadded .products .product .rrp, main .products .products-wrapper .product .rrp {
	color: #BBBBBB;
	text-decoration: line-through;
}
main .recentlyadded .products .product:hover img, main .products .products-wrapper .product:hover img {
	transform: scale(1.05);
	transition: transform 1s;
}
main .recentlyadded .products .product:hover .name, main .products .products-wrapper .product:hover .name {
	text-decoration: underline;
}
main > .product {
	display: flex;
	padding: 40px 0;
}
main > .product > div {
	padding-left: 15px;
}
main > .product h1 {
	font-size: 34px;
	font-weight: normal;
	margin: 0;
	padding: 20px 0 10px 0;
}
main > .product .price {
	display: block;
	font-size: 22px;
	color: #999999;
}
main > .product .rrp {
	color: #BBBBBB;
	text-decoration: line-through;
	font-size: 22px;
	padding-left: 5px;
}
main > .product form {
	display: flex;
	flex-flow: column;
	margin: 40px 0;
}
main > .product form input[type="number"] {
	width: 400px;
	padding: 10px;
	margin-bottom: 15px;
	border: 1px solid #ccc;
	color: #555555;
	border-radius: 5px;
}
main > .product form input[type="submit"] {
	background: #4e5c70;
	border: 0;
	color: #FFFFFF;
	width: 400px;
	padding: 12px 0;
	text-transform: uppercase;
	font-size: 14px;
	font-weight: bold;
	border-radius: 5px;
	cursor: pointer;
}
main > .product form input[type="submit"]:hover {
	background: #434f61;
}
main > .products h1 {
	display: block;
	font-weight: normal;
	margin: 0;
	padding: 40px 0;
	font-size: 24px;
	text-align: center;
	width: 100%;
}
main > .products .buttons {
	text-align: right;
	padding-bottom: 40px;
}
main > .products .buttons a {
	display: inline-block;
	text-decoration: none;
	margin-left: 5px;
	padding: 12px 20px;
	border: 0;
	background: #4e5c70;
	color: #FFFFFF;
	font-size: 14px;
	font-weight: bold;
	border-radius: 5px;
}
main > .products .buttons a:hover {
	background: #434f61;
}
main .cart h1 {
	display: block;
	font-weight: normal;
	margin: 0;
	padding: 40px 0;
	font-size: 24px;
	text-align: center;
	width: 100%;
}
main .cart table {
	width: 100%;
}
main .cart table thead td {
	padding: 30px 0;
	border-bottom: 1px solid #EEEEEE;
}
main .cart table thead td:last-child {
	text-align: right;
}
main .cart table tbody td {
	padding: 20px 0;
	border-bottom: 1px solid #EEEEEE;
}
main .cart table tbody td:last-child {
	text-align: right;
}
main .cart table .img {
	width: 80px;
}
main .cart table .remove {
	color: #777777;
	font-size: 12px;
	padding-top: 3px;
}
main .cart table .remove:hover {
	text-decoration: underline;
}
main .cart table .price {
	color: #999999;
}
main .cart table a {
	text-decoration: none;
	color: #555555;
}
main .cart table input[type="number"] {
	width: 68px;
	padding: 10px;
	border: 1px solid #ccc;
	color: #555555;
	border-radius: 5px;
}
main .cart .subtotal {
	text-align: right;
	padding: 40px 0;
}
main .cart .subtotal .text {
	padding-right: 40px;
	font-size: 18px;
}
main .cart .subtotal .price {
	font-size: 18px;
	color: #999999;
}
main .cart .buttons {
	text-align: right;
	padding-bottom: 40px;
}
main .cart .buttons input[type="submit"] {
	margin-left: 5px;
	padding: 12px 20px;
	border: 0;
	background: #4e5c70;
	color: #FFFFFF;
	font-size: 14px;
	font-weight: bold;
	cursor: pointer;
	border-radius: 5px;
}
main .cart .buttons input[type="submit"]:hover {
	background: #434f61;
}
main .placeorder h1 {
	display: block;
	font-weight: normal;
	margin: 0;
	padding: 40px 0;
	font-size: 24px;
	text-align: center;
	width: 100%;
}
main .placeorder p {
	text-align: center;
}
footer {
	position: absolute;
	bottom: 0;
	border-top: 1px solid #EEEEEE;
	padding: 20px 0;
	width: 100%;
}
				</style>
	</head>
	<body>
        <header>
        <div class = "container">
		    <a href="Homepage.html">
            <img src="images/LOGO ASWELL.png" alt="nav logo" width="385" height="85px" style="margin-left:-2%;">
			
			<nav class="nav">
                <ul>
                    <li><a href="#home">About</a></li>
                    <li><a href="Covid-19.php">Covid-19</a></li>
                    <li><a href="onlinepharmacy.html">Online Pharmacy</a></li>
                    <li><a href="#consult">Consult Doctors</a></li>
                    <li class = "dropdown"> 
					<button class = "dropbtn">More 
					<i class="fa fa-caret-down"></i>
					</button>
					<div class = "dropdown-content">
                        <a href ="login.html">Account</a>
                        <a href ="#Item2">Forum</a>
                        <a href ="#Item3">Articles</a>
                 
                      </div></li>
                </ul>
            </nav>
        </div>
		
		
    </header>
<main>

<div class="cart content-wrapper">
    <h1>Confirm Consultation Payment</h1>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Date</th>
					<th>Type</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php 
				$id=$_GET["DoctorID"];
                $sql = "SELECT * FROM doctors WHERE DoctorID= '$id'";

                $result = mysqli_query($conn, $sql);
                

                while($product = mysqli_fetch_assoc($result)) {
                    
                ?>
                <form action="functions/updateCart.func.php" method="POST">
                <tr>
                    
                    <td class="img">
                        <a href="doc_con_info.php?page=doctors&DoctorID=<?=$product['DoctorID']?>">
                            <img src="<?php echo $product['dp']; ?>" width="50" height="50" alt="<?php echo $product['D_Name']; ?>">
                        </a>
                    </td>
                    <td>
                        <a style="margin-left:40px;"><?php echo $product['D_Name']; ?></a>
                        <br>
                    </td>
					<td><input style ="margin-left:40px;" class="form-input" min="" type="date" name="date" id="ap_date" required ></td>
					<td class="price"><?php echo $id;?></td>
                    <td class="price">RM 15.00</td>
                    
                </tr>
                </form>
                <?php }  ?>
                
            </tbody>
        </table>
        <div class="subtotal">
            <span class="text">Subtotal</span>
            <span class="price">RM 15.00</span>
        </div>
        <div class="buttons">
            <form action="functions/addOrder.func.php" method="POST">
                <input type="hidden" value="<?php echo "1"; ?>" name="user_id">
                <input type="hidden" value="<?php echo number_format($total_price, 2); ?>" name="total_price">
                <input type="submit" value="Place Order">
            </form>
        </div>
    </form>
</div>

</main>
        <script src="script.js"></script>
		<script type="text/javascript">
		var today = new Date();
		var dd = String(today.getDate()).padStart(2, '0');
		var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
		var yyyy = today.getFullYear();

	today = yyyy+'-'+mm+'-'+dd;
	document.getElementById('ap_date').value = today;
	document.getElementById("ap_date").setAttribute("min", today);

</script>
    </body>
</html>

<?php 
if(isset($_POST['placeorder']))
{
	$itemid=$_POST["itemid"];
	$itemname=$_POST["itemname"];
	$quantity=$_POST["quantity"];
	$remark=$_POST["remark"];
	
	mysqli_query($connect, "UPDATE consultation SET Time='$time', Status='$status', Links='$links' , Remark='$remark'
							WHERE ConsultID='$id'");
				
			echo'<script type="text/javascript">
			alert("Member Consultation updated!");
			</script>';
			header( 'refresh:0.5; url=consultation_doctor.php' );
}
?>