<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include './include/links.php'?>
  <title>Contact us</title>
</head>
<body>
<?php include 'include/header.php'?>

  <section class="contact-page">


  <div class="contact-div">
  <div class="contact-page-detail">
    <div class="cdetails">
  <h3 class="secondary-title">Kimdo hotel and resort</h3>
  <ul>
    <li><strong>Street Name:</strong>Durbarmarg</li>
    <li><strong>District:</strong>Kathmandu</li>
    <li><strong>Ward No:</strong>3</li>
    <li><strong>Phone:</strong>01-441234</li>
    <li><strong>Email:</strong> info@thekimdo.com.np</li>
  </ul>
  </div>

  <div class="cicons">
  <h3 class="secondary-title">Follow us on</h3>
  <ul class="contact-social-icons">
        <li><a href="#"><i class="fb fab fa-facebook-f"></i></a></li>
        <li><a href="#"><i class="fa-brands fa-twitter bird"></i></a></li>
        <li><a href="#"><i class="insta fab fa-instagram"></i></a></li>
      </ul>
      </div>
  </div>

  <div class="contact-page-form">
  <h3 class="secondary-title">write to us</h3>
  <p>We are eager to hear from you; Please fill in your contact information and our staff members wil contact you shortly.</p>
    <form action="" method="POST">
      <div class="contact-form-container">

          <div class="cf fname">
            <label for="fullname">Full Name</label>
            <input type="text" name="fullname" id="fullname">
          </div>

        <div class="email-phone">
          <div class="cf email">
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
          </div>

          <div class="cf phone">
            <label for="phone">Phone No.</label>
            <input type="phone" name="phone" id="phone">
          </div>
        </div>
        <div class="cf messagebox">
          <label for="mbox">Your Message</label>
          <textarea name="mbox" id="mbox" cols="20" rows="10"></textarea>
        </div>
        <div class="cform-button">
          <span >*Please fill in all of the required fields.</span>
          <button class="btn">Submit</button>
        </div>
        </div>
    </form>
  </div>
  </div>


<div class="map">
<h3 class="secondary-title">Map</h3>
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.181470627915!2d85.31778034999999!3d27.71168275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1903e6900cab%3A0x766dfc1380113615!2sDurbarmarg%2C%20Kathmandu%2044600!5e0!3m2!1sen!2snp!4v1673624215125!5m2!1sen!2snp"
    width="100%" height="500px" frameborder="0" allowfullscreen></iframe>
  </div>

  </section>


<?php include 'include/footer.php';?>
</body>
</html>