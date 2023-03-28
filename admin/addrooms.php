<!DOCTYPE html>
<html>

<head>
  <title>Insert Room Data</title>
 <?php include 'adminlinks.php';?>
</head>

<body>
  <?php include 'admin-header.php';?>
  <div class="addroom-container">
  <section class="insertroom">

    <h1>Insert Room Data</h1>
    <form action="" class="insertroomform" method="POST" enctype="multipart/form-data">
      <label for="room_name">Room Name:</label>
      <input type="text" id="room_name" name="room_name" required><br><br>
      <label for="price">Price:</label>
      <input type="text" id="price" name="price" required><br><br>
      <label for="size">Area:</label>
      <input type="size" id="size" name="size" required><br><br>
      <label for="capacity">Capacity:</label>
      <input type="text" id="capacity" name="capacity" required><br><br>
      <label for="capacity">Adults:</label>
      <input type="text" id="adult" name="adult" required><br><br>
      <label for="capacity">Kids:</label>
      <input type="text" id="kids" name="kids" required><br><br>
      <label for="facilities">Facilities:</label>
      <input type="text" id="facilities" name="facilities" required><br><br>
      <label for="rating">beds:</label>
      <input type="text" id="beds" name="beds" required><br><br>
      <label for="rating">Rating:</label>
      <input type="text" id="rating" name="rating" required><br><br>
      <label for="image">Image:</label>
      <input type="file" id="image" name="image" required><br><br>
      <label for="quantity">Rooms Quantity:</label>
      <input type="number" id="quantity" name="quantity" required><br><br>
      <button type="submit" name="adminsubmit"
      class="addroombtn">Submit</button>
    </form>
  </section>
  <section class="roomsindex">
  <h1>Rooms</h1>
      <?php
include '../include/connection.php';

$selectrooms = "SELECT * FROM rooms";
$showrooms = mysqli_query($conn, $selectrooms);
?>
<div class="table-container">
<table class="rooms-table">
  <thead>
    <tr>
      <th>Booking ID</th>
      <th>Room Name</th>
      <th>Price</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($roomrow = mysqli_fetch_array($showrooms)): ?>
      <tr>
        <td><?php echo $roomrow['id']; ?></td>
        <td><?php echo $roomrow['room_name']; ?></td>
        <td><?php echo $roomrow['price']; ?></td>

        <td>
          <form action="cancel.php" method="POST">
            <input type="hidden" name="room_id" value="<?php echo $roomrow['id']; ?>">
            <button class="cancel-booking-btn" name="cancel_booking" type="submit">Delete Room</button>
          </form>
        </td>

      </tr>
      <?php endwhile;?>
    </tbody>
</table>
</div>
    </section>
    </div>
  <?php
include '../include/connection.php';

if (isset($_POST['adminsubmit'])) {
    $room_name = $_POST['room_name'];
    $room_price = $_POST['price'];
    $room_size = $_POST['size'];
    $bed_config = $_POST['beds'];
    $capacity = $_POST['capacity'];
    $adult = $_POST['adult'];
    $kids = $_POST['kids'];
    $room_image = $_FILES['image']['name'];
    $room_facilities = $_POST['facilities'];
    $rating = $_POST['rating'];
    $quantity = $_POST['quantity'];

    $target = "../images/our rooms/" . basename($room_image);

    $sql = "INSERT INTO rooms (room_name, price, size, beds, capacity, image, facilities, rating,quantity, adult, kids)
          VALUES ('$room_name', '$room_price', '$room_size', '$bed_config', '$capacity', '$room_image', '$room_facilities', '$rating','$quantity', '$adult', '$kids')";
    if (mysqli_query($conn, $sql)) {
        header('location: addrooms.php');
    }
}

?>
</body>

</html>