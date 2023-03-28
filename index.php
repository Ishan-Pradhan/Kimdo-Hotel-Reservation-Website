
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kimdo</title>
  <?php include 'include/links.php';?>
</head>
<body>
  <?php
include 'include/header.php';

include 'include/connection.php';
include 'include/essentials.php';
if (isset($_SESSION['sucessalert'])) {
    echo "<div id='sucessalert' class='sucessalert'>
    <div class='sucess-content'>
  <p class='alert-heading'>Booking Successful!</p>
  <span>We'll call you shortly to confirm your reservation.</span>
  </div>
  <button class='close-btn'  onclick='closeCustomAlert()'>&times;</button>
</div>

<script>

function closeCustomAlert() {
  document.getElementById('sucessalert').style.display = 'none';
}
</script>";
    unset($_SESSION['sucessalert']);
}
?>
  <!-- HERO SECTION -->
  <section class="hero-section container ">
  <div class="carousel">
  <div><img class="carousel-img" src="images/carousel/1.jpg" alt=""></div>
  <div><img class="carousel-img" src="images/carousel/2.jpg" alt=""></div>
  <div><img class="carousel-img" src="images/carousel/3.jpg" alt=""></div>
  <div><img class="carousel-img" src="images/carousel/4.jpg" alt=""></div>
  <div><img class="carousel-img" src="images/carousel/5.jpg" alt=""></div>
  <div><img class="carousel-img" src="images/carousel/6.jpg" alt=""></div>
</div>

<!-- BOOKING AVAILABILITY -->
<div class="booking-availability">
  <h4>CHECK AVAILABLE ROOMS</h4>
  <div class="booking-content">
    <form action="checkrooms.php" method="POST">
      <div class="content checkin">
        <label for="checkin">Check-in</label>
        <input class="booking" type="date" name="checkin" id="checkin">
      </div>
      <div class="content checkout">
        <label for="checkout">Check-out</label>
        <input class="booking" type="date" name="checkout" id="checkout">
      </div>
  <div class="content adult">
    <label for="adult">Adult</label>
    <select class="booking" name="adult" id="adult">
      <option value="none">None</option>
      <option value="1">One</option>
      <option value="2">Two</option>
      <option value="3">Three</option>
      <option value="4">Four</option>
      <option value="5">Five</option>
      <option value="6">Six</option>
      <option value="7">Seven</option>
      <option value="8">Eight</option>
      <option value="9">Nine</option>
    </select>
  </div>

  <div class="content children">
    <label for="children">children</label>
    <select class="booking" name="children" id="children">
    <option value="none">None</option>
    <option value="1">One</option>
      <option value="2">Two</option>
      <option value="3">Three</option>
      <option value="4">Four</option>
      <option value="5">Five</option>
      <option value="6">Six</option>
      <option value="7">Seven</option>
      <option value="8">Eight</option>
      <option value="9">Nine</option>
    </select>
  </div>
  <input type="submit" class="btn-checkroom" name="checkrooms" value="Check Rooms">
</form>
</div>
</div>
  </section>

  <!-- Our room Section -->
<section class="our-room-section container">
<div class="product-card-container">

<!-- Room 1 -->


<div class="swiper-container">
  <div class="swiper-wrapper">
<?php
// Connect to the database
include 'include/connection.php';

// Get the room data from the database
$sql = "SELECT * FROM rooms ORDER BY id DESC LIMIT 5";
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
      <a class='bookingbutton' href='booking-form.php?roomname=" . $room['room_name'] . "'><button class='btn btn-primary button' name='bookbtn' >Book Now</button> </a>
      </div>
    </div>
    </div>";
}
?>
</div>
<div class="swiper-button-prev prev-btn"></div>
  <div class="swiper-button-next next-btn"></div>
</div>

</div>

  <button class="more-room-btn"><a class="moreroomlink" href="roompage.php">More Rooms</a></button>

</section>



