<?php
session_start();

if (isset($_POST['cancel_booking'])) {
    // Get the booking ID from the GET request
    $booking_id = $_POST['booking_id'];
    $room_id = $_POST['room_id'];

    // Connect to the database
    include 'connection.php';

    // Delete the booking from the database
    $sql = "DELETE FROM bookings WHERE booking_id = $booking_id";
    if (mysqli_query($conn, $sql)) {
        header('Location: profile.php');
    } else {
        echo "error";
    }

    $query = "SELECT * FROM rooms WHERE id = $room_id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $available_quantity = $row['quantity'];

    $new_quantity = $available_quantity + 1;
    $update_query = "UPDATE rooms SET quantity = '$new_quantity' WHERE id = '$room_id'";
    mysqli_query($conn, $update_query);

}
