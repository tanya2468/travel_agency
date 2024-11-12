<?php

	$firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
$lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$number = isset($_POST['number']) ? $_POST['number'] : '';


	// Database connection
	$conn = new mysqli('localhost','root','','book');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, gender, email, password, number) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $password, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>