<?php
include 'config.php';
include 'connect.php';
error_reporting(0);

if (isset($_POST['submit'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $number = $_POST['number'];

    // Check if passwords match
    if ($password == $cpassword){
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Check if the email already exists
        $sql = "SELECT * FROM registration WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0){
            // Insert new user into the registration table
            $sql = "INSERT INTO registration (firstName, lastName, gender, email, password, number) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssss", $firstName, $lastName, $gender, $email, $hashed_password, $number);

            if ($stmt->execute()) {
                echo "<script>alert('User registration completed.')</script>";
                $_POST = []; // Clear form data
            } else {
                echo "<script>alert('Oops! Something went wrong.')</script>";
            }
        } else {
            echo "<script>alert('Email already exists.')</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Passwords do not match.')</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Register</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
            <div class="input-group">
                <input type="text" placeholder="First Name" name="firstName" value="<?php echo isset($firstName) ? htmlspecialchars($firstName) : ''; ?>" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Last Name" name="lastName" value="<?php echo isset($lastName) ? htmlspecialchars($lastName) : ''; ?>" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Gender" name="gender" value="<?php echo isset($gender) ? htmlspecialchars($gender) : ''; ?>" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="cpassword" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Contact Number" name="number" value="<?php echo isset($number) ? htmlspecialchars($number) : ''; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Register</button>
            </div>
            <p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p>
        </form>
    </div>
</body>
</html>
