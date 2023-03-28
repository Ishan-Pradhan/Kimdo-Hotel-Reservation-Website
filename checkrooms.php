<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include './include/links.php'?>
  <title>Check rooms</title>
</head>
<body>
<?php include 'include/header.php'?>


<section class="checkroomssection">
<?php
include 'include/connection.php';
if (isset($_POST['checkrooms'])) {
    $check_in = $_POST['checkin'];
    $check_out = $_POST['checkout'];
    $adult = $_POST['adult'];
    $children = $_POST['children'];

    if ($adult != 'none' || $children != 'none') {

        $where = "WHERE quantity > 0";
        if ($adult != 'none') {
            $where .= " AND adult >= $adult";
        }
        if ($children != 'none') {
            $where .= " AND kids >= $children";
        }

        $sql = "SELECT * FROM rooms $where";
        $result = mysqli_query($conn, $sql);
        while ($room = mysqli_fetch_assoc($result)) {
            $room_id = $room['id'];
            $room_name = $room['room_name'];
            $room_price = $room['price'];
            $room_image = $room['image'];
            $room_size = $room['size'];
            $room_beds = $room['beds'];
            $room_capacity = $room['capacity'];
            $room_facilities = $room['facilities'];
            $room_rating = $room['rating'];

            echo '
      <div class="room-card product-card">
        <div class="room-image">
          <img src="images/our rooms/' . $room_image . '" alt="' . $room_name . '">
        </div>
        <div class="room-details">
          <h4>' . $room_name . '</h4>
          <p><span class="room-price">Rs.' . $room_price . '</span> per night</p>
          <ul class="room-full-detail">
            <li>' . $room_size . ' m<sup class="superscript">2</sup></li>
            <li>' . $room_beds . '</li>
            <li>' . $room_capacity . '</li>
          </ul>
        </div>
        <div class="facility-icons">';

            // Loop through the room facilities and create the icons
            $facilities = explode(",", $room_facilities);
            foreach ($facilities as $facility) {
                echo '<i class="fa-solid fa-' . $facility . ' room-icons"></i>';
            }

            echo '</div>
        <div class="rating-stars">';

            // Loop through the room rating and create the stars
            for ($i = 0; $i < $room_rating; $i++) {
                echo '<i class="fas fa-star"></i>';
            }

            echo "</div>
        <div class='card-btns'>
        <a class='bookingbutton' href='booking-form.php?roomname=" . $room['room_name'] . "'><button class='btn btn-primary button' name='bookbtn' >Book Now</button> </a>
        </div>
      </div>
      </div>";
        }
        if (mysqli_num_rows($result) == 0) {

            echo " <h2 class='noroomerror'>There are no rooms available that meet your requirements.</h2>";
        }
    } else {
        echo '<h2 class="personerror">Please select atleast 1 person to check the available rooms.</h2>';
    }
}
?>
</section>



<?php include 'include/footer.php';?>
</body>
</html>