<?php

if (isset($_POST['cancel_booking'])) {
    // Get the booking ID from the GET request
    $room_id = $_POST['room_id'];

    // Connect to the database
    include '../include/connection.php';

    // Delete the booking from the database
    $sql = "DELETE FROM rooms WHERE id = $room_id";
    if (mysqli_query($conn, $sql)) {
        header('Location: addrooms.php');
    } else {
        echo "error";
    }

}
