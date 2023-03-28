<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include 'include/links.php'?>
  <title>Rooms</title>
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

  <!-- room 1 -->

<div class="room">
<div class="rooms-content">
  <div>

    <h3 class="secondary-title">Deluxe</h3>
    <p>The deluxe room is designed with minimalist design and the simplicity of the decor encourages relaxation and creates a calm atmosphere to create a peaceful getaway.</p>
    <div class="amenities-btn-container">
    <button class="roomAmenities">Amenities</button>
  </div>
  </div>
  <div>
    <button class="btn room-availability-btn">Check Avaibility</button>
  </div>
  </div>
<div class="room-page-images">
  <img src="images/Rooms page/1.jpg" alt="">
</div>
</div>

<!-- room 2 -->
<div class="room">
<div class="room-page-images">
  <img src="images/Rooms page/1.jpg" alt="">
</div>
<div class="rooms-content">
  <div>

    <h3 class="secondary-title">Deluxe</h3>
    <p>The deluxe room is designed with minimalist design and the simplicity of the decor encourages relaxation and creates a calm atmosphere to create a peaceful getaway.</p>
    <div class="amenities-btn-container">
    <button class="roomAmenities">Amenities</button>
  </div>
  </div>
  <div>
    <button class="btn room-availability-btn">Check Avaibility</button>
  </div>
  </div>
</div>


 <!-- room 1 -->

 <div class="room">
<div class="rooms-content">
  <div>

    <h3 class="secondary-title">Deluxe</h3>
    <p>The deluxe room is designed with minimalist design and the simplicity of the decor encourages relaxation and creates a calm atmosphere to create a peaceful getaway.</p>
    <div class="amenities-btn-container">
    <button class="roomAmenities">Amenities</button>
  </div>
  </div>
  <div>
    <button class="btn room-availability-btn">Check Avaibility</button>
  </div>
  </div>
<div class="room-page-images">
  <img src="images/Rooms page/1.jpg" alt="">
</div>
</div>

<!-- room 2 -->
<div class="room">
<div class="room-page-images">
  <img src="images/Rooms page/1.jpg" alt="">
</div>
<div class="rooms-content">
  <div>

    <h3 class="secondary-title">Deluxe</h3>
    <p>The deluxe room is designed with minimalist design and the simplicity of the decor encourages relaxation and creates a calm atmosphere to create a peaceful getaway.</p>
    <div class="amenities-btn-container">
    <button class="roomAmenities">Amenities</button>
  </div>
  </div>
  <div>
    <button class="btn room-availability-btn">Check Avaibility</button>
  </div>
  </div>
</div>

 <!-- room 1 -->

 <div class="room">
<div class="rooms-content">
  <div>

    <h3 class="secondary-title">Deluxe</h3>
    <p>The deluxe room is designed with minimalist design and the simplicity of the decor encourages relaxation and creates a calm atmosphere to create a peaceful getaway.</p>
    <div class="amenities-btn-container">
    <button class="roomAmenities">Amenities</button>
  </div>
  </div>
  <div>
    <button class="btn room-availability-btn">Check Avaibility</button>
  </div>
  </div>
<div class="room-page-images">
  <img src="images/Rooms page/1.jpg" alt="">
</div>
</div>

<!-- room 2 -->
<div class="room">
<div class="room-page-images">
  <img src="images/Rooms page/1.jpg" alt="">
</div>
<div class="rooms-content">
  <div>

    <h3 class="secondary-title">Deluxe</h3>
    <p>The deluxe room is designed with minimalist design and the simplicity of the decor encourages relaxation and creates a calm atmosphere to create a peaceful getaway.</p>
    <div class="amenities-btn-container">
    <button class="roomAmenities">Amenities</button>
  </div>
  </div>
  <div>
    <button class="btn room-availability-btn">Check Avaibility</button>
  </div>
  </div>
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