<section class="facility-section container ">
<h3 class="section-title h-font">SEE THE FACILITIES WE <br>PROVIDE IN <span>REAL TIME</span></h3>
<div class="facility-contents">
  <div class="facility-container">
  <i class="fa-solid fa-house-laptop"></i>
  <p>Private Space</p>
  </div>
  <div class="facility-container">
  <i class="fa-solid fa-house-laptop"></i>
  <p>Outdoor Space</p>
  </div>
  <div class="facility-container">
  <i class="fa-solid fa-person-swimming"></i>
  <p>Swimming Pool</p>
  </div>
  <div class="facility-container">
  <i class="fa-solid fa-square-parking"></i>
  <p>Parking Area</p>
  </div>
  <div class="facility-container">
    <i class="fa-solid fa-wifi"></i>
    <p>Free Wifi</p>
  </div>
  <div class="facility-container">
    <i class="fa-solid fa-mug-saucer"></i>
    <p>Breakfast</p>
  </div>
  <div class="facility-container">
  <i class="fa-solid fa-plug-circle-bolt"></i>
  <p>Free Electricity</p>
  </div>
  <div class="facility-container">
  <i class="fa-solid fa-shirt"></i>
  <p>Laundry Service</p>
  </div>
  <div class="facility-container">
  <i class="fa-solid fa-dumbbell"></i>
  <p>Gym</p>
  </div>
  <div class="facility-container">
  <i class="fa-solid fa-dog"></i>
  <p>Pet Friendly</p>
  </div>
  <div class="facility-container">
  <i class="fa-solid fa-utensils"></i>
  <p>On-Site Restaurant</p>
  </div>

</div>
</section>

<!-- facility section -->
<section class="popular-facility-section container ">
  <h3 class="section-title h-font">WE ORGANIZE THE <span>MOST POPULAR</span><br>FACILITIES TO OUR CUSTOMERS</h3>
  <!-- facility 1 -->
  <div class="facility">
    <div class="facility-image">
      <img loading="lazy" src="images/welcome/1.jpg" alt="">
    </div>
  <div class="facility-content">
    <h3 class="secondary-title">Restaurant</h3>
    <div class="welcome-texts">
<p>Experience the best of Asian and Western cuisine at Food Hub, the restaurant located within the Kimdo Hotel in the heart of Ho Chi Minh City. With an extensive menu and comfortable atmosphere, Food Hub is the perfect place to enjoy breakfast, lunch, dinner, or drinks and light bites.</p>
</div>
<a class="btn readmore" href="facility.php#restaurant">READ MORE</a>
</div>
</div>

<!-- facility 2 -->
<div class="facility">

  <div class="facility-content">
    <h3 class="secondary-title">Gym Center</h3>
    <div class="welcome-texts">
<p>Get your workout in while staying at our hotel! Our gym center offers state-of-the-art equipment and a variety of fitness classes to help you stay in shape during your stay. With convenient hours and a welcoming atmosphere, our gym center is the perfect place to exercise and stay healthy.</p>
</div>
<a class="btn readmore" href="facility.php#gymcenter">READ MORE</a>
</div>
<img class="facility-image" loading="lazy" src="images/welcome/2.jpg" alt="">
</div>

  <!-- facility 13-->
  <div class="facility">
  <img class="facility-image" loading="lazy" src="images/welcome/3.jpg" alt="">
  <div class="facility-content">
    <h3 class="secondary-title">Swimming Pool</h3>
    <div class="welcome-texts">
<p>Take a refreshing dip in our hotel's swimming pool! Our pool offers a perfect escape from the city's hustle and bustle and is a great way to cool off and relax during your stay. Whether you're looking to do a few laps or simply lounge by the pool, our swimming pool is the perfect place to unwind.</p>
</div>
<a class="btn readmore" href="facility.php#swimmingpool">READ MORE</a>
</div>
</div>

</section>

<!-- gallery -->

<section class="container life-in-kimdo">
  <div class="title-container">
    <h3 class="section-title h-font">LIFE IN <span>KIMDO</span></h3>
  </div>
<div class="gallery ">
  <div class="gallery-item">
    <img loading="lazy" src="images/photo gallery/spa.jpg" alt="">
  </div>
  <div class="gallery-item">
    <img loading="lazy" src="images/photo gallery/3.jpg" alt="">
  </div>
  <div class="gallery-item">
    <img loading="lazy" src="images/photo gallery/4.jpg" alt="">
  </div>
  <div class="gallery-item">
    <img loading="lazy" src="images/photo gallery/5.jpg" alt="">
  </div>
  <div class="gallery-item">
    <img loading="lazy" src="images/photo gallery/6.jpg" alt="">
  </div>
  <div class="gallery-item">
    <img loading="lazy" src="images/photo gallery/7.jpg" alt="">
  </div>
  <div class="gallery-item">
    <img loading="lazy" src="images/photo gallery/8.jpg" alt="">
  </div>
  <div class="gallery-item">
    <img loading="lazy" src="images/photo gallery/9.jpg" alt="">
  </div>
  <div class="gallery-item">
    <img loading="lazy" src="images/photo gallery/10.jpg" alt="">
  </div>


