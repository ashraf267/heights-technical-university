<?php
    // php code here

    // connect to database
    $conn = mysqli_connect('localhost', 'devashraf', 'test456', 'ht_university');

    // check connection
    if (!$conn) {
        echo "Connection error: " . mysqli_connect_error() . "\n";
    }
?>