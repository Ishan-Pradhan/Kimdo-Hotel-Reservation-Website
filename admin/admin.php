<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../index.php");
    exit;
}

// Connect to the database
include '../include/connection.php';
include '../include/essentials.php';

// Get the user information from the database
$admin_id = $_SESSION['admin_id'];
$query = "SELECT * FROM admin WHERE id = $admin_id";
$result = mysqli_query($conn, $query);
$admin = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    // Update the user information in the database
    $name = $_POST['admin_name'];
    $email = $_POST['admin_email'];
    $query = "UPDATE admin SET username='$name', email='$email' WHERE id=$admin_id";
    if (mysqli_query($conn, $query)) {
        $_SESSION['adminupdate'] = 'adminsuccessalert()';
        header("Location: admin.php");
        exit;
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <?php include 'adminlinks.php';?>
</head>

<body>
    <?php include 'admin-header.php';?>
<?php if (isset($_SESSION['adminupdate'])) {

    echo "<div id='sucessalert' class='sucessalert'>
<p class='alert-heading'>Update Successful!</p>
<button class='close-btn'  onclick='closeCustomAlert()'>&times;</button>
</div>

<script>

function closeCustomAlert() {
document.getElementById('sucessalert').style.display = 'none';
}
</script>";
    unset($_SESSION['adminsucessalert']);
}?>
    <section class="admininfo">
        <form class="admininfoform" action="" method="post">
            <div class="formheader">
                <h1>Admin Profile</h1>
            </div>

            <div class="form-group">
                <label for="name">Admin Name:</label>
                <input type="text" id="name" name="admin_name" value="<?php echo $admin['username']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="admin_email" value="<?php echo $admin['email']; ?>">
            </div>
            <input class="updatebtn" type="submit" name="update" value="Update">
        </form>
    </section>
</body>

</html>