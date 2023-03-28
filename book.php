<?php
session_start();
include 'include/connection.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
include 'include/essentials.php';
if (isset($_POST['book'])) {
    $room_id = $_POST['room_id'];
    $user_id = $_POST['user_id'];
    $room_price = $_POST['room_price'];
    $room_quantity = $_POST['room_quantity'];
    $room_name = $_POST['room_name'];
    $user_name = $_POST['username'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $guests = $_POST['guests'];
    $phone_number = $_POST['phone_number'];
    $booking_date = date("Y-m-d H:i:s");

    $duration = (strtotime($check_out) - strtotime($check_in)) / (60 * 60 * 24);

    $total_price = $room_price * $duration;

    $sql1 = "SELECT * FROM rooms WHERE id = $room_id";
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($result1);
    $available_quantity = $row1['quantity'];

    if ($available_quantity > 0) {

        $sql = "INSERT INTO bookings (room_id, user_id, room_name, user_name, check_in, check_out, guests, phone_number, booking_date, total_price)
  VALUES ('$room_id', '$user_id', '$room_name', '$user_name', '$check_in', '$check_out', '$guests', '$phone_number', '$booking_date','$total_price')";
        if (mysqli_query($conn, $sql)) {
            $available_bookings = "UPDATE bookings SET status = 'booked' WHERE room_id = '$room_id'";
            mysqli_query($conn, $available_bookings);

            $new_quantity = $available_quantity - 1;
            $update_query = "UPDATE rooms SET quantity = '$new_quantity' WHERE id = '$room_id'";
            mysqli_query($conn, $update_query);

            $_SESSION['sucessalert'] = 'bookingsucessalert()';
            header('location: index.php');

        } else {
            bookingerroralert();
            header('location: index.php');
            exit();
        }
        mysqli_close($conn);
    } elseif ($available_quantity == 0) {
        $update_error = "UPDATE rooms SET availability = 'not available' WHERE id = '$room_id'";
        mysqli_query($conn, $update_error);
        // Show an error message to the user
        echo "Sorry, there are no available rooms left for this room type.";
    }
}?>

</body>
</html>
