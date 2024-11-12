<?php
include 'config.php';

$firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
$lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$number = isset($_POST['number']) ? $_POST['number'] : '';

$stmt = $conn->prepare("INSERT INTO registration(firstName, lastName, gender, email, password, number) VALUES(?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $password, $number);
$execval = $stmt->execute();

if ($execval) {
    echo "<script>alert('Registration successful.');window.location.href='login.php';</script>";
} else {
    echo "<script>alert('Oops! Something went wrong.');window.location.href='register.php';</script>";
}

$stmt->close();
$conn->close();
?>
