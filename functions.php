<?php  

function addUser($conn, $username, $password) {     // adds user to the database
	$sql = "SELECT * FROM users WHERE username=?";
	$stmt = $conn->prepare($sql);
	$stmt->execute([$username]);

	if($stmt->rowCount()==0) {
		$sql = "INSERT INTO users (username,password) VALUES (?,?)";
		$stmt = $conn->prepare($sql);
		return $stmt->execute([$username, $password]);
	}
}

function login($conn, $username, $password) {   // takes three parameters to connect to the database
	$query = "SELECT * FROM users WHERE username=?";
	$stmt = $conn->prepare($query);
	$stmt->execute([$username]);

    // checks for existing username
	if($stmt->rowCount() == 1) {

		// returns associative array
		$row = $stmt->fetch();

		// store user info as a session variable
		$_SESSION['userInfo'] = $row;

		// get values from the session variable
		$uid = $row['user_id'];
		$uname = $row['username'];
		$passHash = $row['password'];

		// validate password 
		if(password_verify($password, $passHash)) {
			$_SESSION['username'] = $uname;
			return true;
		}
		else {
			return false;
		}
	}
}

?>