<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="profile.css">
  <link rel="stylesheet" href="profile.css">
</head>
<body>

<div class="profile-header">
  <div class="profile-links">
    <a href="../index.php">Home</a>
    <a href="profile.php">Profile</a>
    <a href="mybooking.php">My Bookings</a>
  </div>
  <a class="btn logoutbtn" href="logout.php">LOGOUT</a>
</div>

<section class="mybookingsection">
<h2>My Bookings</h2>
<div class="mybookingtable">

  <?php
include 'connection.php';
$user_id = $_SESSION['user_id']; // retrieve the user's id

$query = "SELECT * FROM bookings WHERE user_id = $user_id";
$result = mysqli_query($conn, $query);
?>
<table  class="booking-table">
  <thead>
    <tr>
      <th>Booking ID</th>
      <th>Room Name</th>
      <th>Check-in</th>
      <th>Check-out</th>
      <th>Guests</th>
      <th>Price</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = mysqli_fetch_array($result)): ?>
      <tr>
        <td><?php echo $row['booking_id']; ?></td>
        <td><?php echo $row['room_name']; ?></td>
        <td><?php echo $row['check_in']; ?></td>
        <td><?php echo $row['check_out']; ?></td>
        <td><?php echo $row['guests']; ?></td>
        <td><?php echo $row['total_price']; ?></td>
        <td>
          <?php if ($row['status'] != 'booked'): ?>

            <p><?php echo $row['status']; ?></p>

          <?php else: ?>
            <form action="cancel.php" method="POST">
            <input type="hidden" name="booking_id" value="<?php echo $row['booking_id']; ?>">
            <input type="hidden" name="room_id" value="<?php echo $row['room_id']; ?>">
            <button class="cancel-booking-btn" name="cancel_booking" type="submit">Cancel Booking</button>
          </form>

            <?php endif?>
        </td>
      </tr>
    <?php endwhile;?>
  </tbody>
</table>

</div>
</section>
</body>
</html>