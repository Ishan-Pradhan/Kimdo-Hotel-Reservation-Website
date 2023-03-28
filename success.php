<?php
session_start();
?>

<html>
  <head>
    <title>Booking Success</title>
  </head>
  <body>
<?php

include 'include/connection.php';
$sql = select * booking where 

?>
    <h1>Your booking has been made successfully!</h1>
    <p>Thank you for booking with us. Your booking details are as follows:</p>
    <ul>
      <li>Room Name: <?php echo $_POST['room_name']; ?></li>
      <li>User Name: <?php echo $_POST['username']; ?></li>
      <li>Check-in Date: <?php echo $_POST['check_in']; ?></li>
      <li>Check-out Date: <?php echo $_POST['check_out']; ?></li>
      <li>Number of Guests: <?php echo $_POST['guests']; ?></li>
      <li>Phone Number: <?php echo $_POST['phone_number']; ?></li>
    </ul>
  </body>
</html>


