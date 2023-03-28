
<?php
include '../include/connection.php';

if (isset($_POST['checkin_status'])) {
    $booking_id = $_POST['booking_id'];
    $query = "UPDATE bookings SET status='checked_in' WHERE booking_id='$booking_id'";
    mysqli_query($conn, $query);
    header('location: status.php');
}

if (isset($_POST['checkout_status'])) {
    $booking_id = $_POST['booking_id'];
    $user_id = $_POST['user_id'];
    $room_id = $_POST['room_id'];
    $room_name = $_POST['room_name'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $total_price = $_POST['total_price'];

    $query = "INSERT INTO archive_bookings (booking_id, user_id, room_id, room_name, check_in, check_out, total_price) VALUES ('$booking_id', '$user_id', '$room_id', '$room_name', '$check_in', '$check_out', '$total_price')";
    mysqli_query($conn, $query);

    //update the rooms table to make the room available again
    $query3 = "UPDATE rooms SET availability = 'available' WHERE id = '$room_id'";
    mysqli_query($conn, $query3);

    //delete the booking from the bookings table
    $query2 = "DELETE FROM bookings WHERE booking_id = '$booking_id'";
    mysqli_query($conn, $query2);

    $query = "UPDATE bookings SET status='checked_out' WHERE booking_id='$booking_id'";
    mysqli_query($conn, $query);

    $query4 = "SELECT * FROM rooms WHERE id = $room_id";
    $result4 = mysqli_query($conn, $query4);
    $row = mysqli_fetch_assoc($result4);
    $available_quantity = $row['quantity'];

    $new_quantity = $available_quantity + 1;
    $update_query = "UPDATE rooms SET quantity = '$new_quantity' WHERE id = '$room_id'";
    mysqli_query($conn, $update_query);
    header('location: checkedout.php');

}

if (isset($_POST['booked'])) {
    $booking_id = $_POST['booking_id'];
    $query = "UPDATE bookings SET status='booked' WHERE booking_id='$booking_id'";
    mysqli_query($conn, $query);
    header('location: status.php');
}

if (isset($_POST['available'])) {
    $booking_id = $_POST['booking_id'];
    $room_id = $_POST['room_id'];
    $query = "UPDATE rooms SET availability='available' WHERE id='$room_id'";
    mysqli_query($conn, $query);
    header('location: status.php');

    $query2 = "DELETE FROM bookings WHERE booking_id = '$booking_id'";
    mysqli_query($conn, $query2);

    $query4 = "SELECT * FROM rooms WHERE id = $room_id";
    $result4 = mysqli_query($conn, $query4);
    $row = mysqli_fetch_assoc($result4);
    $available_quantity = $row['quantity'];

    $new_quantity = $available_quantity + 1;
    $update_query = "UPDATE rooms SET quantity = '$new_quantity' WHERE id = '$room_id'";
    mysqli_query($conn, $update_query);
    header('location: dashboard.php');

}