<!DOCTYPE html>
<html>

<head>
  <title>Dashboard</title>
 <?php include 'adminlinks.php';?>
</head>

<body>
  <?php include 'admin-header.php';?>

<?php include '../include/connection.php';

$sql = "SELECT SUM(quantity) AS num_rooms from rooms";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($result);
$total_rooms = $rows['num_rooms'];

$sql2 = "SELECT COUNT(*) AS booked_rooms from bookings";
$result2 = mysqli_query($conn, $sql2);
$rows2 = mysqli_fetch_assoc($result2);
$total_booking = $rows2['booked_rooms'];

$sql3 = "SELECT COUNT(*) AS checked_in from bookings where status = 'checked_in'";
$result3 = mysqli_query($conn, $sql3);
$rows3 = mysqli_fetch_assoc($result3);
$total_checkedins = $rows3['checked_in'];

$sql4 = "SELECT COUNT(*) AS checked_out from archive_bookings";
$result4 = mysqli_query($conn, $sql4);
$rows4 = mysqli_fetch_assoc($result4);
$total_checkedouts = $rows4['checked_out'];

$sql5 = "SELECT SUM(total_price) AS total_earnings from archive_bookings";
$result5 = mysqli_query($conn, $sql5);
$rows5 = mysqli_fetch_assoc($result5);
$total_earnings = $rows5['total_earnings'];

$sql6 = "SELECT COUNT(*) AS users from users";
$result6 = mysqli_query($conn, $sql6);
$rows6 = mysqli_fetch_assoc($result6);
$total_users = $rows6['users'];

?>




<section class="dashboard-section">
<div class="dashboard-container">

  <div class="dashboard-item-container total_rooms">
    <h1><?php echo "$total_rooms"; ?></h1>
    <p>Available Rooms</p>
  </div>


  <div class="dashboard-item-container total_bookings">
    <h1><?php echo "$total_booking"; ?></h1>
    <p>Bookings</p>
  </div>

  <div class="dashboard-item-container total_checkin">
    <h1><?php echo "$total_checkedins"; ?></h1>
    <p>Checked-in</p>
  </div>

  <div class="dashboard-item-container total_checkout">
    <h1><?php echo "$total_checkedouts"; ?></h1>
    <p>Checked-out</p>
  </div>

  <div class="dashboard-item-container total_earnings">
    <h1>Rs.<?php echo "$total_earnings"; ?></h1>
    <p>Total Earnings</p>
  </div>

  <div class="dashboard-item-container users">
    <h1><?php echo "$total_users"; ?></h1>
    <p>No. of users</p>
  </div>
</div>
</section>


  </body>
</html>