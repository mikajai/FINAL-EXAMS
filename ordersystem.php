<?php 
session_start();

if(!isset($_SESSION['username'])) {
	header('Location: login.php');
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
</head>
<body>
    <h1>Welcome to the Canteen! <?php echo $_SESSION['username'];?> Here are the prices:</h1>
    <ul>
        <li>Fishball - ₱ 30</li>
        <li>Kikiam - ₱ 40</li>
        <li>Corndog - ₱ 50</li>
    </ul>
    
    <form method = "post">
        <label for = "">Choose your Order: </label>
        <select class = "" name = "order" required>
            <option value = "" selected hidden></option>
            <option value = "Fishball">Fishball</option>
            <option value = "Kikiam">Kikiam</option>
            <option value = "Corndog">Corndog</option>
        </select>

        <label for = "quantity"> Quantity: </label>
        <input type = "number" id = "quantity" name = "quantity" required><br><br>
       
        <label for = "cash"> Cash: </label>
        <input type = "number" id = "cash" name = "cash" required><br><br>

        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    $prices = [
        'Fishball' => 30,
        'Kikiam' => 40,
        'Corndog' => 50
    ];

    if(isset($_POST['submit'])){
        $order = $_POST['order'];
        $quantity = $_POST['quantity'];
        $cash = $_POST['cash'];
        $totalcost = $_POST['totalcost'];
        $change = $_POST['change'];

        $totalcost = $prices[$order] * $quantity;
        $change = $cash - $totalcost;
        
        header("Location: receipt.php?order=$order&quantity=$quantity&cash=$cash&totalcost=$totalcost&change=$change");
        exit();
    }
?>

<a href="logout.php">Logout</a>

</body>
</html>