</div>
</section>

<!-- Testimonials -->
<section class=" testimonials container">
  <div class="testimonials-titles">
    <h3 class="section-title h-font">Testimonials</h3>
    <p>AT THE HEART OF COMMUNITIES</p>
  </div>
    <div class="testimonial-container">

      <!-- 1
        <div class="testimonial-items">
          <div class="testimonial-images">
            <img src="images/testimonials/person1.png" alt="" />
          </div>
          <div class="testimonial-rating">
          <i class="fas fa-star rating-stars"></i>
          <i class="fas fa-star rating-stars"></i>
          <i class="fas fa-star rating-stars"></i>
          <i class="fas fa-star rating-stars"></i>
          <i class="fas fa-star rating-stars"></i>
          </div>
          <div class="testimonial-contents">
            <p class="testimonial-comment">
              This beautiful dress arrived at my door within a week of
              purchasing online. So impressed with the effortless process of
              purchasing items through Wo:Sa.
            </p>
            <p class="testimonial-author">Maria de Almeida</p>
            <p class="testimonial-job">
              Senior Product Manager at EDP Comercial
            </p>
          </div>
        </div> -->

        <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
        <div class="testimonial-items">
          <div class="testimonial-images">
            <img src="images/testimonials/person1.png" alt="" />
          </div>
          <div class="testimonial-rating">
          <i class="fas fa-star rating-stars"></i>
          <i class="fas fa-star rating-stars"></i>
          <i class="fas fa-star rating-stars"></i>
          <i class="fas fa-star rating-stars"></i>
          <i class="fas fa-star rating-stars"></i>
          </div>
          <div class="testimonial-contents">
            <p class="testimonial-comment">
            I recently stayed at the Kimdo and had an incredible experience! The staff were friendly and attentive, the room was spotless, and the amenities were top-notch. I would definitely stay here again!
            </p>
            <p class="testimonial-author">Maria de Almeida</p>
            <p class="testimonial-job">
              Senior Product Manager at EDP Comercial
            </p>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="testimonial-items">
          <div class="testimonial-images">
            <img src="images/testimonials/person2.png" alt="" />
          </div>
          <div class="testimonial-rating">
          <i class="fas fa-star rating-stars"></i>
          <i class="fas fa-star rating-stars"></i>
          <i class="fas fa-star rating-stars"></i>
          <i class="fas fa-star rating-stars"></i>
          <i class="fas fa-star rating-stars"></i>
          </div>
          <div class="testimonial-contents">
            <p class="testimonial-comment">
            The Kimdo exceeded my expectations in every way. The room was spacious and comfortable, the breakfast was delicious, and the location was perfect for exploring the city. I highly recommend this hotel.
            </p>
            <p class="testimonial-author">Samantha Lee</p>
            <p class="testimonial-job">
            Research Analyst at Jade Research and Analytics
            </p>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="testimonial-items">
          <div class="testimonial-images">
            <img src="images/testimonials/person3.png" alt="" />
          </div>
          <div class="testimonial-rating">
          <i class="fas fa-star rating-stars"></i>
          <i class="fas fa-star rating-stars"></i>
          <i class="fas fa-star rating-stars"></i>
          <i class="fas fa-star rating-stars"></i>
          <i class="fas fa-star rating-stars"></i>
          </div>
          <div class="testimonial-contents">
            <p class="testimonial-comment">
            I had a fantastic stay at the Kimdo. The attention to detail was impressive, from the luxurious bedding to the high-end toiletries. The staff went above and beyond to make my stay enjoyable. I can't wait to come back!
            </p>
            <p class="testimonial-author">Alex Johnson</p>
            <p class="testimonial-job">
            IT Support Specialist at Emerald Technologies
            </p>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="testimonial-items">
          <div class="testimonial-images">
            <img src="images/testimonials/person4.png" alt="" />
          </div>
          <div class="testimonial-rating">
          <i class="fas fa-star rating-stars"></i>
          <i class="fas fa-star rating-stars"></i>
          <i class="fas fa-star rating-stars"></i>
          <i class="fas fa-star rating-stars"></i>
          <i class="fas fa-star rating-stars"></i>
          </div>
          <div class="testimonial-contents">
            <p class="testimonial-comment">
            I stayed at the Kimdo for a quick business trip and was pleasantly surprised. The room was clean and comfortable, and the staff were helpful and friendly. I would definitely stay here again.
            </p>
            <p class="testimonial-author">Benjamin Wilson</p>
            <p class="testimonial-job">
            Sales Representative at Golden Harvest Inc.
            </p>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="testimonial-items">
          <div class="testimonial-images">
            <img src="images/testimonials/peter.png" alt="" />
          </div>
          <div class="testimonial-rating">
          <i class="fas fa-star rating-stars"></i>
          <i class="fas fa-star rating-stars"></i>
          <i class="fas fa-star rating-stars"></i>
          <i class="fas fa-star rating-stars"></i>
          <i class="fas fa-star rating-stars"></i>
          </div>
          <div class="testimonial-contents">
            <p class="testimonial-comment">
            I had a wonderful stay at the Kimdo. The hotel is beautiful and the service is impeccable. The spa was also amazing and offered a wide range of treatments. I would highly recommend this hotel to anyone looking for a luxurious getaway
            </p>
            <p class="testimonial-author">Peter Griffin</p>
            <p class="testimonial-job">
            Head of the shipping department at the Pawtucket Brewery
            </p>
          </div>
        </div>
      </div>
