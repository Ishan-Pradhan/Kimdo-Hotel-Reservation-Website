
  <?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Connect to the database
include 'connection.php';

// Get the user information from the database
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    // Update the user information in the database
    $name = $_POST['name'];
    $email = $_POST['email'];
    $query = "UPDATE users SET username='$name', email='$email' WHERE id=$user_id";
    mysqli_query($conn, $query);
    $_SESSION['message'] = "Profile updated!";
    header("Location: profile.php");
    exit;
}

?>

<html>
<head>
  <title>Profile</title>
  <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="profile.css">
</head>
<body>
<div class="profile-header">
  <div class="profile-links">
    <a href="../index.php">Home</a>
    <a href="#">Profile</a>
    <a href="mybooking.php">My Bookings</a>
  </div>
  <a class="btn logoutbtn" href="logout.php">LOGOUT</a>
</div>

<section class="profileinfo">
  <form class="profileinfoform" action="profile.php" method="post">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" value="<?php echo $user['username']; ?>">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>">
    </div>
    <input class="btn" type="submit" name="update" value="Update">
  </form>
  </section>
</body>
</html>
</body>
</html>
