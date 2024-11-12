<?php
$firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
$lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$number = isset($_POST['number']) ? $_POST['number'] : '';

// Database connection
include 'config.php';

$stmt = $conn->prepare("INSERT INTO registration(firstName, lastName, gender, email, password, number) VALUES(?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $password, $number);
$execval = $stmt->execute();
echo $execval;
echo "Registration successful.";
$stmt->close();
$conn->close();

// Redirect to login page after successful registration
header("Location: login.php");
?>