</div>
      <div class="swiper-pagination"></div>
      <div class="swiper-button-prev prev-btn"></div>
  <div class="swiper-button-next next-btn"></div>
    </div>

    </section>



    <section class="reach-us container">
  <h3 class="section-title h-font">Reach us</h3>
  <div class="reach-us-container">
  <div class="index-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.181470627915!2d85.31778034999999!3d27.71168275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1903e6900cab%3A0x766dfc1380113615!2sDurbarmarg%2C%20Kathmandu%2044600!5e0!3m2!1sen!2snp!4v1673624215125!5m2!1sen!2snp"
 width="100%" height="100%" frameborder="0"  allowfullscreen></iframe>
  </div>

  <div class="contact-us-container">
  <div class="contact-info">
    <p class="contact-title">Contact-Us</p>
    <p>Phone: 01-4412345</p>
    <p>Email: info@thekimdo.com</p>
    <p>Address: Durbarmarg,Kathmandu</p>
  </div>
<div class="follow-us">
<p class="contact-title">Follow us</p>
      <a class="insta" href="#">Instagram</a>
      <a class="fb" href="#">Facebook</a>
      <a class="bird" href="#">Twitter</a>
</div>
  </div>
  </div>
</section>

<!-- FOOTER -->
<?php include 'include/footer.php'?>









<script type="text/javascript">
var bookmodal = document.getElementById("bookingModal");
var btns = document.getElementsByClassName("bookRoomBtn");
var span = document.getElementsByClassName("modal-close")[0];

for (var i = 0; i < btns.length; i++) {
  btns[i].onclick = function() {
    bookmodal.style.display = "block";
  }
}

span.onclick = function() {
  bookmodal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    bookmodal.style.display = "none";
  }
}
</script>







<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
<script type="text/javascript">
  $('.carousel').slick({
  infinite: true,
  speed: 300,
  fade: true,
  arrows:false,
  autoplay:true,

  cssEase: 'linear'
});
</script>

<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

<script type="text/javascript">
  var navbar = document.querySelector(".header");
  var threshold = 800;

window.onscroll = function() {
  if (window.pageYOffset >= threshold) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
};
</script>



<script>
var swiper = new Swiper('.swiper-container', {
  initialSlide: 1,
        grabCursor: false,
        centeredSlides: true,
        slidesPerView: "auto",
        slidesPerView:"auto",
        loop: false,

        pagination: {
          el: ".swiper-pagination",
          clickable: false,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        breakpoints:{
          320: {
            slidesPerView:1,
          },
          640: {
            slidesPerView:1,
          },
          768: {
            slidesPerView:2,
          },
          1024: {
            slidesPerView:3,
          },
        }

});


</script>


<script>
      var swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        slidesPerView:"auto",
        loop: true,
        coverflowEffect: {
          rotate: 50,
          stretch: 0,
          depth: 100,
          modifier: 1,
          slideShadows: false,
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        breakpoints:{
          320: {
            slidesPerView:1,
          },
          640: {
            slidesPerView:1,
          },
          768: {
            slidesPerView:2,
          },
          1024: {
            slidesPerView:3,
          },

        }
      });
    </script>




</body>
</html>
