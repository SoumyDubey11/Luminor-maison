<?php

$server = $_SERVER['HTTP_HOST'];

if ($server == "localhost") {

    // Localhost Database
    $conn = mysqli_connect("localhost", "root", "", "interior_db");

} else {

    // InfinityFree Live Database
    $conn = mysqli_connect(
        "sql207.infinityfree.com",
        "if0_41915684",
        "Design2026",
        "if0_41915684_interiordb"
    );
}

if (!$conn) {
    die("Database connection failed");
}

?>