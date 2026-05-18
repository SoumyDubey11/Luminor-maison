<?php
session_start();
include 'db.php';

// GET se REMOVE
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['remove'])) {
    if (isset($_SESSION['user_id'])) {
        $id      = (int)$_GET['remove'];
        $user_id = (int)$_SESSION['user_id'];
        mysqli_query($conn, "DELETE FROM wishlist WHERE id='$id' AND user_id='$user_id'");
    }
    header("Location: wishlist.php");
    exit();
}

// POST — JSON response
ob_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    ob_end_clean();
    echo json_encode(['status' => 'login_required']);
    exit();
}

$user_id         = $_SESSION['user_id'];
$product_name    = isset($_POST['product_name'])  ? trim($_POST['product_name'])  : '';
$product_image   = isset($_POST['product_image']) ? trim($_POST['product_image']) : '';
$product_category = isset($_POST['category'])     ? trim($_POST['category'])      : 'general';

if ($product_name === '') {
    ob_end_clean();
    echo json_encode(['status' => 'error', 'msg' => 'empty']);
    exit();
}

$product_name     = mysqli_real_escape_string($conn, $product_name);
$product_image    = mysqli_real_escape_string($conn, $product_image);
$product_category = mysqli_real_escape_string($conn, $product_category);

// Check karo already wishlist mein hai ya nahi
$check = mysqli_query($conn, 
    "SELECT id FROM wishlist WHERE user_id='$user_id' AND product_name='$product_name'"
);

if (mysqli_num_rows($check) > 0) {
    // Already hai — remove karo
    mysqli_query($conn, 
        "DELETE FROM wishlist WHERE user_id='$user_id' AND product_name='$product_name'"
    );
    ob_end_clean();
    echo json_encode(['status' => 'removed']);
} else {
    // Nahi hai — add karo
    $insert = mysqli_query($conn, 
        "INSERT INTO wishlist (user_id, product_name, product_image, category) 
         VALUES ('$user_id', '$product_name', '$product_image', '$product_category')"
    );
    ob_end_clean();
    if ($insert) {
        echo json_encode(['status' => 'added']);
    } else {
        echo json_encode(['status' => 'error', 'msg' => mysqli_error($conn)]);
    }
}

// GET se REMOVE
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['remove'])) {
    if (isset($_SESSION['user_id'])) {
        $id      = (int)$_GET['remove'];
        $user_id = (int)$_SESSION['user_id'];
        mysqli_query($conn, "DELETE FROM wishlist WHERE id='$id' AND user_id='$user_id'");
    }
    header("Location: wishlist.php");
    exit();
}

// ✅ Clear All — ye add karo
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['clear_all'])) {
    if (isset($_SESSION['user_id'])) {
        $user_id = (int)$_SESSION['user_id'];
        mysqli_query($conn, "DELETE FROM wishlist WHERE user_id='$user_id'");
    }
    header("Location: wishlist.php");
    exit();
}




?>