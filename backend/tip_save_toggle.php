<?php
ob_start();
header('Content-Type: application/json');
include 'Auth_check.php'; //  session start karega
include 'db.php';

$user_id  = $_SESSION['user_id'];
$tip_name = isset($_POST['tip_name']) ? trim($_POST['tip_name']) : '';

if ($tip_name === '') {
    ob_end_clean();
    echo json_encode(['status' => 'error']);
    exit();
}

$tip_name = mysqli_real_escape_string($conn, $tip_name);

$check = mysqli_query($conn,
    "SELECT id FROM saved_tips WHERE user_id='$user_id' AND tip_name='$tip_name'"
);

if (mysqli_num_rows($check) > 0) {
    mysqli_query($conn, "DELETE FROM saved_tips WHERE user_id='$user_id' AND tip_name='$tip_name'");
    ob_end_clean();
    echo json_encode(['status' => 'removed']);
} else {
    mysqli_query($conn, "INSERT INTO saved_tips (user_id, tip_name) VALUES ('$user_id', '$tip_name')");
    ob_end_clean();
    echo json_encode(['status' => 'saved']);
}
?>