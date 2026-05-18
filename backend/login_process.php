<?php
// session_start();
// include 'db.php'; 

// $email = $_POST['email'];
// $password = $_POST['password'];

// $sql = "SELECT * FROM admins WHERE email='$email' AND password='$password'";
// $result = mysqli_query($conn, $sql);

// if (mysqli_num_rows($result) == 1) {
//     $_SESSION['admin_email'] = $email;
//     header("Location: dashboard.php");
//     exit();
// } else {
//     header("Location: login.php?error=1");
//     exit();
// }



session_start();
include 'db.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM admins WHERE email='$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {

    $admin = mysqli_fetch_assoc($result);

    if (password_verify($password, $admin['password'])) {

        $_SESSION['admin_email'] = $email;

        header("Location: dashboard.php");
        exit();

    } else {
        header("Location: login.php?error=1");
        exit();
    }

} else {
    header("Location: login.php?error=1");
    exit();
}



?>