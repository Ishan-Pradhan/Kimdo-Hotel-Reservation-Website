<?php
include 'connection.php';

if (isset($_POST['registerbtn'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (username, email, password)
  VALUES ('$username', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo "User registered successfully";
    } else {
        echo "Error registering user: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
