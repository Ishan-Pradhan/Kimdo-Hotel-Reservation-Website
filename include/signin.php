<?php
session_start();

// Connect to the database
include 'connection.php';

// Check if the form has been submitted
if (isset($_POST['loginbtn'])) {
    // Get the form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email' AND password='$password'");

    $admin = mysqli_fetch_assoc($result);
    $row = mysqli_num_rows($result);
    if ($row > 0) {
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_name'] = $admin['username'];
        header('location: ../index.php');
    } else {
        // Build the select statement
        $sql = "SELECT id, username, password FROM users WHERE email = '$email' AND password = '$password'";

        // Execute the statement
        $result = mysqli_query($conn, $sql);

        // Check for errors
        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }

        // Fetch the user data
        $user = mysqli_fetch_assoc($result);

        // Check if the user exists
        if ($user) {
            // Log the user in
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['username'];
            header("Location: ../index.php");
            exit;
        } else {
            // Show an error message
            echo "Incorrect username or password.";
        }
    }
    // Close the connection
    mysqli_close($conn);
}
