<?php
include 'config.php';

// Check if form data has been submitted
if (isset($_POST['send'])) {
    // Collect form data and sanitize
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $guests = mysqli_real_escape_string($conn, $_POST['guests']);
    $arrivals = mysqli_real_escape_string($conn, $_POST['arrivals']);
    $leaving = mysqli_real_escape_string($conn, $_POST['leaving']);

    // SQL query to insert data into the table
    $request = "INSERT INTO book_form (name, email, phone, address, location, guests, arrivals, leaving)
                VALUES ('$name', '$email', '$phone', '$address', '$location', '$guests', '$arrivals', '$leaving')";

    // Execute the query and check for success
    if (mysqli_query($conn, $request)) {
        header('Location: book.php'); // Redirect on successful insert
    } else {
        echo "<script>alert('Oops! Something went wrong. Please try again.');</script>";
    }
} else {
    echo 'Something went wrong, please try again!';
}

// Close the connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Book Form</title>
    <style>
        .required {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Book Your Trip</h1>
    <form action="" method="POST">
        <label for="name">Name:<span class="required">*</span></label>
        <input type="text" id="name" name="name" required>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Book Form</title>
</head>
<body>
    <h1>Book Your Trip</h1>
    <form action="" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required>

        <label for="guests">Guests:</label>
        <input type="number" id="guests" name="guests" required>

        <label for="arrivals">Arrival Date:</label>
        <input type="date" id="arrivals" name="arrivals" required>

        <label for="leaving">Departure Date:</label>
        <input type="date" id="leaving" name="leaving" required>

        <button type="submit" name="send">Book Now</button>
    </form>
</body>
</html>
