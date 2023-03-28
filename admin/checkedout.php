<!DOCTYPE html>
<html>

<head>
  <title>Insert Room Data</title>
 <?php include 'adminlinks.php';?>
</head>

<body>
  <?php include 'admin-header.php';?>

<?php
include '../include/connection.php';

$query = "SELECT * FROM archive_bookings";
$result = mysqli_query($conn, $query);

?>
<div class="checkouttablecontainer">
  <h2>Past Bookings</h2>
<table class='checkouttable' border='1'>
<tr>
<th>Booking ID</th>
<th>User ID</th>
<th>Room ID</th>
<th>Room Name</th>
<th>Check In</th>
<th>Check Out</th>
<th>Total Price</th>
</tr>
<?php
while ($row = mysqli_fetch_array($result)): ?>
    <tr>
    <td><?php echo $row['booking_id']; ?>  </td>
    <td><?php echo $row['user_id']; ?>  </td>
    <td><?php echo $row['room_id']; ?>  </td>
    <td><?php echo $row['room_name']; ?>  </td>
    <td><?php echo $row['check_in']; ?>  </td>
    <td><?php echo $row['check_out']; ?>  </td>
    <td><?php echo $row['total_price']; ?>  </td>
<?php endwhile;?>

</table>
</div>
</body>
</html>