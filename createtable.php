<?php
include 'include/connection.php';

$user = "CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  email VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
)";

if (mysqli_query($conn, $user)) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE bookings (
  booking_id INT AUTO_INCREMENT PRIMARY KEY,
  room_id INT NOT NULL,
  user_id INT NOT NULL,
  room_name VARCHAR(100) NOT NULL,
  user_name VARCHAR(100) NOT NULL,
  check_in DATE NOT NULL,
  check_out DATE NOT NULL,
  guests INT NOT NULL,
  phone_number VARCHAR(20) NOT NULL,
  booking_date DATETIME NOT NULL,
  status ENUM('available', 'booked','checked_in','checked_out') DEFAULT 'available' NOT NULL,
  total_price DECIMAL(10,2)
)";

if (mysqli_query($conn, $sql)) {
    echo "Table bookings created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE admin (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username varchar(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  password VARCHAR(50) NOT NULL
  )";

if (mysqli_query($conn, $sql)) {
    echo "Table admin created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$admin_email = "admin@gmail.com";
$admin_name = "admin";
$admin_password = "admin";

$sql = "INSERT INTO admin (email,username,password)
VALUES ('$admin_email','$admin_name', '$admin_password')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$sql = "CREATE TABLE rooms (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    room_name VARCHAR(30) NOT NULL,
    price FLOAT(10,2) NOT NULL,
    size INT(10) NOT NULL,
    beds varchar(30) NOT NULL,
    capacity varchar(30) NOT NULL,
    rating TINYINT(2) NOT NULL,
    image VARCHAR(255) NOT NULL,
    facilities VARCHAR(255) NOT NULL,
    availability ENUM('available', 'not available') DEFAULT 'available' NOT NULL,
    quantity INT(10) NOT NULL DEFAULT 0,
    adult int(2) NOT NULL ,
    kids int(2) NOT NULL
    )";

if (mysqli_query($conn, $sql)) {
    echo "Table rooms created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$query = "CREATE TABLE archive_bookings (
  booking_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  room_id INT NOT NULL,
  room_name VARCHAR(50) NOT NULL,
  check_in DATE NOT NULL,
  check_out DATE NOT NULL,
  total_price DECIMAL(10,2) NOT NULL
  )";

//execute the query
if (mysqli_query($conn, $query)) {
    echo "Table archive_bookings created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

//close the database connection
mysqli_close($conn);
