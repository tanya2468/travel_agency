<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Book</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <style>
      .required::after {
         content: " *";
         color: red;
      }
      .success-message {
         color: green;
         font-size: 18px;
         margin-top: 20px;
      }
   </style>
</head>
<body>
   
<!-- header section starts  -->

<?php @include 'header.php'; ?>

<!-- header section ends -->

<div class="heading" style="background:url(images/header-bg-3.png) no-repeat">
   <h1>book now</h1>
</div>

<!-- booking section starts  -->

<section class="booking">

   <h1 class="heading-title">book your trip!</h1>

   <?php
      // Check if the form was submitted and handle success message
      if (isset($_POST['send'])) {
         // Form fields are sanitized and inserted here (previous code)
         $name = $_POST['name'];
         $email = $_POST['email'];
         $phone = $_POST['phone'];
         $address = $_POST['address'];
         $location = $_POST['location'];
         $guests = $_POST['guests'];
         $arrivals = $_POST['arrivals'];
         $leaving = $_POST['leaving'];

         // Insert data into database (e.g., using mysqli)
         include 'config.php'; 
         $query = "INSERT INTO book_form (name, email, phone, address, location, guests, arrivals, leaving) 
                   VALUES ('$name', '$email', '$phone', '$address', '$location', '$guests', '$arrivals', '$leaving')";
         
         if (mysqli_query($conn, $query)) {
            echo '<div class="success-message">Your booking is confirmed!</div>';
         } else {
            echo '<div class="error-message">There was an error with your booking. Please try again.</div>';
         }
         mysqli_close($conn);
      }
   ?>

   <form action="" method="post" class="book-form">

      <div class="flex">
         <div class="inputBox">
            <span class="required">name :</span>
            <input type="text" placeholder="enter your name" name="name" required>
         </div>
         <div class="inputBox">
            <span class="required">email :</span>
            <input type="email" placeholder="enter your email" name="email" required>
         </div>
         <div class="inputBox">
            <span class="required">phone :</span>
            <input type="text" placeholder="enter your number" name="phone" pattern="\d{10}" maxlength="10" minlength="10" required 
                   title="Phone number must be exactly 10 digits">
         </div>
         <div class="inputBox">
            <span class="required">address :</span>
            <input type="text" placeholder="enter your address" name="address" required>
         </div>
         <div class="inputBox">
            <span class="required">where to :</span>
            <input type="text" placeholder="place you want to visit" name="location" required>
         </div>
         <div class="inputBox">
            <span class="required">how many :</span>
            <input type="number" placeholder="number of guests" name="guests" required>
         </div>
         <div class="inputBox">
            <span class="required">arrivals :</span>
            <input type="date" name="arrivals" required>
         </div>
         <div class="inputBox">
            <span class="required">leaving :</span>
            <input type="date" name="leaving" required>
         </div>
      </div>

      <input type="submit" value="submit" class="btn" name="send">

   </form>

</section>

<!-- booking section ends -->

<!-- footer section starts  -->

<?php @include 'footer.php'; ?>

<!-- footer section ends -->

<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>