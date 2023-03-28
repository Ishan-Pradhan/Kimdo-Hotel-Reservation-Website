<?php include 'include/essentials.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/style.css">
<?php include 'include/header.php';?>
</head>
<body>

<?php
include 'include/connection.php';
if (!isset($_SESSION['user_id'])): ?>
<div class="not-login-error">
  <h1>You are not logged in to book this.</h1>

<p>Please log in to your account and try again. If you don't have an account yet, you can sign up for one.</p>
</div>

 <?php else:
    $user_id = $_SESSION['user_id'];
    $room_name = $_GET['roomname'];
    $sql_room = "SELECT room_name,id,price,quantity FROM rooms WHERE room_name = '$room_name'";
    $result_room = mysqli_query($conn, $sql_room);
    $row_room = mysqli_fetch_assoc($result_room);
    $rooms_name = $row_room['room_name'];
    $room_id = $row_room['id'];
    $room_price = $row_room['price'];
    $room_quantity = $row_room['quantity'];

    $sql_user = "SELECT username FROM users WHERE id = '$user_id'";
    $result_user = mysqli_query($conn, $sql_user);
    $row_user = mysqli_fetch_assoc($result_user);
    $user_name = $row_user['username'];
    ?>
						 <section class="bookingformcontainer">
														<div class="bookingform" id="booking-form">
								<form action="book.php" method="post" >
								 <div class="booking-header">
					  <h1>Book This Room</h1>
			</div>
		<input type="hidden" name="room_id" value="<?php echo $room_id; ?>">
		<input type="hidden" name="room_price" value="<?php echo $room_price; ?>">
		<input type="hidden" name="room_quantity" value="<?php echo $room_quantity; ?>">
		 <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
		 <div class="form-group">
		   <label for="room_name">Room Name:</label>
			<input type="text" class="form-control" id="room_name" name="room_name" value="<?php echo $rooms_name; ?>" required readonly>
			  </div>
				  <div class="form-group">
			 <label for="username">Username:</label>
			 <input type="text" class="form-control" id="username" name="username" value="<?php echo $user_name; ?>" readonly>
			  </div>
	       <div class="form-group">
	       <label for="phone_number">Phone Number:</label>
	       <input type="tel" class="form-control" id="phone_number" name="phone_number" required>
	     </div>
	       <div class="form-group">
			  <label for="check_in">Check-in Date:</label>
			 <input type="date" class="form-control" id="check_in" name="check_in">
		</div> <div class="form-group">
		<label for="check_out">Check-out Date:</label>
		<input type="date" class="form-control" id="check_out" name="check_out">
		</div>
		<div class="form-group">
		 <label for="guests">Number of Guests:</label>
		<input type="number" class="form-control" id="guests" name="guests">
		 </div>
		<button name="book" type="submit" class="btn btn-primary">Book Room</button>
		</form>
		</div>
		</section>
									<?php endif;?>

</body>
</html>
