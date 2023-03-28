<!DOCTYPE html>
<html>

<head>
  <title>Status</title>
 <?php include 'adminlinks.php';?>
</head>

<body>
  <?php include 'admin-header.php';?>
  <section class="roomstatuscontainer">
  <div class="room-status">

  <table id="room-status-table">
  <thead>
    <tr>
      <th>Room ID</th>
      <th>Room Name</th>
      <th>Check-in Date</th>
      <th>Check-out Date</th>
      <th>Status</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php

include '../include/connection.php';

$query = "SELECT * FROM bookings WHERE status != 'available'";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    ?>
      <tr>
        <td><?php echo $row['room_id']; ?></td>
        <td><?php echo $row['room_name']; ?></td>
        <td><?php echo $row['check_in']; ?></td>
        <td><?php echo $row['check_out']; ?></td>
        <td><?php echo $row['status']; ?></td>
        <td>
        <form action="update_status.php" method="post">
          <input type="hidden" name="booking_id" value="<?php echo $row['booking_id']; ?>">
          <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
          <input type="hidden" name="room_id" value="<?php echo $row['room_id']; ?>">
          <input type="hidden" name="room_name" value="<?php echo $row['room_name']; ?>">
          <input type="hidden" name="check_in" value="<?php echo $row['check_in']; ?>">
          <input type="hidden" name="check_out" value="<?php echo $row['check_out']; ?>">
          <input type="hidden" name="total_price" value="<?php echo $row['total_price']; ?>">




          <input class="statbtn checkedin" type="submit" name="checkin_status" value="Check In">
          <input class="statbtn checkedout " type="submit" name="checkout_status" value="Check Out">
          <input class="statbtn booked" type="submit" name="booked" value="Booked">
          <input class="statbtn available" type="submit" name="available" value="Available">
        </form>
        </td>
      </tr>
    <?php }?>

  </tbody>
</table>

</div>
</section>



  </body>
</html>