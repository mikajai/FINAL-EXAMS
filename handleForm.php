<?php  
session_start();
require_once('dbConfig.php');
require_once('functions.php');

if (isset($_POST['regBtn'])) {  // handles the registration page
	$username = $_POST['username'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

	if(empty($username) || empty($password)) {  // checks if username and password are empty
		echo '<script> 
		alert("The input field is empty!");
		window.location.href = "register.php";
		</script>';
	}
	
	else {

		if(addUser($conn, $username, $password)) {  // adds user to the database if both fields are filled
			header('Location: ordersystem.php');    // locates user to the order system page
		}

		else {
			header('Location: register.php'); // sends back to the register page
		}

	}
}

if (isset($_POST['loginBtn'])) {    
	$username = $_POST['username']; // retrieves and stores username
	$password = $_POST['password']; // retrieves and stores password

	if(empty($username) && empty($password)) {  // checks if username and password are empty
		echo "<script>
		alert('Input fields are empty!');
		window.location.href='ordersystem.php'
		</script>";
	} 
	else {

		if(login($conn, $username, $password)) {  // checks if username and password are filled
			header('Location: ordersystem.php'); // locates user to the order system page
		}

		else {
			header('Location: login.php'); // sends back to the login page
		}
	}
	
}
?>