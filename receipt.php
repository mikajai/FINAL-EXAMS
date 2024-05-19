<?php 
session_start();
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form Result</title>
</head>
<body>
    <h1>Order Summary</h1>
    <?php
        $order = $_GET['order'];
        $quantity = $_GET['quantity'];
        $cash = $_GET['cash'];
        $totalcost = $_GET['totalcost'];
        $change = $_GET['change'];

        if ($cash < $totalcost) {
            echo "<h1>Insufficient amount</h1>";
        } else {
            echo "<h1>Total Cost is: ₱$totalcost</h1>";
            echo "<h1>Your Change is: ₱$change</h1>";
            echo "<p>Thank you for your order! ".$_SESSION['username']."</p>";
        }        
    ?>
</body>
</html>