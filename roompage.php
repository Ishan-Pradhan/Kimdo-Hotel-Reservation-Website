<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include 'include/links.php'?>
  <title>Document</title>
</head>
<body>
  <?php include 'include/header.php'?>

  <div class="facility-carousel">
<div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="images/Rooms page/1.jpg" alt="">
      </div>

        <div class="swiper-slide"><img src="images/Rooms page/2.jpg" alt="">
        </div>

        <div class="swiper-slide"><img src="images/Rooms page/3.jpg" alt="">
       </div>

        <div class="swiper-slide"><img src="images/Rooms page/4.jpg" alt="">
       </div>
      </div>
      <div class="swiper-pagination"></div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
    </div>


  <section class="rooms-section">
  <h3 class="section-title h-fonts">Room & Suites</h3>
  <div class="allrooms">

  <?php
// Connect to the database
include 'include/connection.php';

// Get the room data from the database
$sql = "SELECT * FROM rooms";
$result = mysqli_query($conn, $sql);

// Loop through the room data and create the cards
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

    echo '<div class="swiper-slide">
    <div class="product-card">
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
      <a class='bookingbutton' href='booking-form.php?roomname=" . $room['room_name'] . "'><button class='btn btn-primary button' name='bookbtn' onclick='openBookingModal()'>Book Now</button> </a>
      </div>
    </div>
    </div>";
}

?>
</div>
</section>

<?php include 'include/footer.php'?>

<!-- carousels -->

<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
      effect: "fade",
      loop:true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      }

    });
  </script>
</body>
</html>
