<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "travel_world",
    3307
);

if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

?>