<?php
// ob_start();
// header('Content-Type: application/json');
// include 'Auth_check.php'; // session start karega
// include 'db.php';

// $user_id  = $_SESSION['user_id'];
// $tip_name = isset($_POST['tip_name']) ? trim($_POST['tip_name']) : '';

// if ($tip_name === '') {
//     ob_end_clean();
//     echo json_encode(['status' => 'error']);
//     exit();
// }

// $tip_name = mysqli_real_escape_string($conn, $tip_name);

// $check = mysqli_query($conn,
//     "SELECT id FROM liked_tips WHERE user_id='$user_id' AND tip_name='$tip_name'"
// );

// if (mysqli_num_rows($check) > 0) {
//     mysqli_query($conn, "DELETE FROM liked_tips WHERE user_id='$user_id' AND tip_name='$tip_name'");
//     ob_end_clean();
//     echo json_encode(['status' => 'removed']);
// } else {
//     mysqli_query($conn, "INSERT INTO liked_tips (user_id, tip_name) VALUES ('$user_id', '$tip_name')");
//     ob_end_clean();
//     echo json_encode(['status' => 'liked']);
// }




ob_start();
header('Content-Type: application/json');

include 'Auth_check.php';
include 'db.php';

if (!isset($_SESSION['user_id'])) {

    echo json_encode([
        'status' => 'session_error'
    ]);

    exit();
}

$user_id = $_SESSION['user_id'];

$tip_name = isset($_POST['tip_name']) 
    ? trim($_POST['tip_name']) 
    : '';

if ($tip_name == '') {

    echo json_encode([
        'status' => 'empty_tip'
    ]);

    exit();
}

$tip_name = mysqli_real_escape_string($conn, $tip_name);

$check = mysqli_query($conn,
    "SELECT id FROM liked_tips 
     WHERE user_id='$user_id' 
     AND tip_name='$tip_name'"
);

if (mysqli_num_rows($check) > 0) {

    mysqli_query($conn,
        "DELETE FROM liked_tips 
         WHERE user_id='$user_id' 
         AND tip_name='$tip_name'"
    );

    echo json_encode([
        'status' => 'removed'
    ]);

} else {

    $insert = mysqli_query($conn,
        "INSERT INTO liked_tips (user_id, tip_name)
         VALUES ('$user_id', '$tip_name')"
    );

    if ($insert) {

        echo json_encode([
            'status' => 'liked'
        ]);

    } else {

        echo json_encode([
            'status' => 'db_error',
            'error' => mysqli_error($conn)
        ]);
    }
}

?>

