<?php
session_start();
?>

 <!-- navbar -->
<nav class="header sticky ">
  <div class="logo-container">
    <a href="#"><img src="images/logo/logo2.png" alt=""></a>
    </div>
    <ul class="nav-links">
      <li><a href="index.php">Home</a></li>
      <li><a href="roompage.php">Rooms</a></li>
      <li><a href="facility.php">Facilities</a></li>
      <li><a href="contact.php">Contact us</a></li>
      <li><a href="aboutus.php">About</a></li>
    </ul>
    <div class="nav-btns-container">
    <div class="nav-btns">
    <?php if (isset($_SESSION['user_id'])): ?>
      <a href="include/profile.php"><button class="btn user"><i class="fa-solid fa-user"></i><?php echo $_SESSION['user_name']; ?></button></a>

      <?php elseif (isset($_SESSION['admin_id'])): ?>
        <a href="./admin/admin.php"><button class="btn admin"><i class="fa-solid fa-crown"></i><?php echo $_SESSION['admin_name']; ?></button></a>



      <?php else: ?>
      <button id="loginBtn" class="btn secondary-btn show-login-form">Login</button>
      <button id="registerBtn" class="btn Register show-register-form ">Register</button>
      <?php endif;?>
    </div>
    </div>

    <div class="burger-menu">
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
  </div>
  </nav>


  <div class="modal-container">
  <div class="modal-content">
    <div class="form-container login-form">
    <form id="login-form" class="login-form" action="include/signin.php" method="POST">
      <div class="formHeader">
          <h4>User Login</h4>
        <i class="fa-solid fa-x lclose"></i>
      </div>
      <div class="formContent">
        <div class="email">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" required>
        </div>
        <div class="password">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" required>
        </div>
        <button class="btn model-btn" name="loginbtn">Login</button>
        </div>
        </form>
    </div>
    <div class="form-container register-form">
    <form class="model-form" action="include/signup.php" method="POST">
      <div class="formHeader">
          <h4>User Registration</h4>
        <i class="fa-solid fa-x rclose"></i>
      </div>
      <div class="formContent">
        <div class="username">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div class="email">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" required>
        </div>
        <div class="password">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" required>
        </div>

        <button class="btn model-btn" name="registerbtn">Register</button>
        </div>
        </form>
    </div>

  </div>
</div>




<script type="text/javascript">
  var navbar = document.querySelector(".header");
  var threshold = 700;

window.onscroll = function() {
  if (window.pageYOffset >= threshold) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
};
</script>


<script type="text/javascript">
  var loginBtn = document.querySelector('.show-login-form');
var registerBtn = document.querySelector('.show-register-form');
var modal = document.querySelector('.modal-container');
var loginForm = document.querySelector('.login-form');
var registerForm = document.querySelector('.register-form');
var lclose= document.querySelector('.lclose');
var rclose= document.querySelector('.rclose');

loginBtn.addEventListener('click', function() {
  modal.style.display = 'block';
  loginForm.style.display = 'block';
  registerForm.style.display = 'none';
});

registerBtn.addEventListener('click', function() {
  modal.style.display = 'block';
  loginForm.style.display = 'none';
  registerForm.style.display = 'block';
});

lclose.addEventListener('click', function() {
    modal.style.display = 'none';
});
rclose.addEventListener('click', function() {
    modal.style.display = 'none';
});
</script>

<script>
 const burgerMenu = document.querySelector('.burger-menu');
const navLinks = document.querySelector('.nav-links');
const navBtnsContainer = document.querySelector('.nav-btns-container');

burgerMenu.addEventListener('click', () => {
  navLinks.classList.toggle('active');
  navBtnsContainer.classList.toggle('active');
});

</script>

</body>
</html>
